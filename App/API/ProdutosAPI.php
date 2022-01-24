<?php

namespace App\API;

use App\Models\ProdutoModel;

class ProdutosAPI extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Capturar valores
     *
     * @return array
     */
    public function getAllProdutos(): array
    {
        $produtos = $this->pdo
            ->query('select id, nome, preco, quantidade from produtos;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $produtos;
    }

    /**
     * Inserir produto
     *
     * @param ProdutoModel $produto
     * @return void
     */
    public function insertProduto(ProdutoModel $produto): void
    {
        $statement = $this->pdo
            ->prepare('insert into produtos values(null, :nome, :preco, :quantidade);');
        $statement->execute([
            'nome' => $produto->getNome(),
            'preco' => $produto->getPreco(),
            'quantidade' => $produto->getQuantidade()
        ]);
    }

    /**
     * Atualizar produto
     *
     * @param ProdutoModel $produto
     * @return void
     */
    public function updateProduto(ProdutoModel $produto): void
    {
        $statement = $this->pdo
            ->prepare('update produtos set nome = :nome, preco = :preco, quantidade = :quantidade where id = :id;');
        $statement->execute([
            'nome' => $produto->getNome(),
            'preco' => $produto->getPreco(),
            'quantidade' => $produto->getQuantidade(),
            'id' => $produto->getId()
        ]);
    }

    /**
     * Apagar produto
     *
     * @param integer $id
     * @return void
     */
    public function deleteProduto(int $id): void
    {
        $statement = $this->pdo
            ->prepare('delete from produtos where id = :id;');
        $statement->execute([
            'id' => $id
        ]);
    }
}
