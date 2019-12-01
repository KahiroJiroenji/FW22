<?php include '../../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de Questionários | Pop Corn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/controle_perg.css" />

        <?php include('../../php_default/registro_quest.php'); ?>
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
                $placehold = "placeholder='Buscar Questionário'";

                if (isset($_GET['busca'])) {
                    $busca = $_GET['busca'];

                    if ($busca) {
                        $placehold = "value='$busca'";
                    }
                } else {
                    $busca = "";
                }

                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'disponivel') {
                        $checked = "checked";
                    }
                } else {
                    $checked = "";
                }
                ?>

                <div class="cabecalho center">
                    <h2>Controle de Pesquisas</h2>
                </div>

                <form class="form-search center">
                    <input type="text" class="input-medium" title="Buscar" <?php echo $placehold; ?> name="busca">
                    <button type="submit" class="btn" title="Buscar Perg"><i class="icon-search"></i></button>
                    <p class="opcoesBusca"><input name="status" type="checkbox" value="disponivel" <?php echo $checked; ?>> Apenas vigentes</p>
                </form>

                <fieldset id="listaCaes">
                    <legend><a href="controle_perg.php" class="linkFicha">Lista de Questionários</a> <a href="?func=detalhes"><small>+Detalhes</small></a><a href="cadastro_perg.php" class="btn pull-right">Cadastrar Questionário</a></legend>
                    <?php
                    if (isset($_GET['func'])) {
                        $func = $_GET['func'];
                        if ($func == 'new') {
                            echo "<div class='alert alert-success fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Pronto!</strong> O cadastro foi realizado com sucesso!"
                            . "</div>";
                        } else if ($func == 'edit') {
                            echo "<div class='alert alert-success fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Pronto!</strong> As informações do Questionário foram atualizadas com sucesso!"
                            . "</div>";
                        } else if ($func == 'detalhes') {
                            $totalVig = 0;
                            $totalExp = 0;
                            $totalQuest = 0;

                            for ($i = 1; $i <= $maior_id; $i++) {
                                if (isset($Quest[$i])) {
                                    if (getNomePesquisa($i)) {
                                        $totalQuest++;
                                        if (getStatus_disponivel_quest($i) == 1) {
                                            $totalVig++;
                                        } else if (getStatus_disponivel_quest($i) == 0) {
                                            $totalExp++;
                                        }
                                    }
                                }
                            }

                            echo "<div class='alert alert-info'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "Total de Questionários: <strong>$totalQuest</strong><br/>"
                            . "- Vigentes: <strong>$totalVig</strong><br/>"
                            . "- Expirados: <strong>$totalExp</strong><br/>"
                            . "</div>";
                        }
                    }
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Questionário</th>
                                <th>Pergunta</th>
                                <th>Alt1</th>
                                <th>Alt2</th>
                                <th>Alt3</th>
                                <th>Alt4</th>
                                <th>Alt5</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nBusca = strlen($busca); // Pega numero de caracteres de $busca
                            $questionarios = 0;
                            $status = 1;

                            if ($num_Quests > 0) {
                                for ($i = 1; $i <= $maior_id; $i++) {
                                    if (isset($Quest[$i])) {

                                        if (isset($_GET['status'])) {
                                            if ($_GET['status'] == 'disponivel') {
                                                $status = getStatus_disponivel_quest($i);
                                            }
                                        }

                                        if ((strncasecmp($busca, getNomePesquisa($i), $nBusca) == 0) & ($status == 1)) {
                                            $questionarios++;

                                            echo
                                            "<tr class='" . (getStatus_disponivel_quest($i) == 1 ? "success" : "error") . "'>
                                                <td><a href='../ficha_cao.php?id=" . getId($i) . "' target='_BLANK' class='linkFicha'>" . getId($i) . "</a></td>
                                                <td><a href='../ficha_cao.php?id=" . getId($i) . "' target='_BLANK' class='linkFicha'>" . getNomePesquisa($i) . "</a></td>
                                                <td>" . getPergunta($i) . "</td>
                                                <td>" . getA1($i) . "</td>
                                                <td>" . getA2($i) . "</td>
                                                <td>" . getA3($i) . "</td>
                                                <td>" . getA4($i) . "</td>
                                                <td>" . getA5($i) . "</td>
                                                <td class='tdStatus'>" . (getStatus_disponivel_quest($i) == 1 ? "Disponível" : "Não Disponível") . "<a href='editar_quest.php?id=" . getId($i) . "' class='pull-right btn btn-small' title='Editar'><i class='icon-pencil'></i></a></td>
                                                <td class='pull-right btn btn-small'>" . "<a href='../../php_paginas/admin/apagar_quest.php?id=" . getId($i) . "' class='pull-right btn btn-small' title='Apagar'><i class='icon-remove'></i></a> </td>
                                            </tr>";
                                        }
                                    }
                                }
                            }

                            if ($questionarios == 0) {
                                echo
                                "<tr class='info'>
                                    <td colspan='6'>Nenhum questionário foi encontrado!</tsd>
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
