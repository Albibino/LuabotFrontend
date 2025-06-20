<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('luabot.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-7 py-3.5 dark:text-[#EDEDEC] text-[#1b1b18] border-2 border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-lg text-lg leading-normal font-medium shadow-sm hover:shadow-md transition-all duration-200">
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-7 py-3.5 dark:text-[#EDEDEC] border-2 border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-lg text-lg leading-normal font-medium shadow-sm hover:shadow-md transition-all duration-200">
                                Registrar-se
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[450px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row lg:h-[500px]">
                <div class="text-[14px] leading-[21px] flex-1 p-8 pb-16 lg:p-28 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none flex flex-col justify-center">
                    
                    <div>
                        <h1 class="mb-3 font-medium text-xl lg:text-2xl">Seja bem vindo ao Luabot!</h1>
                        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A] text-base">Seu gerenciador do Luabot está aqui! Gerencie suas configurações e explore todas as funcionalidades disponíveis.</p>
                        
                    </div>
                </div>

                <div class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[550px] shrink-0 overflow-hidden">
                    <img src="{{ asset('luabot.png') }}" alt="Luabot" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
