<?php

namespace App\Models;

final class ProdutoModel
{
    private $id;
    private $nome;
    private $preco;
    private $quantidade;

    // ID
    public function getId(): int
    {
        return $this->id;
    }

    // NOME
    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome): ProdutoModel
    {
        $this->nome = $nome;
        return $this;
    }

    // PRECO
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function setPreco(float $preco): ProdutoModel
    {
        $this->preco = $preco;
        return $this;
    }

    // QUANTIDADE
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
    public function setQuantidade(int $quantidade): ProdutoModel
    {
        $this->quantidade = $quantidade;
        return $this;
    }
}
