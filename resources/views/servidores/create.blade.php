@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
  <h1 class="text-2xl font-bold mb-4 text-gray-100">Criar Servidor</h1>

  <form action="{{ route('servidores.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label class="block mb-1 text-gray-100">Guild ID</label>
      <input name="guild_id" value="{{ old('guild_id') }}"
             class="w-full border rounded p-2 @error('guild_id') border-red-500 @enderror">
      @error('guild_id')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block mb-1 text-gray-100">Nome do Servidor</label>
      <input name="nome_servidor" value="{{ old('nome_servidor') }}"
             class="w-full border rounded p-2 @error('nome_servidor') border-red-500 @enderror">
      @error('nome_servidor')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block mb-1 text-gray-100">Admin Discord ID</label>
      <input name="admin_discord_id" value="{{ old('admin_discord_id') }}"
             class="w-full border rounded p-2 @error('admin_discord_id') border-red-500 @enderror">
      @error('admin_discord_id')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
      Salvar
    </button>
  </form>
</div>
@endsection