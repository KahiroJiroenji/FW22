<?php include '../../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar lista de Questionários | Pop Corn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/cadastro_usuario.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/cadastro_editar_pesq.css" />
    </head>
    <body>
        <div class="container mycontainer">
            <header>
                <?php
                $linkLogo = "../../img/Pop Corn'o Logo.png";
                $linkInicio = "../../index.php";
                $linkCaes = "../lista_caes.php";
                $linkLogin = "../login_usuario.php";
                $linkCadastro = "../cadastro_usuario.php";
                $linkLogout = "../../php_default/deslogar_usuario.php";
                $linkMeusDados = "../meus_dados.php";

                if (verificaLogin()) {
                    if (getNivel_usuario() == 2) {
                        $linkControleQuest = "controle_perg.php";
                        $linkControleUsuarios = "controle_usuarios.php";
                        
                    } else {
                        header("location: ../../index.php");
                    }

                } else {
                    header("location: ../login_usuario.php");
                }

                include('../../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <ul class="breadcrumb">
                    <li><a href="controle_perg.php">Lista de Perguntas</a> <span class="divider">/</span></li>
                    <li class="active">Cadastrar Questionário</li>
                </ul>
                
                <div class="thumbnail mythumbnail" id="formQuest">
                    <div class="caption">
                        <fieldset>
                            <legend>Cadastrar Questionário</legend>
                            <br/>
                            <p> Crie perguntas com 5 alternativas cada: </p>
                            <br/>
                            <form action="../../php_paginas/admin/cadastrar_perg.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="campo">
                                    <label class="control-label">Nome da Pesquisa:</label>
                                    <div class="controls">
                                        <input class="input" type="text" name="pesquisa" required>
                                    </div>
                                </div>

                                <br/>

                                <div class="campo">
                                    <label class="control-label">Questão:</label>
                                    <div class="controls">
                                        <input class="input-large" type="text" name="Q1" maxlength="100" required>
                                    </div>
                                </div>
                                    <div class="campo">
                                        <label class="control-label">Opção a)</label>
                                        <div class="controls">
                                            <input class="input-medium" type="text" name="Q1a" maxlength="40" required>
                                        </div>
                                    </div>
                                    <div class="campo">
                                        <label class="control-label">Opção b)</label>
                                        <div class="controls">
                                            <input class="input-medium" type="text" name="Q1b" maxlength="40" required>
                                        </div>
                                    </div>
                                    <div class="campo">
                                        <label class="control-label">Opção c)</label>
                                        <div class="controls">
                                            <input class="input-medium" type="text" name="Q1c" maxlength="40" required>
                                        </div>
                                    </div>
                                    <div class="campo">
                                        <label class="control-label">Opção d)</label>
                                        <div class="controls">
                                            <input class="input-medium" type="text" name="Q1d" maxlength="40" required>
                                        </div>
                                    </div>
                                    <div class="campo">
                                        <label class="control-label">Opção e)</label>
                                        <div class="controls">
                                            <input class="input-medium" type="text" name="Q1e" maxlength="40" required>
                                        </div>
                                    </div>                            

                                <br/>

                                <div class="form-actions btnAction">
                                    <button type="submit" class="btn">Cadastrar</button>
                                </div>

                                <br/>

                            </form>
                        </fieldset>
                    </div>
                </div>
            </article>
                
             <footer>
                <?php
                $linkSobre = "../sobre_nos.php";
                $linkLocalizacao = "../localizacao.php";

                include('../../php_default/header_e_footer/footer.php');
                ?>
            </footer>
        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../../ferramentas_externas/bootstrap/js/bootstrap.js"></script>
    </body>
</html>