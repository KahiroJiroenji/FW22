<?php include '../../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Dados do Usuário | Pop Corn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/cadastro_usuario.css">

        <?php
        if (isset($_GET['id'])) {
            $id_usuario_N = $_GET['id'];
        } else {
            header("location: ../meus_dados.php");
        }

        include ('../../php_default/registro_usuario_N.php');
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
                    if (getNivel_usuario() < 2) {
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
                <?php
                if (mesmoID()) {
                    echo "<div class='alert alert-info fade in'>"
                    . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                    . "<strong>Estes são os seus dados!</strong> <a href='../meus_dados.php'>Clique aqui</a> para editá-los!"
                    . "</div>";
                }
                ?>

                <div class="cabecalho center">
                    <?php
                    echo "<h2>Dados do Usuário</h2>";
                    ?>
                </div>

                <form action="../../php_paginas/admin/banir_usuario.php" method="post" id="fichaDados" class="form-horizontal">
                    <input type="hidden" value="<?php echo $id_usuario_N; ?>" name="id_usuario">
                    <fieldset>
                        <legend>
                            Dados Pessoais
                        </legend>
                        <div class="campo">
                            <label class="control-label">Nome Completo:</label>
                            <div class="controls">
                                <input class="input-xlarge" type="text" name="nome" value="<?php echo getNome_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">CPF:</label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="cpf" value="<?php echo getCPF_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Idade:</label>
                            <div class="controls">
                                <input class="input-mini" type="text" maxlength="3" name="idade" value="<?php echo getIdade_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Telefone:</label>
                            <div class="controls">
                                <input class="input-small" type="text" maxlength="11" name="telefone" value="<?php echo getTelefone_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Email de Contato:</label>
                            <div class="controls">
                                <input type="text" maxlength="11" name="telefone" value="<?php echo getEmail_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="campo">
                            <label class="control-label">CEP:</label>
                            <div class="controls">
                                <input class="input-small" type="text" maxlength="8" name="cep" value="<?php echo getCEP_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Rua:</label>
                            <div class="controls">
                                <input class="input-xlarge" type="text" name="rua" value="<?php echo getRua_usuario_N(); ?>" disabled> 
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Número:</label>
                            <div class="controls">
                                <input class="input-mini" type="text" name="ncasa" value="<?php echo getNCasa_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Bairro:</label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="bairro" value="<?php echo getBairro_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Complemento: </label>
                            <div class="controls">
                                <input class="input-xxlarge" type="text" name="complemento" value="<?php echo getComplemento_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Cidade / Estado: </label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="cidade" value="<?php echo getCidade_usuario_N(); ?>" disabled>
                                <input class="input-medium" type="text" name="cidade" value="<?php echo getEstado_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                    </fieldset>
                </form>

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

<?php

function mesmoID() {
    global $id_usuario_N;

    if (getId_usuario() == $id_usuario_N) {
        return true;
    }
    return false;
}
