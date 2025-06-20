<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Organize Your Life</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(50px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        pulseGlow: {
                            '0%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)' },
                            '100%': { boxShadow: '0 0 40px rgba(59, 130, 246, 0.8)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen text-white overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-black/20 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg animate-pulse-glow"></div>
                    <span class="text-xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">TaskFlow</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#features" class="hover:text-blue-400 transition-colors duration-300">Features</a>
                    <a href="#demo" class="hover:text-purple-400 transition-colors duration-300">Demo</a>
                    <a href="#about" class="hover:text-pink-400 transition-colors duration-300">About</a>
                </div>
                <button id="mobileMenu" class="md:hidden p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center animate-fade-in">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent animate-float">
                    Organize Your Life
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Transform chaos into clarity with our intelligent task management system. 
                    <span class="text-blue-400">Plan</span>, 
                    <span class="text-purple-400">Execute</span>, and 
                    <span class="text-pink-400">Achieve</span> more than ever before.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button id="getStarted" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full text-lg font-semibold hover:scale-105 transform transition-all duration-300 shadow-lg hover:shadow-blue-500/25 animate-pulse-glow">
                        Get Started Free
                    </button>
                    <button id="watchDemo" class="px-8 py-4 border-2 border-white/20 rounded-full text-lg font-semibold hover:bg-white/10 transition-all duration-300 hover:border-white/40">
                        Watch Demo
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Task Demo -->
    <section id="demo" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                Try It Live
            </h2>
            <div class="bg-white/5 backdrop-blur-lg rounded-2xl p-6 border border-white/10 shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold">My Tasks</h3>
                    <div class="flex space-x-2">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-2 mb-6">
                    <input id="taskInput" type="text" placeholder="Add a new task..." 
                           class="flex-1 px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <button id="addTask" class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg hover:scale-105 transform transition-all duration-300 font-semibold">
                        Add Task
                    </button>
                </div>
                
                <div id="taskList" class="space-y-3">
                    <div class="task-item flex items-center justify-between p-4 bg-white/5 rounded-lg border border-white/10 hover:bg-white/10 transition-all duration-300 animate-slide-up">
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" class="w-5 h-5 rounded border-gray-400 text-blue-600 focus:ring-blue-500">
                            <span>Design the user interface</span>
                        </div>
                        <button class="delete-btn text-red-400 hover:text-red-300 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="task-item flex items-center justify-between p-4 bg-white/5 rounded-lg border border-white/10 hover:bg-white/10 transition-all duration-300 animate-slide-up">
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" class="w-5 h-5 rounded border-gray-400 text-blue-600 focus:ring-blue-500">
                            <span>Implement core functionality</span>
                        </div>
                        <button class="delete-btn text-red-400 hover:text-red-300 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                Powerful Features
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="feature-card p-6 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-2xl border border-white/10 hover:border-blue-500/50 transition-all duration-300 hover:scale-105 group">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg mb-4 flex items-center justify-center group-hover:animate-pulse">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-blue-400">Smart Organization</h3>
                    <p class="text-gray-300">Automatically categorize and prioritize your tasks with AI-powered intelligence.</p>
                </div>
                
                <div class="feature-card p-6 bg-gradient-to-br from-purple-500/10 to-pink-500/10 rounded-2xl border border-white/10 hover:border-purple-500/50 transition-all duration-300 hover:scale-105 group">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg mb-4 flex items-center justify-center group-hover:animate-pulse">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-purple-400">Lightning Fast</h3>
                    <p class="text-gray-300">Blazing fast performance with real-time updates and instant synchronization.</p>
                </div>
                
                <div class="feature-card p-6 bg-gradient-to-br from-pink-500/10 to-red-500/10 rounded-2xl border border-white/10 hover:border-pink-500/50 transition-all duration-300 hover:scale-105 group">
                    <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg mb-4 flex items-center justify-center group-hover:animate-pulse">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-pink-400">Team Collaboration</h3>
                    <p class="text-gray-300">Share tasks and collaborate seamlessly with your team members in real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-black/20">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="stat-item">
                    <div class="text-3xl md:text-4xl font-bold text-blue-400 mb-2" data-count="50000">0</div>
                    <div class="text-gray-400">Active Users</div>
                </div>
                <div class="stat-item">
                    <div class="text-3xl md:text-4xl font-bold text-purple-400 mb-2" data-count="1000000">0</div>
                    <div class="text-gray-400">Tasks Completed</div>
                </div>
                <div class="stat-item">
                    <div class="text-3xl md:text-4xl font-bold text-pink-400 mb-2" data-count="99">0</div>
                    <div class="text-gray-400">% Uptime</div>
                </div>
                <div class="stat-item">
                    <div class="text-3xl md:text-4xl font-bold text-green-400 mb-2" data-count="24">0</div>
                    <div class="text-gray-400">Support Hours</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="about" class="py-12 px-4 sm:px-6 lg:px-8 border-t border-white/10">
        <div class="max-w-7xl mx-auto text-center">
            <div class="flex items-center justify-center space-x-2 mb-4">
                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg"></div>
                <span class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">TaskFlow</span>
            </div>
            <p class="text-gray-400 mb-6">Making productivity beautiful and effortless for everyone.</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Privacy</a>
                <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors duration-300">Terms</a>
                <a href="#" class="text-gray-400 hover:text-pink-400 transition-colors duration-300">Contact</a>
            </div>
        </div>
    </footer>

    <script>
        // Interactive functionality
        const taskInput = document.getElementById('taskInput');
        const addTaskBtn = document.getElementById('addTask');
        const taskList = document.getElementById('taskList');
        let taskCount = 2;

        // Add task functionality
        function addTask() {
            const taskText = taskInput.value.trim();
            if (taskText === '') return;

            const taskItem = document.createElement('div');
            taskItem.className = 'task-item flex items-center justify-between p-4 bg-white/5 rounded-lg border border-white/10 hover:bg-white/10 transition-all duration-300 animate-slide-up group';
            taskItem.innerHTML = `
                <div class="flex items-center space-x-3">
                    <input type="checkbox" class="w-5 h-5 rounded border-gray-400 text-blue-600 focus:ring-blue-500">
                    <span>${taskText}</span>
                </div>
                <button class="delete-btn text-red-400 hover:text-red-300 opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;

            taskList.appendChild(taskItem);
            taskInput.value = '';
            taskCount++;

            // Add delete functionality
            const deleteBtn = taskItem.querySelector('.delete-btn');
            deleteBtn.addEventListener('click', () => {
                taskItem.style.transform = 'translateX(100%)';
                taskItem.style.opacity = '0';
                setTimeout(() => taskItem.remove(), 300);
            });

            // Add checkbox functionality
            const checkbox = taskItem.querySelector('input[type="checkbox"]');
            const taskSpan = taskItem.querySelector('span');
            checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                    taskSpan.style.textDecoration = 'line-through';
                    taskSpan.style.opacity = '0.6';
                } else {
                    taskSpan.style.textDecoration = 'none';
                    taskSpan.style.opacity = '1';
                }
            });
        }

        addTaskBtn.addEventListener('click', addTask);
        taskInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') addTask();
        });

        // Delete existing tasks
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const taskItem = e.target.closest('.task-item');
                taskItem.style.transform = 'translateX(100%)';
                taskItem.style.opacity = '0';
                setTimeout(() => taskItem.remove(), 300);
            });
        });

        // Checkbox functionality for existing tasks
        document.querySelectorAll('.task-item input[type="checkbox"]').forEach(checkbox => {
            const taskSpan = checkbox.closest('.task-item').querySelector('span');
            checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                    taskSpan.style.textDecoration = 'line-through';
                    taskSpan.style.opacity = '0.6';
                } else {
                    taskSpan.style.textDecoration = 'none';
                    taskSpan.style.opacity = '1';
                }
            });
        });

        // Smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Button interactions
        document.getElementById('getStarted').addEventListener('click', () => {
            document.getElementById('demo').scrollIntoView({ behavior: 'smooth' });
        });

        document.getElementById('watchDemo').addEventListener('click', () => {
            document.getElementById('demo').scrollIntoView({ behavior: 'smooth' });
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('[data-count]');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 40);
            });
        }

        // Trigger counter animation when section is visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('.stat-item').closest('section');
        observer.observe(statsSection);

        // Mobile menu toggle
        document.getElementById('mobileMenu').addEventListener('click', function() {
            // Simple mobile menu implementation
            alert('Mobile menu would open here!');
        });

        // Add hover effects to feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px) scale(1.02)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>