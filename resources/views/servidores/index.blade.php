@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
  @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold text-gray-100">Servidores</h1>
    <a href="{{ route('servidores.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
       Criar novo
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($servidores as $s)
      <div class="bg-white rounded-2xl shadow p-5">
        <h2 class="text-xl font-semibold mb-2">{{ $s['nome_servidor'] }}</h2>
        <p><strong>Guild ID:</strong> {{ $s['guild_id'] }}</p>
        <p><strong>Admin Discord ID:</strong> {{ $s['admin_discord_id'] }}</p>
        <div class="mt-4 flex space-x-2">
          <a href="{{ route('servidores.edit', $s['id']) }}"
             class="text-yellow-600 hover:underline">Editar</a>
          <form action="{{ route('servidores.destroy', $s['id']) }}"
                method="POST"
                onsubmit="return confirm('Excluir este servidor?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="text-red-600 hover:underline">
              Excluir
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection