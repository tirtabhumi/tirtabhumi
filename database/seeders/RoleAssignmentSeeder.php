<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAssignmentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Define Permissions derived from the diagram
        $permissions = [
            // Training / Upventure Learning
            'view_any_training',
            'create_training',
            'update_own_training',
            'delete_own_training',
            'delete_any_training', // Copyright infringement
            'review_training', // Admin review
            'approve_training', // Admin approval
            
            // Withdrawal
            'view_own_withdrawal',
            'create_withdrawal',
            'view_all_withdrawals', // Super Admin & Finance
            'verify_withdrawal', // Finance
            'update_withdrawal_status', // Finance
            'manage_withdrawal_fees', // Super Admin
            'process_refund', // Finance
            
            // Organization / Partner Specific
            'view_organization_info',
            'create_assignment',
            'grade_project',
            'view_partner_dashboard', // If different
            
            // User Management
            'view_any_user',
            'create_user',
            'update_user',
            'delete_user',
            'manage_roles',
            
            // Categories
            'view_any_category',
            'create_category',
            'update_category',
            'delete_category',
            
            // Posts / Blog
            'view_any_post',
            'create_post',
            'update_post',
            'delete_post',
            'manage_official_news', // Super Admin
            
            // Procurement (Admin)
            'view_any_product',
            'create_product',
            'update_product',
            'delete_product',

            // Finance
            'view_finance_dashboard',
            'manage_tax_calculation',
            'download_transaction_history',
            
            // General
            'view_admin_panel',

            // Extra Permissions for Partner Dashboard / Relations
            'view_any_registration',
            'view_registration',
            'update_registration',
            'view_any_user_module_progress',
            'view_user_module_progress',
            'update_user_module_progress',
            'view_any_training_module',
            'create_training_module',
            'update_training_module',
            'delete_training_module',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // 3. Create Roles and Assign Permissions

        // --- Partner ---
        $partnerRole = Role::firstOrCreate(['name' => 'partner', 'guard_name' => 'web']);
        $partnerRole->syncPermissions([
            'view_admin_panel',
            'view_any_training',
            'create_training',
            'update_own_training',
            'view_own_withdrawal',
            'create_withdrawal',
            'view_organization_info',
            'create_assignment',
            'grade_project',
            'view_any_registration',
            'view_registration',
            'update_registration',
            'view_any_user_module_progress',
            'view_user_module_progress',
            'update_user_module_progress',
            'view_any_training_module',
            'create_training_module',
            'update_training_module',
            'delete_training_module',
        ]);

        // --- Super Admin ---
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        // Super Admin gets everything basically, or specific set
        $superAdminRole->syncPermissions(Permission::all());


        // --- Admin ---
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions([
            'view_admin_panel',
            'view_any_post',
            'create_post',
            'update_post',
            'manage_official_news',
            'view_any_product',
            'create_product',
            'update_product',
            'create_category',
            'update_category',
            'view_any_training',
            'review_training',
            'approve_training',
            'view_any_user', // To help users?
        ]);

        // --- Finance ---
        $financeRole = Role::firstOrCreate(['name' => 'finance', 'guard_name' => 'web']);
        $financeRole->syncPermissions([
            'view_admin_panel',
            'view_finance_dashboard',
            'view_all_withdrawals',
            'verify_withdrawal',
            'update_withdrawal_status',
            'process_refund',
            'manage_tax_calculation',
            'download_transaction_history',
        ]);

        // 4. Assign roles to users based on 'role' column (Legacy support)
        // Also ensure specific emails have specific roles if needed
        $users = User::all();
        foreach ($users as $user) {
            if ($user->role === 'super_admin') {
                $user->assignRole($superAdminRole);
            } elseif ($user->role === 'admin') {
                $user->assignRole($adminRole);
            } elseif ($user->role === 'partner') {
                $user->assignRole($partnerRole);
            } elseif ($user->role === 'finance') {
                $user->assignRole($financeRole);
            }
        }
        
        // Ensure Super Admin user exists and has role
        $saUser = User::where('email', 'superadmin@tirtabhumi.test')->first();
        if ($saUser) {
            $saUser->assignRole($superAdminRole);
        }
    }
}
