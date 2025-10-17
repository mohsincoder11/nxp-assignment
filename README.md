## Vertical Slice: Provider places an order

1. Install:
   composer install
   cp .env.example .env
   php artisan key:generate

2. DB:
   php artisan migrate
   php artisan db:seed

3. Serve:
   php artisan serve

4. API:
   POST /api/orders
   Body (JSON):
   {
     "provider_id": 1,
     "items": [
       {"product_id": 1, "quantity": 3}
     ]
   }

5. Run tests:
   php artisan test
