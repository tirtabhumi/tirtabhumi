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
        // Ensure roles exist
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $partnerRole = Role::firstOrCreate(['name' => 'partner', 'guard_name' => 'web']);

        // Assign roles based on 'role' column
        $users = User::all();
        foreach ($users as $user) {
            if ($user->role === 'super_admin') {
                $user->assignRole($superAdminRole);
            } elseif ($user->role === 'admin') {
                $user->assignRole($adminRole);
            } elseif ($user->role === 'partner') {
                $user->assignRole($partnerRole);
            }
        }
    }
}
