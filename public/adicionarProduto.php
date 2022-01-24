<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adicionar Produto</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    // INICIA O CURL
    $curl = curl_init();

    // CAPTURAR VALORES
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        // POST
        $post = [
            "nome" => $nome,
            "preco" => $preco,
            "quantidade" => $quantidade
        ];

        // HEADERS
        $headers = [
            'Content-Type: application/json'
        ];

        // JSON
        $json = json_encode($post);

        // CONFIGURACOES
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost/slim-framework/index.php/produto",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $json
        ]);

        // EXECUTA A CONEXAO
        curl_exec($curl);

        // FECHA A CONEXAO
        curl_close($curl);

        // REDIRECIONAR
        header('Location:produtos.php');
    }
    ?>

    <!-- Header -->
    <header class="border-b md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">

        <!-- Título -->
        <div class="flex items-center justify-between mb-4 md:mb-0">
            <h1 class="leading-none text-2xl text-grey-darkest">
                <a class="no-underline text-grey-darkest hover:text-black" href="produtos.php">
                    Crud
                </a>
            </h1>
        </div>

        <!-- Navegação -->
        <nav>
            <ul class="list-reset md:flex md:items-center">
                <li class="md:ml-4">
                    <a class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="produtos.php">
                        Produtos
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <div class=" py-32 px-10 min-h-screen text-xl">

        <form action="adicionarProduto.php" method="post" class="add-form md:w-1/2 mx-auto">

            <div class="shadow-xl">
                <div class="flex items-center bg-blue-400 rounded-t-lg border-b border-blue-500">
                    <label for="nome" class="w-20 text-right mr-8 text-blue-200">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="..." class="flex-1 p-4 pl-0 bg-transparent placeholder-blue-300 outline-none text-white">
                </div>

                <div class="flex items-center bg-blue-400 border-b border-blue-500">
                    <label for="preco" class="w-20 text-right mr-8 text-blue-200">Preço</label>
                    <input type="text" id="preco" name="preco" placeholder="..." class="flex-1 p-4 pl-0 bg-transparent placeholder-blue-300 outline-none text-white">
                </div>

                <div class="flex items-center bg-blue-400 rounded-b-lg mb-10">
                    <label for="quantidade" class="w-20 text-right mr-8 text-blue-200">Qtde</label>
                    <input type="text" id="quantidade" name="quantidade" placeholder="..." class="flex-1 p-4 pl-0 bg-transparent placeholder-blue-300 outline-none text-white">
                </div>
            </div>

            <button class="block w-full rounded bg-blue-400 py-3 text-white font-bold shadow">Cadastrar</button>
        </form>

    </div>

    <!-- Footer -->
    <footer class="text-center bg-gray-900 text-white">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white">Guilherme Dallagnoli</a>
        </div>
    </footer>
</body>

</html>