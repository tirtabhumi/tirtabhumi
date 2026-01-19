---
description: Auto‑seed super admin after production pull
---

// turbo-all
1. **Run database migrations**
```bash
php artisan migrate --force
```

2. **Seed the database (including admin user)**
```bash
php artisan db:seed --force
```

> The `--force` flag allows the commands to run in non‑interactive environments such as production CI/CD pipelines.

**Explanation**
- The first step ensures the schema is up‑to‑date.
- The second step runs the `DatabaseSeeder`, which now calls `AdminUserSeeder` to create the super‑admin if it does not already exist.

**How to use**
- Add this workflow to your CI/CD pipeline or run it manually after a `git pull` on the production server.
- The workflow will automatically execute both commands because of the `// turbo-all` annotation.
