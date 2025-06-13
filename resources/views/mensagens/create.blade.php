@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
  <h1 class="text-2xl font-bold mb-4 text-gray-100">Nova Mensagem</h1>

  <form action="{{ route('mensagens.store') }}" method="POST" class="space-y-4">
    @csrf

    @foreach(['discord_id','servidor_id','canal_id','conteudo'] as $field)
      <div>
        <label class="block mb-1 text-gray-100">{{ ucfirst(str_replace('_',' ', $field)) }}</label>
        <input name="{{ $field }}"
               value="{{ old($field) }}"
               class="w-full border rounded p-2 @error($field) border-red-500 @enderror">
        @error($field)
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
    @endforeach

    <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
      Salvar
    </button>
  </form>
</div>
@endsection