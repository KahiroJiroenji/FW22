<?php include 'php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Index | PopCorn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="css/layout_default.css" />
    </head>
    <body>
        <div class="container mycontainer ">
            <header>
                <?php
                
                $linkLogo = "img/Pop Corn'o Logo.png";
                $linkInicio = "index.php";
                $linkLogin = "paginas/login_usuario.php";
                $linkCadastro = "paginas/cadastro_usuario.php";
                $linkLogout = "php_default/deslogar_usuario.php";
                $linkMeusDados = "paginas/meus_dados.php";
                $linkControleQuest = "paginas/admin/controle_perg.php";
                $linkControleUsuarios = "paginas/admin/controle_usuarios.php";
                $linkAreaCliente = "paginas/cliente/area_cliente.php";

                include('php_default/header_e_footer/header.php');

                ?>
                
            </header>

          <?php
            if (verificaLogin()) {
                if(getNivel_usuario() == 1){
                    //Header Cliente
                     include ('php_default/Index/client_sessao.php');
                }
                else if(getNivel_usuario() == 2){
                    //Header ADMIN
                     include ('php_default/Index/adm_sessao.php');
                }
            } else {
                include ('php_default/Index/base.php');
            }
            ?>

            <footer>
                <?php
                $linkSobre = "paginas/sobre_nos.php";
                $linkLocalizacao = "paginas/localizacao.php";

                include('php_default/header_e_footer/footer.php');
                ?>
            </footer>
        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="ferramentas_externas/bootstrap/js/bootstrap.js"></script>
    </body>
</html>