<?php

namespace App\Http\Controllers;

use App\Services\QuartApi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServidorController extends Controller
{
    public function __construct(private QuartApi $api) {}

    public function index(): View
    {
        $servidores = $this->api->listarServidores();
        return view('servidores.index', compact('servidores'));
    }

    public function create(): View
    {
        return view('servidores.create');
    }

    public function store(Request $req): RedirectResponse
    {
        $data = $req->validate([
            'guild_id'         => 'required|string',
            'nome_servidor'    => 'required|string',
            'admin_discord_id' => 'required|string',
        ]);

        $this->api->criarServidor($data);

        return redirect()->route('servidores.index')
                         ->with('success', 'Servidor criado!');
    }

    public function edit(int $id): View
    {
        $srv = collect($this->api->listarServidores())
                 ->first(fn($s) => $s['id'] == $id);

        return view('servidores.edit', ['servidor' => $srv]);
    }

    public function update(Request $req, int $id): RedirectResponse
    {
        $data = $req->validate([
            'guild_id'         => 'required|string',
            'nome_servidor'    => 'required|string',
            'admin_discord_id' => 'required|string',
        ]);

        $this->api->atualizarServidor($id, $data);

        return redirect()->route('servidores.index')
                         ->with('success', 'Servidor atualizado!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->api->deletarServidor($id);

        return redirect()->route('servidores.index')
                         ->with('success', 'Servidor excluído!');
    }
}