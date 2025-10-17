## Vertical Slice: Provider places an order

## Getting Started

### 1️. Clone the repository
git clone https://github.com/mohsincoder11/nxp-assignment.git
cd nxp-assignment

### 2. Install:
   composer install
   cp .env.example .env
   php artisan key:generate

### 3. DB:
   php artisan migrate
   php artisan db:seed

### 4. Serve:
   php artisan serve

### 5. API:
   POST /api/orders
   Body (JSON):
   {
     "provider_id": 1,
     "items": [
       {"product_id": 1, "quantity": 3}
     ]
   }

### 6. Run tests:
   php artisan test

### Please view PLAN.md and ARCHITECTURE.md file