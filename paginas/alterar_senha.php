<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Senha | PopCorn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/cadastro_usuario.css">
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
            


                if (!verificaLogin()) {
                    header("location: ../index.php");
                }

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <ul class="breadcrumb">
                    <li><a href="meus_dados.php">Meus Dados</a> <span class="divider">/</span></li>
                    <li class="active">Alterar Senha</li>
                </ul>
                
                <fieldset id="formSenha">
                    <legend>Alterar Senha</legend>
                    <form action="../php_paginas/enviar_alterar_senha.php" method="post" class="form-horizontal">
                        <input type="hidden" value="<?php echo getId_usuario(); ?>" name="id_usuario">
                        <div class="alert alert-info fade in">
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Atenção!</strong> A nova senha deverá ter no mínimo 8 caracteres
                        </div>
                        <div class="campo">
                            <label class="control-label">Senha Atual: </label>
                            <div class="controls">
                                <input class="input-medium" type="password" name="senha" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Nova Senha: </label>
                            <div class="controls">
                                <input class="input-medium" type="password" name="nova_senha1" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Confirme a nova senha: </label>
                            <div class="controls">
                                <input class="input-medium" type="password" name="nova_senha2" required>
                            </div>
                        </div>
                        <div class="form-actions btnAction">
                            <button type="submit" class="btn">Salvar Alterações</button>
                        </div>
                    </form>
                </fieldset>
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

<?php
