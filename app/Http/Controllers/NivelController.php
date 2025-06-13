<?php

namespace App\Http\Controllers;

use App\Services\QuartApi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NivelController extends Controller
{
    public function __construct(private QuartApi $api) {}

    public function index(): View
    {
        $niveis = $this->api->listarNiveis();
        return view('niveis.index', compact('niveis'));
    }

    public function edit(int $id): View
    {
        $nivel = collect($this->api->listarNiveis())
                  ->first(fn($n)=> $n['id'] == $id);

        return view('niveis.edit', ['nivel' => $nivel]);
    }

    public function update(Request $req, int $id): RedirectResponse
    {
        $data = $req->validate([
            'discord_id' => 'required|string',
            'nivel'      => 'required|integer|min:0',
            'xp'         => 'required|integer|min:0',
        ]);

        $this->api->atualizarNivel($id, $data);

        return redirect()->route('niveis.index')
                         ->with('success', 'Nível atualizado!');
    }

    public function destroy(string $discord_id): RedirectResponse
    {
        $this->api->deletarNivelPorDiscord($discord_id);

        return redirect()->route('niveis.index')
                         ->with('success', 'Nível excluído!');
    }
}
