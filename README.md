## Vertical Slice: Provider places an order

## Getting Started

### 1️. Clone the repository
git clone https://github.com/mohsincoder11/nxp-assignment.git  
cd nxp-assignment

### 2. Install:
   composer install  
   cp .env.example .env  
   set up mysql database  
   php artisan key:generate  

### 3. DB:
   php artisan migrate  
   php artisan db:seed  

### 4. Serve:
   php artisan serve  

### 5.Please visit default page to see the seeder data.    
http://127.0.0.1:8000/  
You can see data here.

### 6. API:
i)Login user  
      Post /api/login  
      Note: you can find user list on default page(http://127.0.0.1:8000) after database seeding  
ii)Order Place  
   POST /api/orders  
   Body (JSON):  
   {  
     "items": [  
       {"product_id": 1, "quantity": 3}  
     ]  
   }  

### 7. Run tests:
   php artisan test --env=testing  
   Note: i have used mysql for database.


### Please view [PLAN.md](./PLAN.md) and [ARCHITECTURE.md](./ARCHITECTURE.md) files
