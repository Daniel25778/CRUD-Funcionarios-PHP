
<?php

require("./funcoes.php");

$funcionarios = lerArquivo("empresaX.json");



if(isset($_GET["buscarFuncionario"])&& $_GET["buscarFuncionario"] != ""){

    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Empresa X</title>
</head>
<body>
    <h1>Funcionários da Empresa X</h1>
    <p>A empresa conta com <?php echo count($funcionarios)?> funcionários
    </p>
    <form>
    <input  type="text" value="<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : "" ?>" name="buscarFuncionario" placeholder="Buscar Funcionário">
    <button type="button" class="novoFuncionario" onclick="showCadastrar()">Cadastrar</button>
    <button>Buscar</button>
    </form>
    
    <table class="table" border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Endereço IP</th>
                <th>Pais</th>
                <th>Departamento</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>
            <?php
            foreach($funcionarios as $funcionario) :
            ?>
                <tr>
                    <!-- //Acessar objeto em php -->
                    <td><?= $funcionario->id?></td>
                    <td><?= $funcionario->first_name?></td>
                    <td><?= $funcionario->last_name?></td>
                    <td><?= $funcionario->email?></td>
                    <td><?= $funcionario->gender?></td>
                    <td><?= $funcionario->ip_address?></td>
                    <td><?= $funcionario->country?></td>
                    <td><?= $funcionario->department?></td>
                    <td><button type="button"  onclick="showDeletarFuncionario(<?=$funcionario->id?>)">Deletar</button></td>
                    <td><button type="button">Editar</button></td>
                </tr>
            <?php    
            endforeach;
            ?>
        </table>
        <div id="container-cadastro" >
            <form action="acoes.php" id="formulario" method="POST">
                    <h1>Cadastrar funcionário</h1>
                    <input type="text" placeholder="Digite o id" name="id" />
                    <input type="text" placeholder="Digite o primeiro nome" name="first_name" />
                    <input type="text" placeholder="Digite o sobrenome" name="last_name" />
                    <input type="text" placeholder="Digite o e-mail" name="email" />
                    <input type="text" placeholder="Digite o sexo" name="gender" />
                    <input type="text" placeholder="Digite o IP" name="ip_address" />
                    <input type="text" placeholder="Digite o país" name="country" />
                    <input type="text" placeholder="Digite o departamento" name="department" />
                    <button>Cadastrar</button>
                    <button type="button" onclick="exitCadastrar()">Cancelar</button>
            </form>  
        </div>
        <!-- <div id="deletarFuncionario">
            <form action="acoes.php" method="POST">
                <h1>Apagar Funcionário</h1>
                <input type="text" placeholder="Digite o id do funcionario" name="idDeletarFuncionario"/>
                <button>Deletar</button>
                <button type="button" onclick="exitDeletarFuncionario()">Cancelar</button>
            </form> 
        </div> -->
</body>
</html>
