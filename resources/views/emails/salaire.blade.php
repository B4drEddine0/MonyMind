<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification de Salaire MoneyMind</title>
</head>
<body class="bg-gray-100 font-sans leading-normal text-gray-800">
    <div class="max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-secondary px-6 py-4 text-center">
            <h1 class="text-xl font-bold text-white">MoneyMind - Notification de Salaire</h1>
        </div>
        
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4">Bonjour {{$username}},</h2>
            
            <p class="mb-4">Nous sommes ravis de vous informer que votre salaire mensuel a été ajouté à votre solde.</p>
            
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
                <strong class="font-medium text-green-800">Bonne nouvelle !</strong>
                <span class="block text-2xl font-bold text-green-600 my-2">{{ number_format($salaire, 2) }} DH</span>
                <p class="text-green-700">Votre salaire a été crédité sur votre compte avec succès.</p>
            </div>
                        
            <p class="mb-6">N'oubliez pas de mettre à jour votre budget mensuel et de planifier vos dépenses pour optimiser votre gestion financière.</p>
            
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="inline-block bg-secondary hover:bg-opacity-90 text-white font-medium py-2 px-4 rounded-lg shadow transition duration-300">
                    Accéder à mon tableau de bord
                </a>
            </div>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 text-center text-sm text-gray-500 border-t">
            <p class="mb-2">Ce message a été envoyé automatiquement par MoneyMind - votre assistant de gestion budgétaire.</p>
            <p>© {{ date('Y') }} MoneyMind. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>