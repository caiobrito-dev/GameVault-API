<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f0f2f5;
            }
            .btn-primary {
                @apply bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out;
            }
            .btn-secondary {
                @apply bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out;
            }
            .btn-danger {
                @apply bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out;
            }
            .card {
                @apply bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out;
            }
            .table-auto {
                width: 100%;
                border-collapse: collapse;
            }
            .table-auto th, .table-auto td {
                padding: 0.75rem;
                text-align: left;
                border-bottom: 1px solid #e2e8f0; /* gray-200 */
            }
            .table-auto th {
                background-color: #f8fafc; /* gray-50 */
                font-weight: 600;
                color: #4a5568; /* gray-700 */
            }
        </style>

    </head>

    <body class="flex flex-col min-h-screen">
        <header class="bg-gray-800 text-white p-4 shadow-lg">
            <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
                <a href="" class="text-2xl font-bold text-indigo-400 hover:text-indigo-300 transition duration-300">Game Vault</a>
                <nav class="mt-4 md:mt-0">
                    <ul class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
                        <li><a href="">Home</a></li>
                        <li><a href="">Jogos</a></li>
                        <li><a href="">Plataformas</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main class="flex-grow container mx-auto p-4 md:p-8">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">Bem vindo a sua coleção de jogos</h1>
            <section id="content-area" class="bg-gray-100 p-6 rounded-lg shadow-inner">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Visão geral</h2>
                <p class="text-gray-600 mb-6">
                    Aqui você pode gerenciar sua coleção de jogos e as plataformas onde eles estão disponíveis.
                    Explore, adicione e organize tudo em um só lugar.
                </p>

                <h3 class="text-xl font-bold text-gray-700 mb-4">Meus Jogos Recentes (Exemplo Estático)</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div class="card flex flex-col items-center text-center">
                        <img src="https://placehold.co/150x150/4f46e5/ffffff?text=Jogo+1" alt="Capa do Jogo 1" class="rounded-lg mb-4 shadow-md">
                        <h4 class="text-lg font-bold text-gray-800">The Witcher 3: Wild Hunt</h4>
                        <p class="text-sm text-gray-500">Ano: 2015 | Gênero: RPG</p>
                        <p class="text-sm text-gray-500">Desenvolvedora: CD Projekt Red</p>
                        <a href="index.php?page=jogos" class="btn-primary mt-4">Ver Detalhes</a>
                    </div>
                    <div class="card flex flex-col items-center text-center">
                        <img src="https://placehold.co/150x150/10b981/ffffff?text=Jogo+2" alt="Capa do Jogo 2" class="rounded-lg mb-4 shadow-md">
                        <h4 class="text-lg font-bold text-gray-800">Cyberpunk 2077</h4>
                        <p class="text-sm text-gray-500">Ano: 2020 | Gênero: RPG de Ação</p>
                        <p class="text-sm text-gray-500">Desenvolvedora: CD Projekt Red</p>
                        <a href="index.php?page=jogos" class="btn-primary mt-4">Ver Detalhes</a>
                    </div>
                    <div class="card flex flex-col items-center text-center">
                        <img src="https://placehold.co/150x150/ef4444/ffffff?text=Jogo+3" alt="Capa do Jogo 3" class="rounded-lg mb-4 shadow-md">
                        <h4 class="text-lg font-bold text-gray-800">Elden Ring</h4>
                        <p class="text-sm text-gray-500">Ano: 2022 | Gênero: RPG de Ação</p>
                        <p class="text-sm text-gray-500">Desenvolvedora: FromSoftware</p>
                        <a href="index.php?page=jogos" class="btn-primary mt-4">Ver Detalhes</a>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-gray-700 mt-8 mb-4">Acesse sua Coleção</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                        <p class="text-center text-gray-600 mb-4">Faça login ou cadastre-se para gerenciar seus jogos.</p>
                        <div class="flex justify-center space-x-4">
                            <a href="" class="btn-primary">Login</a>
                            <a href="" class="btn-primary">Cadastro</a>
                        </div>
                    </div>

            </section>
        </main>
    </body>
</html>
