@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
  @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-bold text-gray-100">Mensagens</h1>
    <a href="{{ route('mensagens.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Nova Mensagem
    </a>
  </div>

  <div class="space-y-4">
    @foreach($mensagens as $m)
      <div class="bg-white rounded-2xl shadow p-5">
        <p><strong>ID:</strong> {{ $m['id'] }}</p>
        <p><strong>Usuario:</strong> {{ $m['discord_id'] }}</p>
        <p><strong>Servidor:</strong> {{ $m['servidor_id'] }}</p>
        <p><strong>Canal:</strong> {{ $m['canal_id'] }}</p>
        <p><strong>Conteúdo:</strong> {{ $m['conteudo'] }}</p>
        <div class="mt-3 flex space-x-2">
          <form action="{{ route('mensagens.destroy', $m['id']) }}"
                method="POST"
                onsubmit="return confirm('Excluir esta mensagem?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="text-red-600 hover:underline">Excluir</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection