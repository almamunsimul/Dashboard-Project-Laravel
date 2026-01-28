# 🚀 Laravel Dashboard & CMS Project

A modern, scalable **Laravel-based Dashboard Web Application** featuring secure authentication, a full Content Management System (CMS), and **bKash payment gateway integration**.  
Designed following best practices for real-world, production-ready Laravel applications.

---

## 📌 Project Overview

This project is a comprehensive **admin dashboard system** built with the Laravel framework.  
It includes user authentication, banner/content management, data lifecycle handling (soft & permanent deletes), and secure online payments using **bKash API**.

The application architecture follows Laravel’s MVC pattern and is suitable for learning, customization, and real deployment.

---

## ✨ Key Features

### 🔐 User Authentication & Authorization
- Secure user registration & login system
- Password hashing using Laravel’s built-in security
- Role-based access support (ready for extension)

### 🧩 Content Management System (CMS)
- Banner management with full CRUD operations
- Admin-friendly interface for managing website content
- Image & data handling through Laravel controllers

### ♻️ Data Lifecycle Management
- Soft delete functionality for safe data recovery
- Permanent delete option for irreversible removal
- Clean separation between active and trashed records

### 💳 bKash Payment Gateway Integration
- Secure bKash API integration
- Sandbox & live mode support
- Transaction handling with payment tracking
- Ready for real merchant deployment

### 📊 Dashboard Structure
- Organized admin panel layout
- Extendable modules for future features
- Clean Blade templating structure

---

## 🛠️ Technology Stack

| Layer | Technology |
|------|-----------|
| Backend | PHP (Laravel Framework) |
| Database | MySQL |
| Frontend | HTML, CSS, JavaScript |
| Templating | Laravel Blade |
| Payment Gateway | bKash API |
| Authentication | Laravel Auth |

---

## ⚙️ Installation & Setup

### 🔹 Prerequisites

- PHP **>= 8.1**
- Composer
- MySQL Server
- Node.js & npm (optional)

---

### 🔹 Installation Steps

#### 1️⃣ Clone the Repository

```bash
git clone https://github.com/almamunsimul/Dashboard-Project-Laravel.git
cd Dashboard-Project-Laravel
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Create Environment File
```bash
cp .env.example .env
```

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

---

### 🔹 Database Configuration

Update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

Create the database manually before running migrations.

---

### 5️⃣ Run Migrations
```bash
php artisan migrate
```

### 6️⃣ Start the Application
```bash
php artisan serve
```

The application will run at:  
👉 http://127.0.0.1:8000

---

## 💳 bKash Payment Configuration

### 🔹 Environment Setup
```env
BKASH_USERNAME=your_username
BKASH_PASSWORD=your_password
BKASH_APP_KEY=your_app_key
BKASH_APP_SECRET=your_app_secret

# sandbox | live
BKASH_MODE=sandbox
```

Use `sandbox` for development and `live` for production.

---

## 🧪 Development Notes
- Enable debug mode using `APP_DEBUG=true`
- Logs are stored in `storage/logs/laravel.log`
- Project structure supports easy feature expansion

---

## 🧑‍💻 Contributing
- Fork the repository
- Create a feature branch
- Commit your changes
- Submit a pull request

---

## 📄 License
This project is open-source software licensed under the **MIT License**.

---

## 📞 Contact

**Author:** Al Mamun Simul 
**GitHub:** https://github.com/almamunsimul