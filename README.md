# 📌 Laravel Tasklist Project

A modular and scalable task management application built using Laravel, containerized with Docker, and version-controlled via Git using Conventional Commit standards.

---

## 👨‍💻 Designed & Developed By

Milan Rohit  
Software Engineer at Civica  
📧 Email: rohit.milan3@gmail.com  
📱 Mobile: +91 8141810925  
🔗 [LinkedIn Profile](https://www.linkedin.com/in/milan-rohit)

---

## 🧰 Tech Stack

| Technology         | Version     | Purpose                          |
|--------------------|-------------|----------------------------------|
| Laravel            | 10.x        | PHP framework for web development |
| PHP                | 8.2+        | Backend language                 |
| Docker             | 24.x+       | Containerized development        |
| Git                | 2.42+       | Version control                  |
| Composer           | 2.7+        | Dependency management            |
| MySQL              | 8.0+        | Database (via Docker container)  |
| Node.js (optional) | 20.x        | Frontend tooling (e.g. Vite)     |

---

## 🚀 Features

- ✅ Task creation, editing, viewing, and deletion
- ✅ Blade templating for clean UI
- ✅ MVC architecture with Eloquent ORM
- ✅ Route management via `routes/web.php`
- ✅ Configurable constants via `config/constants.php`
- ✅ Modular controller logic (`TaskController`)
- ✅ Git-based version control with Conventional Commits
- ✅ Dockerized setup for consistent development environments

---

## 📦 Installation & Setup

### 🔧 Clone & Install
```bash
git clone https://github.com/milanrohit/Laravel_Tasklist_Projects.git
cd Laravel_Tasklist_Projects
composer install
cp .env.example .env
php artisan key:generate