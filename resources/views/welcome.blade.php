<!-- filepath: /c:/xampp/htdocs/Briefs/Brief-15/moneymind/resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Votre Assistant Financier Intelligent</title>
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
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-secondary/5 to-accent/5"></div>
        <div id="particles" class="absolute inset-0"></div>
    </div>

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
                <a href="/login" class="hidden md:block hover:text-secondary transition-colors">Connexion</a>
                <a href="/register" class="px-6 py-2 bg-gradient-to-r from-secondary to-accent text-white font-medium rounded-full hover:shadow-lg transition-all transform hover:-translate-y-0.5">S'inscrire</a>
            </div>
        </div>
    </nav>


    <section class="relative pt-10 pb-20 md:pt-20 md:pb-32">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-primary mb-6">
                        <span class="inline-block relative">
                            Maîtrisez
                            <div class="absolute -bottom-2 left-0 h-3 w-full bg-accent/30 -skew-y-3 -z-10"></div>
                        </span> vos finances avec l'IA
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">Une nouvelle approche de la gestion budgétaire personnelle, qui comprend vos objectifs et vous aide à les atteindre.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register" class="px-8 py-3 bg-gradient-to-r from-secondary to-accent text-white font-medium rounded-full hover:shadow-xl transition-all transform hover:-translate-y-1 text-center">
                            Commencer gratuitement
                        </a>
                        <a href="#features" class="px-8 py-3 border border-gray-300 rounded-full text-primary font-medium hover:border-secondary hover:bg-gray-50 transition-colors text-center">
                            Découvrir les fonctionnalités
                        </a>
                    </div>
                    <div class="mt-10 flex items-center">
                        <div class="flex -space-x-2">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=2" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=3" alt="User">
                        </div>
                        <p class="ml-4 text-sm text-gray-500">Rejoint par <span class="font-medium text-primary">+3,500</span> utilisateurs</p>
                    </div>
                </div>
                <div class="md:w-1/2 relative">
                    <div class="w-full h-80 md:h-[450px] bg-gradient-to-br from-secondary/20 to-accent/20 rounded-2xl overflow-hidden relative">
                        <div class="absolute inset-4 bg-white rounded-xl shadow-xl overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1579621970588-a35d0e7ab9b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Dashboard Preview" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex items-end">
                                <div class="p-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full bg-danger animate-pulse"></div>
                                        <p class="text-white text-sm font-medium">IA activée</p>
                                    </div>
                                    <p class="text-white/90 text-sm mt-1">Suggestion: "Basé sur vos dépenses récentes, vous pourriez économiser 320 DH ce mois-ci."</p>
                                </div>
                            </div>
                        </div>
            
                        <div class="absolute top-4 right-4 w-16 h-16 bg-accent/30 rounded-full blur-xl"></div>
                        <div class="absolute bottom-10 left-4 w-12 h-12 bg-secondary/40 rounded-full blur-lg"></div>
                    </div>
        
                    <div class="absolute -top-6 -right-4 bg-white rounded-lg shadow-lg p-4 w-32 rotate-6 hidden md:block">
                        <div class="h-2 w-16 bg-secondary/30 rounded-full mb-2"></div>
                        <div class="h-2 w-12 bg-gray-200 rounded-full"></div>
                    </div>
                    <div class="absolute -bottom-4 -left-6 bg-white rounded-lg shadow-lg p-3 rotate--3 hidden md:block">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-accent/20 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            <span class="text-xs font-medium text-primary">+24% d'épargne</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Fonctionnalités intelligentes</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Prenez le contrôle de vos finances avec des outils conçus pour vous aider à atteindre vos objectifs.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                    <div class="w-14 h-14 bg-secondary/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-xl mb-3 text-primary">Suivi Intelligent</h3>
                    <p class="text-gray-600">Suivez automatiquement vos revenus et dépenses avec des catégories personnalisables selon votre style de vie.</p>
                </div>
           
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                    <div class="w-14 h-14 bg-accent/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-xl mb-3 text-primary">Objectifs d'Épargne</h3>
                    <p class="text-gray-600">Définissez et atteignez vos objectifs financiers grâce à des suggestions personnalisées basées sur l'IA.</p>
                </div>
                
            
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                    <div class="w-14 h-14 bg-danger/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-xl mb-3 text-primary">Alertes Personnalisées</h3>
                    <p class="text-gray-600">Recevez des notifications intelligentes pour rester dans votre budget et éviter les dépenses imprévues.</p>
                </div>
        
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-xl mb-3 text-primary">Dépenses Récurrentes</h3>
                    <p class="text-gray-600">Automatisez la gestion de vos dépenses mensuelles et récurrentes pour ne plus jamais manquer un paiement.</p>
                </div>
           
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                    <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-xl mb-3 text-primary">IA Conseillère</h3>
                    <p class="text-gray-600">Bénéficiez de conseils personnalisés et d'analyses détaillées pour optimiser votre gestion financière.</p>
                </div>
                
    
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-xl mb-3 text-primary">Liste de Souhaits</h3>
                    <p class="text-gray-600">Gérez vos envies d'achats et suivez votre progression pour les réaliser sans compromettre votre budget.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Comment ça fonctionne</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Trois étapes simples pour prendre le contrôle de vos finances</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="relative mx-auto mb-6">
                        <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto">
                            <span class="text-xl font-bold text-secondary">1</span>
                        </div>
                        <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-secondary/50 to-transparent -z-10"></div>
                    </div>
                    <h3 class="font-semibold text-xl mb-2">Inscrivez-vous</h3>
                    <p class="text-gray-600">Créez votre compte et configurez votre salaire mensuel et vos dépenses récurrentes</p>
                </div>
                
                <div class="text-center">
                    <div class="relative mx-auto mb-6">
                        <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto">
                            <span class="text-xl font-bold text-accent">2</span>
                        </div>
                        <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-accent/50 to-transparent -z-10"></div>
                    </div>
                    <h3 class="font-semibold text-xl mb-2">Ajoutez vos dépenses</h3>
                    <p class="text-gray-600">Suivez vos dépenses quotidiennes et définissez vos objectifs d'épargne</p>
                </div>
                
                <div class="text-center">
                    <div class="relative mx-auto mb-6">
                        <div class="w-16 h-16 bg-danger/10 rounded-full flex items-center justify-center mx-auto">
                            <span class="text-xl font-bold text-danger">3</span>
                        </div>
                    </div>
                    <h3 class="font-semibold text-xl mb-2">Recevez des conseils</h3>
                    <p class="text-gray-600">Notre IA analyse vos habitudes et vous propose des recommandations personnalisées</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-r from-primary to-secondary text-white">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Prêt à transformer votre gestion financière?</h2>
                    <p class="text-white/80 max-w-lg">Rejoignez des milliers d'utilisateurs qui ont déjà amélioré leur santé financière avec MoneyMind.</p>
                </div>
                <div>
                    <a href="/register" class="inline-block px-8 py-3 bg-white text-primary font-medium rounded-full hover:shadow-xl transition-all transform hover:-translate-y-1">
                        Commencer gratuitement
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <a href="/" class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-secondary to-accent flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-primary">MoneyMind</span>
                    </a>
                    <p class="text-sm text-gray-500 mt-2">© 2025 MoneyMind. Tous droits réservés.</p>
                </div>
                <div class="flex gap-8">
                    <a href="#" class="text-gray-500 hover:text-secondary">Mentions légales</a>
                    <a href="#" class="text-gray-500 hover:text-secondary">Confidentialité</a>
                    <a href="#" class="text-gray-500 hover:text-secondary">Contact</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>