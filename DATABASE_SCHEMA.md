# Tirtabhumi Database Schema Documentation

This document outlines the database structure for the Tirtabhumi platform, organized by functional modules.

## 1. Authentication & Users Module

Core user management and account balances.

### `users`
The central entity for all actors in the system (Admins, Partners, Affiliates, End Users).
- **id**: Primary Key.
- **name**: User's full name.
- **email**: Unique email address.
- **password**: Hashed password.
- **role**: Role-based access control (`super_admin`, `admin`, `partner`, `end_user`).
- **phone**: Contact number.
- **google_id**: For Google SSO integration.
- **avatar**: Path to profile picture.
- **is_blocked**: Boolean to suspend access.

### `wallets`
Stores digital balance specifically for Partners (and potentially other user types).
- **id**: Primary Key.
- **user_id**: Foreign Key to `users`.
- **balance**: Current available funds.

---

## 2. UpVenture (Training & LMS) Module

Manages classes, webinars, workshops, and user enrollments.

### `trainings`
Represents a learning event or course.
- **id**: Primary Key.
- **user_id**: Foreign Key to `users` (The creator/partner).
- **title**: Course title.
- **slug**: URL-friendly identifier.
- **description**: Detailed content.
- **image**: Banner image.
- **event_date**: Date and time of the event.
- **type**: `online` or `offline`.
- **location**: Physical address or meeting link.
- **price**: Cost of the training.
- **category**: e.g., Webinar, Workshop, Class.
- **level**: Difficulty level (Beginner, Intermediate, Expert).
- **topic**: Subject matter (e.g., Coding, Marketing).
- **is_active**: Boolean for visibility.

### `training_modules`
Curriculum chapters or video lessons for a specific training.
- **id**: Primary Key.
- **training_id**: Parent training.
- **title**: Module title.
- **video_url**: Link to video content (YouTube/Vimeo).
- **duration_minutes**: Length of the video.
- **order**: Sorting order.
- **is_preview**: If true, can be watched before purchasing.

### `registrations`
Records a user's purchase or enrollment in a training.
- **id**: Primary Key.
- **training_id**: The course bought.
- **name**, **email**, **phone**: Trainee details.
- **institution**: Organization/School origin.
- **status**: `pending`, `completed`, `cancelled`.
- **referred_by**: Affiliate code (if applicable).
- **Payment Fields**:
    - `payment_method`
    - `payment_status` (`unpaid`, `paid`)
    - `transaction_id` (Midtrans/Gateway ID)
    - `total_amount`

### `user_module_progress`
Tracks learning progress for registered users.
- **id**: Primary Key.
- **user_id**: The learner.
- **module_id**: The completed module.
- **completed_at**: Timestamp.

---

## 3. Affiliate System Module

Manages the affiliate marketing program, commissions, and payouts.

### `affiliates`
Extended profile for users who join the affiliate program.
- **id**: Primary Key.
- **user_id**: Links to `users` table.
- **referral_code**: Unique 5-character code used for tracking.
- **balance**: Commission earnings available for withdrawal.
- **status**: `active` or `suspended`.

### `affiliate_sales`
Log of successful referrals.
- **id**: Primary Key.
- **affiliate_id**: The affiliate who made the sale.
- **registration_id**: The specific enrollment generated.
- **commission_amount**: Money earned from this sale.
- **commission_percentage**: Rate applied at time of sale.
- **status**: `pending`, `paid`, `cancelled`.

### `affiliate_withdrawals`
Payout requests from affiliates.
- **id**: Primary Key.
- **affiliate_id**: Requesting affiliate.
- **amount**: Gross withdrawal amount.
- **tax_amount**: Deductions.
- **platform_fee**: Admin fees.
- **net_amount**: Final amount transferred.
- **status**: `requested`, `approved`, `paid`, `rejected`.
- **processed_at**: When the payout was finalized.

### `affiliate_links`
(Optional) Specific link tracking analytics.
- **id**: Primary Key.
- **affiliate_id**: Owner.
- **url**: The generated link.
- **clicks**: Click counter.

---

## 4. Finance & Partner Module

Handles financial transactions and partner settlements.

### `transactions`
General ledger for all system payments.
- **id**: Primary Key.
- **user_id**: Payer.
- **item_type**: Polymorphic (e.g., `Training`).
- **item_id**: Polymorphic ID.
- **amount**: Transaction value.
- **status**: `pending`, `paid`, `failed`.
- **affiliate_code**: Attributed referral code.

### `withdrawal_requests`
Withdrawal requests for **Partners** (creators), distinct from affiliates.
- **id**: Primary Key.
- **user_id**: The partner.
- **amount**: Amount requested.
- **status**: `pending`, `approved`, `rejected`.
- **bank_details**: Destination account info.
- **proof_of_transfer**: Admin upload for transfer evidence.

---

## 5. Content Management (CMS)

### `posts`
Blog articles.
- **id**: Primary Key.
- **title**, **slug**, **content**.
- **image**: Featured image.
- **category_id**: Linked category.
- **published_at**: Schedule post.

### `products`
Procurement or service catalog items.
- **id**: Primary Key.
- **name**, **description**, **price**.
- **platforms**: JSON field for supported platforms/badges.

### `categories`
Taxonomy for blog posts.
- **id**: Primary Key.
- **name**, **slug**.
