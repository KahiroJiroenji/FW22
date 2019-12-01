<?php

function active($link) {
    $link_completo = explode("/", $_SERVER['PHP_SELF']);
    $linkAtual = end($link_completo);
    if ($linkAtual == $link) {
        echo "class='active'";
    }
}
?>

<p><a href="<?php echo $linkInicio; ?>"><img id="logoPrincipal" alt="Logo-ONG" src="<?php echo $linkLogo; ?>"></a></p>
<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-inner">
        <ul class="nav">
            <li <?php active($linkInicio) ?>><a href="<?php echo $linkInicio; ?>">Página Inicial</a></li>
        </ul>
        <ul class="nav pull-right">
            <?php
            if (verificaLogin()) {
                if (getNivel_usuario() == 0) {
                    //Header Anonimo
                    include ('header_usuarios/anonimo.php');
                }
                else if(getNivel_usuario() == 1){
                    //Header Cliente
                     include ('header_usuarios/cliente.php');
                }
                else if(getNivel_usuario() == 2){
                    //Header ADMIN
                     include ('header_usuarios/admin.php');
                }
            } else {
                include ('header_usuarios/anonimo.php');
            }
            ?>
        </ul>
    </div>
</div>