<?php
include '../../php_default/controle_login.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Área do Cliente | Pop Corn'O Pesquisas</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/fichas.css" />   <!--//Lista branca -->     
        <link rel="stylesheet" type="text/css" href="../../css/cliente/area_cliente.css" />

        <?php include('../../php_default/registro_caes.php'); ?>
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
                    if (getNivel_usuario() == 1) {
                        $linkAreaCliente = "area_cliente.php";
                    } else {
                        header("location: ../../index.php");
                    }
                } else {
                    header("location: ../login_usuario.php");
                }

                include('../../php_default/header_e_footer/header.php');
                ?>
            </header>

                <div class="cabecalho center">
                    <h2>Pesquisas do Cliente</h2>
                    <br/>
                </div>

                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span4">
                            <div class="thumbnail mythumbnail" id="ficha-cao">
                                <img src="../../<?php echo getSrc_imagem_cao($id_cao_atual); ?>" class="imgCao" alt="<?php echo getNome_cao($id_cao_atual); ?>" title="<?php echo getNome_cao($id_cao_atual); ?>">
                                <div class="caption center">
                                    <h3><?php echo getNome_cao($id_cao_atual); ?></h3>
                                    <?php
                                    if (getStatus_disponivel_cao($id_cao_atual)) {
                                        echo"<p class='center'><span class='label label-success'>ESTÁ DISPONÍVEL</span></p>";
                                    } else {
                                        echo"<p class='center'><span class='label label-important'>NÃO ESTÁ DISPONÍVEL</span></p>";
                                    }
                                    ?>
                                    <p><strong>Idade: <?php echo getIdade_cao($id_cao_atual); ?> Anos</strong></p>
                                    <p><strong>Gênero: <?php echo getGenero_cao($id_cao_atual); ?></strong></p>
                                    <p><strong>Porte <?php echo getPorte_cao($id_cao_atual); ?></strong></p>
                                </div>
                            </div>
                        </li>
                    </ul>
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