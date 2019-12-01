<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Nossa Localização | Pop Corn'o Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
    </head>
    <body>
        <div class="container mycontainer">
            <header>
                <?php
                $linkLogo = "../img/Pop Corn'o Logo.png";
                $linkInicio = "../index.php";
                $linkCaes = "lista_caes.php";
                $linkLogin = "login_usuario.php";
                $linkCadastro = "cadastro_usuario.php";
                $linkLogout = "../php_default/deslogar_usuario.php";
                $linkMeusDados = "meus_dados.php";

                $linkAreaCliente = "cliente/area_cliente.php";

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <div class="cabecalho center">
                    <h2>Nossa Localização<br/><h4>Faça-nos uma visita em nosso endereço acolhedor!</h4></h2>
                </div>

                <address class="well center" style="width: 60%; margin: auto; margin-bottom: 5%; margin-top: 5%;">
                    <strong>Pop Canvas JM. </strong><br/><br/>
                    Espaço BOATE AZUL<br/>
                    Av. Antônio Conselheiro, 702-760 <br/>
                    Antônio Zanaga II<br/>
                    Americana - SP, <br/>
                    Cep:13474-440
                </address>
            </article>

            <footer>
                <?php
                $linkSobre = "sobre_nos.php";
                $linkLocalizacao = "localizacao.php";

                include('../php_default/header_e_footer/footer.php');
                ?>
            </footer>
        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../ferramentas_externas/bootstrap/js/bootstrap.js"></script>
    </body>
</html>