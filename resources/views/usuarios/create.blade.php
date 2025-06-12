@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
  <h1 class="text-2xl font-bold mb-4 text-gray-100">Criar Usuário</h1>

  <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label class="block mb-1 text-gray-100">Nome</label>
      <input name="nome" value="{{ old('nome') }}"
             class="w-full border rounded p-2 @error('nome') border-red-500 @enderror">
      @error('nome')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block mb-1 text-gray-100">Email</label>
      <input name="email" value="{{ old('email') }}"
             class="w-full border rounded p-2 @error('email') border-red-500 @enderror">
      @error('email')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block mb-1 text-gray-100">Discord ID</label>
      <input name="discord_id" value="{{ old('discord_id') }}"
             class="w-full border rounded p-2 @error('discord_id') border-red-500 @enderror">
      @error('discord_id')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>
    <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
      Salvar
    </button>
  </form>
</div>
@endsection