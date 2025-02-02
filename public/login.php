<?php
defined('CONTROL') or die('Acesso negado!');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if(empty($usuario) || empty($senha)){
        $erro = "Usuário e senha são obrigatórios.";
    }

    if(empty($erro)){
        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';

        foreach($usuarios as $user){
            if($user['usuario'] == $usuario && password_verify($senha, $user['senha'])){
                $_SESSION['usuario'] = $usuario;
                header('location: index.php?rota=home'); 
            }
        }

        $erro = "Usuario e/ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<form action="index.php?rota=login" method="post" class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Entre com suas credenciais.</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="text" name="usuario" id="typeEmailX usuario" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Usuário</label>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" name="senha" id="typePasswordX senha" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Senha</label>
              </div>
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Acessar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

    <?php if(!empty($erro)):?>
        <p><?=$erro?></p>
    <?php endif;?>
</body>
</html>
