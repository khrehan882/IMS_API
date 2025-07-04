# Laravel Inventory Management API

A scalable RESTful API built with Laravel and Query Builder (no Eloquent models), designed for inventory management, dynamic pricing, and transaction processing.

---

## 🚀 Features

- ✅ Inventory management with filtering and pagination
- ✅ Dynamic pricing engine (time-based + quantity-based rules)
- ✅ Transaction handling with audit logging
- ✅ Lightweight structure using Laravel Query Builder
- ✅ Modular controllers and services
- ✅ Seeders and migrations for demo data

---

## 📁 Folder Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── InventoryController.php
│       ├── ProductController.php
│       └── TransactionController.php
├── Services/
│   └── InventoryService.php (optional)
database/
├── migrations/
├── seeders/
routes/
└── api.php
```

---

## 🛠 Setup Instructions

### 1. Clone the Repo

```bash
git clone https://github.com/khrehan882/IMS_API.git
cd IMS_API
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment

Copy the `.env.example` file and set your DB credentials:

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:
```env
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

### 4. Run Migrations & Seeders

```bash
php artisan migrate:fresh --seed
```

### 5. Start the Server

```bash
php artisan serve
```

Visit: [http://localhost:8000](http://localhost:8000/api/inventory)

---

## 📬 API Endpoints

| Method | Endpoint                          | Description                          |
|--------|-----------------------------------|--------------------------------------|
| GET    | `/api/inventory`                 | List inventory with pagination       |
| PUT    | `/api/inventory/{sku}/quantity`  | Update quantity of an inventory item |
| GET    | `/api/products/{sku}`            | Get product details by SKU           |
| POST   | `/api/transactions/sale`         | Process a sale transaction           |

---

## 🧪 Seeded Data

Run this to populate test data:

```bash
php artisan db:seed
```

Tables:
- products
- inventories
- pricing_rules
- transactions
- transaction_items

---

## 💡 Tech Stack

- Laravel 12
- PHP 8.2.12
- Query Builder (no Eloquent)
- MySQL / PostgreSQL

---
