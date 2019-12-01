<?php
include '../../php_default/controle_login.php';

if (isset($_GET['tipoU'])) {
    $tipoU = $_GET['tipoU'];

    if ($tipoU == 'ban') {
        $queryUsuarios = "SELECT * FROM t_usuario WHERE status_ban=1";
    } else if ($tipoU == '0' OR $tipoU == '1') {
        $queryUsuarios = "SELECT * FROM t_usuario WHERE nivel_usuario=$tipoU";
    } else {
        $queryUsuarios = "SELECT * FROM t_usuario";
    }
} else {
    $queryUsuarios = "SELECT * FROM t_usuario";
}

$resultUsuarios = mysqli_query($link, $queryUsuarios);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de Usuários | Pop Corn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/controle_caes.css" />
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
                <?php
                $placehold = "placeholder='Buscar Usuário'";

                if (isset($_GET['busca'])) {
                    $busca = $_GET['busca'];

                    if ($busca) {
                        $placehold = "value='$busca'";
                    }
                } else {
                    $busca = "";
                }
                ?>

                <div class="cabecalho center">
                    <h2>Controle de Usuários</h2>
                </div>

                <form class="form-search center">
                    <input type="text" class="input-medium" title="Buscar Usuário" <?php echo $placehold; ?> name="busca">
                    <button type="submit" class="btn" title="Buscar Usuário"><i class="icon-search"></i></button>
                    <p class="opcoesBusca"><input name="tipoU" type="radio" value="default" checked> Todos <input type="radio" name="tipoU" value="ban" class="opcoesMargin"> Banido</p>
                </form>

                <fieldset id="listaCaes">
                    <legend><a href="controle_usuarios.php" class="linkFicha">Lista de Usuários</a></legend>
                    <?php
                    if (isset($_GET['func'])) {
                        $func = $_GET['func'];
                        if ($func == 'noBan') {
                            echo "<div class='alert fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Ban Retirado!</strong> Você acabou de retirar o ban de um usuário!"
                            . "</div>";
                        } else if ($func == 'ban') {
                            echo "<div class='alert alert-error fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Banido!</strong> Você acabou de banir um usuário!"
                            . "</div>";
                        }
                    }
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nBusca = strlen($busca); // Pega numero de caracteres de $busca
                            $UsuariosNaLista = 0;

                            while ($row = mysqli_fetch_assoc($resultUsuarios)) {
                                if (strncasecmp($busca, $row['nome'], $nBusca) == 0) {
                                    $UsuariosNaLista++;

                                    if ($row['nivel_usuario'] == 1) {
                                        $tipo_usuario = "Comum";
                                    } else if ($row['nivel_usuario'] == 2) {
                                        $tipo_usuario = "Administrador";
                                    } else {
                                        $tipo_usuario = "Desconhecido";
                                    }

                                    echo
                                    "<tr>
                                        <td>" . $row['id_usuario'] . "</td>
                                        <td>" . $row['nome'] . "</td>
                                        <td>" . $row['email'] . "</td>
                                        <td>" . $tipo_usuario . "</td>
                                        <td class='tdAction'>
                                            <a href='dados_usuario_N.php?id=".$row['id_usuario']."' class='btn btn-small pull-left' title='Visualizar Dados' target='_BLANK'><i class='icon-eye-open'></i></a>";

                                    if (!mesmoID() & $row['nivel_usuario'] < 2 & $row['status_ban'] == 0) {
                                        echo "<a href='../../php_paginas/admin/banir_usuario.php?id_usuario=" . $row['id_usuario'] . "&status_ban=0' class='btn btn-small btn-danger pull-right butBan' title='Banir Usuário'>Banir <i class='icon-ban-circle icon-white'></i></a>";
                                    } else if (!mesmoID() & $row['nivel_usuario'] < 2 & $row['status_ban'] == 1) {
                                        echo "<a href='../../php_paginas/admin/banir_usuario.php?id_usuario=" . $row['id_usuario'] . "&status_ban=1' class='btn btn-small btn-danger pull-right butBan' title='Retirar Ban'>Retirar Ban <i class='icon-remove-circle icon-white'></i></a>";
                                    } else {
                                        echo "<p class='btn btn-small btn-danger pull-right butBan' disabled>Banir <i class='icon-ban-circle icon-white'></i></p>";
                                    }

                                    echo "</td></tr>";
                                }
                            }

                            if ($UsuariosNaLista == 0) {
                                echo
                                "<tr class='info'>
                                    <td colspan='5'>Nenhum Usuário foi encontrado!</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </fieldset>
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
