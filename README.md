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

| Tool/Tech         | Version               | Purpose                            |
|-------------------|-----------------------|------------------------------------|
| Laravel           | 12.21.0               | Core framework                     |
| PHP               | 8.2.12                | Backend logic                      |
| Docker            | 28.1.1 (build 4eba377)| Containerized development          |
| Git               | 2.49.0 (Windows)      | Version control                    |
| Composer          | 2.7+                  | Dependency management              |
| MySQL             | 8.0+                  | Relational database                |
| Node.js (optional)| 20.x                  | Frontend tooling & automation      |
| SonarQube         | Latest                | Code quality and static analysis   |
| SonarLint (VS Code)| 4.27.0 (`sonarsource.sonarlint-vscode`) | Real-time linting and feedback     |

---

## 🚀 Features

- ✅ Create, edit, view, and delete tasks  
- 🔁 Toggle task status (complete/incomplete)  
- 📄 Paginated task list for better UX  
- 🧩 Reusable Blade partials for forms  
- 🧭 Dynamic breadcrumbs for navigation  
- ⚙️ Configurable constants for messages, limits, and labels  
- 🐳 Dockerized setup for consistency  
- 📝 Automated changelog generation  
- 🔐 Git hooks to enforce clean commit messages  
- 🧪 SonarQube & SonarLint integration for code quality

---

## 📦 Getting Started

### 1. Clone the Repository
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

> 🐋 Docker version: 28.1.1, build 4eba377

### 4. Run Migrations
```bash
php artisan migrate
```

---

## 🧠 Smart Design Choices

- All task views (create/edit/show/index) use a shared form partial for consistency  
- Breadcrumbs update dynamically based on the current route  
- Constants like messages and pagination limits are stored in `config/constants.php`  
- Task status toggling is handled cleanly in both controller and model  
- Git commits follow Conventional Commit standards for clarity and automation  
- SonarQube and SonarLint ensure code quality and rule enforcement

---

## 🧪 SonarQube & SonarLint Integration

This project is integrated with SonarQube and SonarLint to maintain high code quality and enforce best practices.

### 🔍 Tools Used

| Tool         | Identifier                        | Version  |
|--------------|------------------------------------|----------|
| SonarLint    | `sonarsource.sonarlint-vscode`     | 4.27.0   |
| SonarQube    | Latest (self-hosted or cloud)      | —        |

### ✅ Rules Followed

- No unused variables or imports  
- Proper naming conventions for classes, methods, and variables  
- Avoid deeply nested logic and long methods  
- Ensure null safety and exception handling  
- Maintain test coverage and avoid duplicated code  
- Follow Laravel and PHP coding standards

### 🛠️ Setup Tips

To enable SonarLint in VS Code:

1. Install the extension:  
   `sonarsource.sonarlint-vscode` (v4.27.0)

2. Connect to your SonarQube server (optional but recommended)

3. Configure project bindings or use standalone mode for local analysis

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

## 🔄 Changelog Automation

This project uses `standard-version` for semantic versioning and changelog generation.

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

To maintain clean and consistent commits, this project uses:

- Husky for Git hooks  
- Commitlint to validate commit messages

### Example Valid Commits:
- `feat: add task toggle functionality`
- `fix: resolve pagination bug`
- `docs: update README with changelog badge`

---

## 📖 License

This project is open-source under the [MIT License](LICENSE).  
Feel free to fork, contribute, or use it as a base for your own ideas.

---

Thanks for checking out the project!  
If you have feedback, ideas, or just want to say hi — I’d love to hear from you. 😊