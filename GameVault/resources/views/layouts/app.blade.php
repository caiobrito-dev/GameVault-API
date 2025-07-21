<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameVault - Minha Coleção de Jogos</title> {{-- Título atualizado --}}

    {{-- Favicon: Usando um link direto para uma imagem PNG online --}}
    <link rel="shortcut icon" href="https://e7.pngegg.com/pngimages/147/893/png-clipart-joystick-game-controller-video-game-icon-video-game-controller-monochrome-video-game-thumbnail.png" type="image/png">

    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Estilos Personalizados --}}
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
            <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-400 hover:text-indigo-300 transition duration-300">GameVault</a>
            <nav class="mt-4 md:mt-0">
                <ul class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:text-indigo-400 transition duration-300">Home</a></li>
                    <li><a href="{{ route('jogos.index') }}" class="hover:text-indigo-400 transition duration-300">Jogos</a></li>
                    <li><a href="{{ route('plataformas.index') }}" class="hover:text-indigo-400 transition duration-300">Plataformas</a></li>

                    {{-- Links visíveis apenas para administradores --}}
                    @auth {{-- Verifica se o usuário está logado --}}
                        @if (Auth::user()->isAdmin()) {{-- Verifica se o usuário logado é admin --}}
                            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-yellow-400 transition duration-300">Admin Dashboard</a></li>
                            <li><a href="{{ route('admin.jogos.index') }}" class="hover:text-yellow-400 transition duration-300">Gerenciar Jogos</a></li>
                            <li><a href="{{ route('admin.plataformas.index') }}" class="hover:text-yellow-400 transition duration-300">Gerenciar Plataformas</a></li>
                        @endif
                        <li><span class="text-white">Olá, {{ Auth::user()->username }}!</span></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf {{-- Token CSRF para segurança --}}
                                <button type="submit" class="hover:text-indigo-400 transition duration-300">Sair</button>
                            </form>
                        </li>
                    @else {{-- Se o usuário NÃO estiver logado --}}
                        <li><a href="{{ route('login') }}" class="hover:text-indigo-400 transition duration-300">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-indigo-400 transition duration-300">Cadastro</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto p-4 md:p-8">
        {{-- Bloco para exibir mensagens de sucesso --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Bloco para exibir mensagens de erro (gerais ou de validação) --}}
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Bloco para exibir erros de validação do formulário --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Conteúdo específico de cada página será injetado aqui --}}
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center mt-auto shadow-inner">
        <div class="container mx-auto">
            <p>&copy; {{ date('Y') }} GameVault. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>