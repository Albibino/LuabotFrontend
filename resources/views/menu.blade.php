<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Menu Principal') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="{{ route('usuarios.index') }}">
          <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Usuários</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
              Gerencie seus usuários.
            </p>
          </div>
        </a>
        <a href="{{ route('servidores.index') }}">
          <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Servidores</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
              Gerencie seus servidores.
            </p>
          </div>
        </a>
        <a href="{{ route('niveis.index') }}">
          <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Níveis</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
              Níveis e XP dos usuários.
            </p>
          </div>
        </a>
        <a href="{{ route('mensagens.index') }}">
          <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Mensagens</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
              Todas as mensagens.
            </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</x-app-layout>
