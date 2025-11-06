<?php
$current = basename($_SERVER['PHP_SELF']);
$pg = isset($_GET['pg']) ? $_GET['pg'] : 'conteudo';

function active($name, $pg) {
    return ($name === $pg) ? 'nav-link active fw-semibold' : 'nav-link text-secondary';
}
?>
<li class="nav-item"><a class="<?= active('conteudo',$pg) ?>" href="index.php">Home</a></li>
<li class="nav-item"><a class="<?= active('quemsomos',$pg) ?>" href="index.php?pg=quemsomos">Quem Somos</a></li>
<li class="nav-item"><a class="<?= active('clientes',$pg) ?>" href="index.php?pg=clientes">Clientes</a></li>
<li class="nav-item"><a class="<?= active('produtos',$pg) ?>" href="index.php?pg=produtos">Produtos</a></li>
<li class="nav-item"><a class="<?= active('faleconosco',$pg) ?>" href="index.php?pg=faleconosco">Fale Conosco</a></li>
