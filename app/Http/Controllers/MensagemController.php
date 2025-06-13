<?php

namespace App\Http\Controllers;

use App\Services\QuartApi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MensagemController extends Controller
{
    public function __construct(private QuartApi $api) {}

    public function index(): View
    {
        $mensagens = $this->api->listarMensagens();
        return view('mensagens.index', compact('mensagens'));
    }

    public function show(int $id): View
    {
        $mensagem = $this->api->detalheMensagem($id);
        return view('mensagens.show', compact('mensagem'));
    }

    public function create(): View
    {
        return view('mensagens.create');
    }

    public function store(Request $req): RedirectResponse
    {
        $data = $req->validate([
            'discord_id'    => 'required|string',
            'servidor_id'   => 'required|string',
            'canal_id'      => 'required|string',
            'conteudo'      => 'required|string',
        ]);

        $this->api->criarMensagem($data);

        return redirect()->route('mensagens.index')
                         ->with('success', 'Mensagem criada!');
    }

    public function edit(int $id): View
    {
        $mensagem = $this->api->detalheMensagem($id);
        return view('mensagens.edit', compact('mensagem'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->api->deletarMensagem($id);
        return redirect()->route('mensagens.index')
                         ->with('success', 'Mensagem excluída!');
    }

    // Filtros extras (opcionais)
    public function byUser(string $discord_id): View
    {
        $mensagens = $this->api->mensagensPorUsuario($discord_id);
        return view('mensagens.index', compact('mensagens'));
    }

    public function byServer(string $servidor_id): View
    {
        $mensagens = $this->api->mensagensPorServidor($servidor_id);
        return view('mensagens.index', compact('mensagens'));
    }

    public function destroyByUser(string $discord_id): RedirectResponse
    {
        $this->api->deletarMensagensPorUsuario($discord_id);
        return redirect()->route('mensagens.index')
                         ->with('success', 'Mensagens do usuário excluídas!');
    }

    public function destroyByServer(string $servidor_id): RedirectResponse
    {
        $this->api->deletarMensagensPorServidor($servidor_id);
        return redirect()->route('mensagens.index')
                         ->with('success', 'Mensagens do servidor excluídas!');
    }
}