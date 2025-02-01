<?php
defined('CONTROL') or die('Acesso negado');
?>
<hr>
<span>Usuário: <strong><?=$_SESSION['usuario']?></strong></span>
<span>
    <a href="?rota=logout">Sair</a>
</span>
<hr>

<nav>
    <a href="?rota=home">Home</a>
    <a href="?rota=pagina1">Página 1</a>
    <a href="?rota=pagina2">Página 2</a>
    <a href="?rota=pagina3">Página 3</a>
    <a href="?rota=logout">Sair</a>
</nav>
