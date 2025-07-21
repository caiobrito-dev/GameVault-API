@extends('layouts.app') {{-- Indica que esta view estende o layout app.blade.php --}}

@section('content') {{-- Define a seção de conteúdo que será injetada no @yield('content') --}}
    <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">Bem-vindo à sua Coleção de Jogos!</h1>

    <section id="content-area" class="bg-gray-100 p-6 rounded-lg shadow-inner">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Visão Geral</h2>
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
                <a href="{{ route('jogos.index') }}" class="btn-primary mt-4">Ver Detalhes</a>
            </div>
            <div class="card flex flex-col items-center text-center">
                <img src="https://placehold.co/150x150/10b981/ffffff?text=Jogo+2" alt="Capa do Jogo 2" class="rounded-lg mb-4 shadow-md">
                <h4 class="text-lg font-bold text-gray-800">Cyberpunk 2077</h4>
                <p class="text-sm text-gray-500">Ano: 2020 | Gênero: RPG de Ação</p>
                <p class="text-sm text-gray-500">Desenvolvedora: CD Projekt Red</p>
                <a href="{{ route('jogos.index') }}" class="btn-primary mt-4">Ver Detalhes</a>
            </div>
            <div class="card flex flex-col items-center text-center">
                <img src="https://placehold.co/150x150/ef4444/ffffff?text=Jogo+3" alt="Capa do Jogo 3" class="rounded-lg mb-4 shadow-md">
                <h4 class="text-lg font-bold text-gray-800">Elden Ring</h4>
                <p class="text-sm text-gray-500">Ano: 2022 | Gênero: RPG de Ação</p>
                <p class="text-sm text-gray-500">Desenvolvedora: FromSoftware</p>
                <a href="{{ route('jogos.index') }}" class="btn-primary mt-4">Ver Detalhes</a>
            </div>
        </div>

        {{-- Bloco para login/cadastro, visível apenas se o usuário NÃO estiver logado --}}
        @guest
            <h3 class="text-xl font-bold text-gray-700 mt-8 mb-4">Acesse sua Coleção</h3>
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                <p class="text-center text-gray-600 mb-4">Faça login ou cadastre-se para gerenciar seus jogos.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('login') }}" class="btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary">Cadastro</a>
                </div>
            </div>
        @endguest
    </section>
@endsection