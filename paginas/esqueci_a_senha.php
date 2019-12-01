<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Senha | PopCorn'O Pesquisas</title>
        
        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/login_usuario.css">
    </head>
    <body>
        <div class="container mycontainer">
            <header>
                <?php
                $linkLogo = "../img/Pop Corn'o Logo.png";
                $linkInicio = "../index.php";
                $linkLogin = "login_usuario.php";
                $linkCadastro = "cadastro_usuario.php";
                $linkLogout = "../php_default/deslogar_usuario.php";
                $linkMeusDados = "meus_dados.php";
                
                if(verificaLogin()){
                    header("location: ../index.php");
                }

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <div class="cabecalho center">
                    <h2>Recuperar Senha<br/><h3><strong>Informe abaixo o email cadastrado para ignorarmos :D</strong></h3>
                </div>

                <form action="login_usuario.php" method="post" id="formLogin" class="form-horizontal" onSubmit='alert("Um email com um link para a recuperação da sua senha foi enviado!\nPor favor, siga os passos para recuperar a sua senha.")'>
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Email</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" placeholder="Email Cadastrado" name="email" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>


                <div id="ajuda" class="center">
                    <p><a href="login_usuario.php">Faça o Login </a> | <a href="cadastro_usuario.php" target="_BLANK">Cadastre-se</a></p>
                </div>
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

