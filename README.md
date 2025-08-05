# 🧠 Laravel Tasklist Project — Built with ❤️ by Milan Rohit

Hi there! 👋  
Welcome to my Laravel Tasklist project — a clean, modular, and scalable task management app built with Laravel 12, PHP 8.2, and fully containerized using Docker 28.1.1. This project is designed to be developer-friendly, easy to maintain, and packed with best practices.

Whether you're here to learn, contribute, or just explore, I hope you find this project useful and inspiring.

---

## 👨‍💻 About Me

Milan Rohit  
Software Engineer @ Civica  
📧 rohit.milan3@gmail.com  
📱 +91 8141810925  
🔗 [LinkedIn](https://www.linkedin.com/in/milan-rohit)

---

## 🧰 Tech Stack

Here’s what powers this project:

| Tool/Tech        | Version               | Why It’s Here                     |
|------------------|-----------------------|-----------------------------------|
| Laravel          | 12.21.0               | The heart of the app              |
| PHP              | 8.2.12                | Backend logic and routing         |
| Docker           | 28.1.1 (build 4eba377)| Containerized development         |
| Git              | 2.49.0 (Windows)      | Version control                   |
| Composer         | 2.7+                  | Dependency management             |
| MySQL            | 8.0+                  | Database                          |
| Node.js (optional)| 20.x                 | Frontend tooling & automation     |

---

## 🚀 What This App Can Do

- ✅ Create, edit, view, and delete tasks  
- 🔁 Toggle task status (complete/incomplete)  
- 📄 Paginated task list for better UX  
- 🧩 Reusable Blade partials for forms  
- 🧭 Dynamic breadcrumbs for navigation  
- ⚙️ Configurable constants for messages, limits, and labels  
- 🐳 Dockerized setup for consistency  
- 📝 Automated changelog generation  
- 🔐 Git hooks to enforce clean commit messages

---

## 📦 How to Get Started

### 1. Clone the Repo
```bash
git clone https://github.com/milanrohit/Laravel_Tasklist_Projects.git
cd Laravel_Tasklist_Projects
```

### 2. Install Dependencies
```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Spin Up Docker
```bash
docker-compose up -d
```

> 🐋 Using Docker version: 28.1.1, build 4eba377

### 4. Run Migrations
```bash
php artisan migrate
```

---

## 🧠 Smart Design Choices

- All task views (create/edit/show/index) use the same form partial for consistency  
- Breadcrumbs update dynamically based on your route  
- Constants like messages and pagination limits are stored in `config/constants.php` for easy reuse  
- Toggle task status with a single click — handled cleanly in both controller and model  
- Git commits follow Conventional Commit standards for clarity and automation

---

## 📝 Example Constants

```php
return [
    'TASK_CREATED_MESSAGE' => '✅ Task created successfully!',
    'TASK_UPDATED_MESSAGE' => '✏️ Task updated successfully!',
    'TASK_DELETED_MESSAGE' => '🗑️ Task deleted successfully!',
    'TASK_TOGGLED_MESSAGE' => '🔁 Task status toggled!',
    'PAGINATION_LIMIT' => 10,
];
```

---

## 🔄 Keeping Track of Changes

This project uses `standard-version` to automate changelog updates and semantic versioning.

### Setup:
- `.versionrc` config for emoji-enhanced changelog sections
- `npm run release` to bump version and update `CHANGELOG.md`
- Git tags pushed automatically with `git push --follow-tags`

### Sample `.versionrc`:
```json
{
  "header": "# 📦 Changelog\n\nAll notable changes to this project will be documented in this file.\n",
  "types": [
    { "type": "feat", "section": "✨ Features" },
    { "type": "fix", "section": "🐛 Bug Fixes" },
    { "type": "docs", "section": "📝 Documentation" },
    { "type": "style", "section": "💅 Code Style" },
    { "type": "refactor", "section": "🔨 Refactoring" },
    { "type": "perf", "section": "⚡ Performance Improvements" },
    { "type": "test", "section": "✅ Tests" },
    { "type": "build", "section": "📦 Build System" },
    { "type": "ci", "section": "🔁 CI/CD" },
    { "type": "chore", "section": "🧹 Chores", "hidden": true },
    { "type": "revert", "section": "⏪ Reverts" }
  ]
}
```

---

## 🔐 Commit Like a Pro

To keep commits clean and consistent, this project uses:

- Husky for Git hooks  
- Commitlint to validate commit messages

### Example Valid Commits:
- `feat: add task toggle functionality`
- `fix: resolve pagination bug`
- `docs: update README with changelog badge`

---

## 📖 License

This project is open-source under the [MIT License](LICENSE). Feel free to fork, contribute, or use it as a base for your own ideas.

---

Thanks for checking out the project!  
If you have feedback, ideas, or just want to say hi — I’d love to hear from you. 😊