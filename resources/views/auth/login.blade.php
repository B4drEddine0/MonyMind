<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Connexion</title>
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
    <nav class="relative z-10 py-6 px-4 md:px-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <div class="flex items-center space-x-1">
                    <div class="h-9 w-9 rounded-lg bg-secondary flex items-center justify-center shadow-sm">
                        <span class="text-white font-extrabold text-lg">M</span>
                    </div>
                    <span class="text-xl font-bold text-primary ml-1">oney</span>
                    <div class="h-9 w-9 rounded-lg bg-accent flex items-center justify-center -ml-2 shadow-sm">
                        <span class="text-white font-extrabold text-lg">M</span>
                    </div>
                    <span class="text-xl font-bold text-primary ml-1">ind</span>
                </div>
            </a>
            <div class="flex items-center gap-4">
                <a href="/register" class="text-gray-600 hover:text-secondary transition-colors">S'inscrire</a>
            </div>
        </div>
    </nav>

    <div class="max-w-md mx-auto mt-8 mb-16 px-4">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-secondary to-accent p-6">
                <h2 class="text-2xl font-bold text-white">Bienvenue</h2>
                <p class="text-white/80">Connectez-vous à votre compte MoneyMind</p>
            </div>
            <div class="p-8">
                @if (session('status'))
                    <div class="bg-blue-50 text-blue-600 p-4 rounded-lg mb-6">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" class="py-2 pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="exemple@email.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" class="py-2 pl-10 w-full rounded-lg border-gray-300 focus:border-secondary focus:ring focus:ring-secondary/20 transition-all" type="password" name="password" required autocomplete="current-password">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-secondary focus:ring-secondary/30" name="remember">
                            <span class="ms-2 text-sm text-gray-600">Se souvenir de moi</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a class="text-sm text-secondary hover:text-secondary/80 transition-colors" href="{{ route('password.request') }}">
                                Mot de passe oublié?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-secondary to-accent text-white font-medium rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        Se connecter
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Pas encore de compte? 
                        <a href="{{ route('register') }}" class="text-secondary font-medium hover:text-secondary/80 transition-colors">
                            Inscrivez-vous
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>