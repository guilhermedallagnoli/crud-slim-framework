<?php

use function src\slimConfiguration;
use App\Controllers\ProdutoController;

$app = new \Slim\App(slimConfiguration());

// ROTAS DE PRODUTO
$app->get('/produto', ProdutoController::class . ':getProduto');
$app->post('/produto', ProdutoController::class . ':insertProduto');
$app->put('/produto', ProdutoController::class . ':updateProduto');
$app->delete('/produto', ProdutoController::class . ':deleteProduto');

$app->run();

