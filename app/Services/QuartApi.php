<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class QuartApi
{
    protected string $baseUri;

    public function __construct()
    {
        $uri = config('services.quart.base_uri');
        if (empty($uri)) {
            throw new \Exception('QuartApi base URI not configured');
        }
        $this->baseUri = $uri;
    }

    public function listarUsuarios(): array
    {
        return Http::baseUrl($this->baseUri)
                   ->acceptJson()
                   ->get('/api/usuarios/listar')
                   ->throw()
                   ->json();
    }

    public function criarUsuario(array $data): array
    {
        return Http::baseUrl($this->baseUri)
                   ->acceptJson()
                   ->post('/api/usuarios/criar', $data)
                   ->throw()
                   ->json();
    }

    public function atualizarUsuario(int $id, array $data): array
    {
        return Http::baseUrl($this->baseUri)
                   ->acceptJson()
                   ->put("/api/usuarios/atualizar/{$id}", $data)
                   ->throw()
                   ->json();
    }

    public function deletarUsuario(int $id): void
    {
        Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->delete("/api/usuarios/deletar/{$id}")
            ->throw();
    }
}
