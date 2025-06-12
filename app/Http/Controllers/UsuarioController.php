<?php
namespace App\Http\Controllers;

use App\Services\QuartApi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    public function __construct(private QuartApi $api) {}

    public function index(): View
    {
        $usuarios = $this->api->listarUsuarios();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create(): View
    {
        return view('usuarios.create');
    }

    public function store(Request $req): RedirectResponse
    {
        $data = $req->validate([
            'nome'       => 'required|string',
            'email'      => 'required|email',
            'discord_id' => 'required|string',
        ]);
        $data['admin'] = $req->boolean('admin');
        $this->api->criarUsuario($data);
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário criado!');
    }

    public function edit(int $id): View
    {
        $u = collect($this->api->listarUsuarios())
             ->first(fn($u)=> $u['id']==$id);
        return view('usuarios.edit', ['usuario' => $u]);
    }

    public function update(Request $req, int $id): RedirectResponse
    {
        $data = $req->validate([
            'nome'       => 'required|string',
            'email'      => 'required|email',
            'discord_id' => 'required|string',
        ]);
        $data['admin'] = $req->boolean('admin');
        $this->api->atualizarUsuario($id, $data);
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário atualizado!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->api->deletarUsuario($id);
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário excluído!');
    }
}