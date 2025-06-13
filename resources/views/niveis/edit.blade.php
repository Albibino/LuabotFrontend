@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
  <h1 class="text-2xl font-bold mb-4 text-gray-100">Editar Nível</h1>

  <form action="{{ route('niveis.update', $nivel['id']) }}"
        method="POST"
        class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label class="block mb-1 text-gray-100">Discord ID</label>
      <input name="discord_id"
             value="{{ old('discord_id', $nivel['discord_id']) }}"
             class="w-full border rounded p-2 @error('discord_id') border-red-500 @enderror">
      @error('discord_id')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block mb-1 text-gray-100">Nível</label>
      <input name="nivel" type="number"
             value="{{ old('nivel', $nivel['nivel']) }}"
             class="w-full border rounded p-2 @error('nivel') border-red-500 @enderror">
      @error('nivel')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block mb-1 text-gray-100">XP</label>
      <input name="xp" type="number"
             value="{{ old('xp', $nivel['xp']) }}"
             class="w-full border rounded p-2 @error('xp') border-red-500 @enderror">
      @error('xp')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
    </div>

    <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
      Atualizar
    </button>
  </form>
</div>
@endsection