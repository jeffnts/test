<?php
    include_once('services.php');

    $service = new Service();

    if(isset($_POST["enviar"])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $erros = false;

        $campoObrigatorio = 'Campo obrigatório!';

        $nomeObrigatorio = '';
        $emailObrigatorio = '';
        $senhaObrigatorio = '';
        

        if(empty($nome)){
            $nomeObrigatorio = $campoObrigatorio;
            $erros = true;
        }

        if(empty($email)){
            $emailObrigatorio = $campoObrigatorio;
            $erros = true;
        }

        if(empty($senha)){
            $senhaObrigatorio = $campoObrigatorio;
            $erros = true;
        }

        if(!$erros){
            $service->criarUsuario($nome, $email, $senha);

            $nome = '';
            $email = '';
            $senha = '';
        }

        $erros = false;
    }

    $usuarios = $service->listarUsuarios();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1>Cadastro de usuários</h1>

        <form class="w-25 p-3" action="index.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite seu nome">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha">
            </div>

            <input type="submit" name="enviar" id="enviar" class="btn btn-primary btn-block">
        </form>

        <h1>Lista de usuários</h1>

        <table class="table w-25 p-3">
            <thead>
                <tr>
                    <th 
                        scope="col"
                    >
                        Nome
                    </th>

                    <th 
                        scope="col"
                    >
                        E-mail
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0; $i < count($usuarios); $i++){
                        echo "<tr>";
                            echo "<td>";
                                echo $usuarios[$i]->nome; 
                            echo "</td>";
                            
                            echo "<td>";
                                echo $usuarios[$i]->email; 
                            echo "</td>";
                        echo "</tr>"; 
                    }                   
                ?>
            </tbody>
        </table>

        <?php 
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</body>
</html>