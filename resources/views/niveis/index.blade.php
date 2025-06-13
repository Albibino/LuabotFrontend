@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
  @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="mb-4">
    <h1 class="text-3xl font-bold text-gray-100">Níveis</h1>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($niveis as $n)
      <div class="bg-white rounded-2xl shadow p-5">
        <p><strong>ID:</strong> {{ $n['id'] }}</p>
        <p><strong>Discord ID:</strong> {{ $n['discord_id'] }}</p>
        <p><strong>Nível:</strong> {{ $n['nivel'] }}</p>
        <p><strong>XP:</strong> {{ $n['xp'] }}</p>
        <div class="mt-4 flex space-x-2">
          <a href="{{ route('niveis.edit', $n['id']) }}"
             class="text-yellow-600 hover:underline">Editar</a>

          <form action="{{ route('niveis.destroy', $n['discord_id']) }}"
                method="POST"
                onsubmit="return confirm('Excluir este nível?')">
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