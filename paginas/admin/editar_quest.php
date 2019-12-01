<?php include '../../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Pergunta | PopCorn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/cadastro_usuario.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/cadastro_editar_pesq.css" />

        <?php
        include('../../php_default/registro_quest.php');

        if (isset($_GET['id'])) {
            $id_quest_atual = $_GET['id'];
        } else {
            header("location: controle_perg.php");
        }
        
        if (getStatus_disponivel_quest($id_quest_atual) == 0) {
            $selectNaoD = "selected";
        } else {
            $selectD = "selected";
        }

        ?>
    </head>
    <body>
        <div class="container mycontainer">
            <header>
                <?php
                $linkLogo = "../../img/Pop Corn'o Logo.png";
                $linkInicio = "../../index.php";
                $linkLogin = "../login_usuario.php";
                $linkCadastro = "../cadastro_usuario.php";
                $linkLogout = "../../php_default/deslogar_usuario.php";
                $linkMeusDados = "../meus_dados.php";

                if (verificaLogin()) {
                    if (getNivel_usuario() <2) {
                        header("location: ../../index.php");
                    } else {
                        $linkControleQuest = "controle_perg.php";
                        $linkControleUsuarios = "controle_usuarios.php";
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
                    <li class="active">Editar Pergunta</li>
                </ul>

                <div class="thumbnail mythumbnail" id="formQuest">
                    <?php
                    if (isset($selectD)) {
                        echo
                        "<div class='alert fade in' id='alertaEdit'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Atenção!</strong> Se mudar o status para NÃO DISPONÍVEL, as subsequentes perguntas deixarão de ser acessíveis aos usuários.
                        </div>";
                    }
                    ?>
                    
                    <div class="caption">
                        <fieldset>
                            <legend>Editar Pesquisa</legend>
                            <form action="../../php_paginas/admin/enviar_editar_quest.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $id_quest_atual; ?>" name="id">
                                <div class="campo">
                                    <label class="control-label">Questionario:</label>
                                    <div class="controls">
                                        <input class="input-large" type="text" name="quest" maxlength="80" value="<?php echo getNomePesquisa ($id_quest_atual) ?>" required>
                                    </div>
                                </div>

                                <div class="campo">
                                    <label class="control-label">Pergunta</label>
                                    <div class="controls">
                                        <input class="input-large" type="text" name="pergunta" maxlength="80" value="<?php echo getPergunta($id_quest_atual) ?>" required>
                                    </div>
                                </div>

                                <div class="campo">
                                    <label class="control-label">a)</label>
                                    <div class="controls">
                                        <input class="input-medium" type="text" name="alternativaA" maxlength="30" value="<?php echo getA1($id_quest_atual) ?>" required>
                                    </div>
                                </div>

                                <div class="campo">
                                    <label class="control-label">b)</label>
                                    <div class="controls">
                                        <input class="input-medium" type="text" name="alternativaB" maxlength="30" value="<?php echo getA2($id_quest_atual) ?>" required>
                                    </div>
                                </div>

                                <div class="campo">
                                    <label class="control-label">c)</label>
                                    <div class="controls">
                                        <input class="input-medium" type="text" name="alternativaC" maxlength="30" value="<?php echo getA3($id_quest_atual) ?>" required>
                                    </div>
                                </div>

                                <div class="campo">
                                    <label class="control-label">d)</label>
                                    <div class="controls">
                                        <input class="input-medium" type="text" name="alternativaD" maxlength="30" value="<?php echo getA4($id_quest_atual) ?>" required>
                                    </div>
                                </div>

                                <div class="campo">
                                    <label class="control-label">e)</label>
                                    <div class="controls">
                                        <input class="input-medium" type="text" name="alternativaE" maxlength="30" value="<?php echo getA5($id_quest_atual) ?>" required>
                                    </div>
                                </div>

                                <div class="campo">
                                    <label class="control-label">Status:</label>
                                    <div class="controls">
                                        <select class="input-medium" name="status">
                                            <option value="1" <?php echo isset($selectD) ? "$selectD" : ""; ?>>Disponível</option> 
                                            <option value="0" <?php echo isset($selectNaoD) ? "$selectNaoD" : ""; ?>>Não Disponível</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-actions btnAction">
                                    <button type="submit" class="btn">Salvar Alterações</button>
                                </div>
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