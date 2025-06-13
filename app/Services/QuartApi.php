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

    public function listarServidores(): array
    {
        return Http::baseUrl($this->baseUri)
        ->acceptJson()
        ->get('/api/servidores/listar')
        ->throw()
        ->json();
    }

    public function criarServidor(array $data): array
    {
        return Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->post('/api/servidores/criar', $data)
            ->throw()
            ->json();
    }

    public function atualizarServidor(int $id, array $data): array
    {
        return Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->put("/api/servidores/atualizar/{$id}", $data)
            ->throw()
            ->json();
    }

    public function deletarServidor(int $id): void
    {
        Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->delete("/api/servidores/deletar/{$id}")
            ->throw();
    }

    public function listarNiveis(): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->get('/api/niveis/listar')
                ->throw()
                ->json();
    }

    public function getNivelPorUsuario(string $discordId): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->get("/api/niveis/usuario/{$discordId}")
                ->throw()
                ->json();
    }

    public function atualizarNivel(int $id, array $data): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->put("/api/niveis/atualizar/{$id}", $data)
                ->throw()
                ->json();
    }

    public function deletarNivelPorDiscord(string $discordId): void
    {
        Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->delete("/api/niveis/deletar/usuario/{$discordId}")
            ->throw();
    }

    public function listarMensagens(): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->get('/api/mensagens/listar')
                ->throw()
                ->json();
    }

    public function detalheMensagem(int $id): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->get("/api/mensagens/id/{$id}")
                ->throw()
                ->json();
    }

    public function mensagensPorUsuario(string $discordId): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->get("/api/mensagens/usuario/{$discordId}")
                ->throw()
                ->json();
    }

    public function mensagensPorServidor(string $servidorId): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->get("/api/mensagens/servidor/{$servidorId}")
                ->throw()
                ->json();
    }

    public function criarMensagem(array $data): array
    {
        return Http::baseUrl($this->baseUri)
                ->acceptJson()
                ->post('/api/mensagens/criar', $data)
                ->throw()
                ->json();
    }

    public function deletarMensagem(int $id): void
    {
        Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->delete("/api/mensagens/deletar/{$id}")
            ->throw();
    }

    public function deletarMensagensPorUsuario(string $discordId): void
    {
        Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->delete("/api/mensagens/deletar/usuario/{$discordId}")
            ->throw();
    }

    public function deletarMensagensPorServidor(string $servidorId): void
    {
        Http::baseUrl($this->baseUri)
            ->acceptJson()
            ->delete("/api/mensagens/deletar/servidor/{$servidorId}")
            ->throw();
    }
}