<?php

namespace App\Controllers;

use App\API\ProdutosAPI;
use App\Models\ProdutoModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProdutoController
{
    /**
     * Capturar valores
     */
    public function getProduto(Request $request, Response $response, array $args): Response
    {
        $produtosAPI = new ProdutosAPI();
        $produtos = $produtosAPI->getAllProdutos();
        $response = $response->withJson($produtos);

        return $response;
    }

    /**
     * Inserir produtos
     */
    public function insertProduto(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $produtosAPI = new ProdutosAPI();
        $produto = new ProdutoModel();
        $produto->setNome($data['nome'])
             ->setPreco($data['preco'])
             ->setQuantidade($data['quantidade']);
        $produtosAPI->insertProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto inserido com sucesso!'
        ]);
        
        return $response;
    }

    /**
     * Atualizar produtos
     */
    public function updateProduto(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $produtosAPI = new ProdutosAPI();
        $produto = new ProdutoModel();
        $produto->setId((int)$data['id'])
            ->setNome($data['nome'])
            ->setPreco($data['preco'])
            ->setQuantidade($data['quantidade']);
        $produtosAPI->updateProduto($produto);

        $response = $response->withJson([
            'message' => 'Produto alterado com sucesso!'
        ]);

        return $response;
    }

    /**
     * Apagar produtos
     */
    public function deleteProduto(Request $request, Response $response, array $args): Response
    {
        $queryParams = $request->getQueryParams();

        $produtosAPI = new ProdutosAPI();
        $id = (int)$queryParams['id'];
        $produtosAPI->deleteProduto($id);

        $response = $response->withJson([
            'message' => 'Produto deletado com sucesso!'
        ]); 

        return $response;
    }
}
