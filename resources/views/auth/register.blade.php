<!-- filepath: /c:/xampp/htdocs/Briefs/Brief-15/moneymind/resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0D1B2A',
                        secondary: '#2A9D8F',
                        accent: '#E9C46A',
                        danger: '#E76F51',
                        light: '#F8F9FA',
                    },
                    fontFamily: {
                        sans: ['Manrope', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Animated Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-secondary/5 to-accent/5"></div>
        <div id="particles" class="absolute inset-0"></div>
    </div>

    <!-- Navigation -->
    <nav class="relative z-10 py-6 px-4 md:px-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-secondary to-accent flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xl font-bold text-primary">MoneyMind</span>
            </a>
            <div class="flex items-center gap-4">
                <a href="/login" class="text-gray-600 hover:text-secondary transition-colors">Connexion</a>
            </div>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="max-w-md mx-auto mt-8 mb-16 px-4">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-secondary to-accent p-6">
                <h2 class="text-2xl font-bold text-white">Créer un compte</h2>
                <p class="text-white/80">Rejoignez MoneyMind pour gérer vos finances</p>
            </div>
            <div class="p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="name" class="pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" class="pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Monthly Salary -->
                    <div class="mb-6">
                        <label for="monthly_salary" class="block text-sm font-medium text-gray-700 mb-1">Salaire mensuel (DH)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input id="monthly_salary" class="pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" type="number" name="monthly_salary" value="{{ old('monthly_salary') }}" required>
                        </div>
                        @error('monthly_salary')
                            <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salary Date -->
                    <div class="mb-6">
                        <label for="salary_date" class="block text-sm font-medium text-gray-700 mb-1">Date de crédit du salaire</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="salary_date" 
                                   type="date" 
                                   name="salary_date" 
                                   value="{{ old('salary_date') }}" 
                                   class="pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" 
                                   required>
                        </div>
                        @error('salary_date')
                            <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" class="pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" type="password" name="password" required autocomplete="new-password">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password_confirmation" class="pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-secondary to-accent text-white font-medium rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        S'inscrire
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Vous avez déjà un compte? 
                        <a href="{{ route('login') }}" class="text-secondary font-medium hover:text-secondary/80 transition-colors">
                            Connectez-vous
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple particles effect for background
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            
            function createParticle() {
                const particle = document.createElement('div');
                
                // Random position
                const posX = Math.random() * 100;
                const delay = Math.random() * 5;
                
                // Random financial symbol
                const symbols = ['$', '€', '¥', '£', '%', '💰', '💸', '📊', '📈'];
                const symbol = symbols[Math.floor(Math.random() * symbols.length)];
                
                particle.innerHTML = symbol;
                particle.className = 'absolute text-gray-200 opacity-10';
                particle.style.left = `${posX}%`;
                particle.style.top = '-20px';
                particle.style.fontSize = `${Math.random() * 20 + 10}px`;
                particle.style.animation = `float ${Math.random() * 15 + 10}s linear infinite`;
                particle.style.animationDelay = `${delay}s`;
                
                particlesContainer.appendChild(particle);
                
                // Remove particle after animation
                setTimeout(() => {
                    particle.remove();
                }, 25000 + delay * 1000);
            }
            
            // Create initial particles
            for (let i = 0; i < 20; i++) {
                createParticle();
            }
            
            // Create new particles periodically
            setInterval(createParticle, 800);
        });
    </script>

    <style>
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.1;
            }
            90% {
                opacity: 0.1;
            }
            100% {
                transform: translateY(calc(100vh + 20px)) rotate(360deg);
                opacity: 0;
            }
        }
        
        input:focus {
            outline: none;
        }
    </style>
</body>
</html>