@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
  @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Usuários</h1>
    <a href="{{ route('usuarios.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
       Criar novo
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($usuarios as $u)
      <div class="bg-white rounded-2xl shadow p-5">
        <h2 class="text-xl font-semibold mb-2">{{ $u['nome'] }}</h2>
        <p><strong>Email:</strong> {{ $u['email'] }}</p>
        <p><strong>Discord ID:</strong> {{ $u['discord_id'] }}</p>
        <div class="mt-4 flex space-x-2">
          <a href="{{ route('usuarios.edit', $u['id']) }}"
             class="text-yellow-600 hover:underline">Editar</a>

          <form action="{{ route('usuarios.destroy', $u['id']) }}"
                method="POST"
                onsubmit="return confirm('Excluir este usuário?')">
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
