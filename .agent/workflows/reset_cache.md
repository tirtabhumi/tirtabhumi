---
description: Mengembalikan aplikasi ke mode HTTP untuk sementara sambil debugging SSL
---

// turbo-all
1. **Clear cache config**
```bash
php artisan config:clear
```

2. **Clear cache route**
```bash
php artisan route:clear
```

3. **Restart queue worker**
```bash
php artisan queue:restart
```
