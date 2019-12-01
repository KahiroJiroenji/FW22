<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sobre Nós | PopPesquisas</title>

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
                $linkLogin = "login_usuario.php";
                $linkCadastro = "cadastro_usuario.php";
                $linkLogout = "../php_default/deslogar_usuario.php";
                $linkMeusDados = "meus_dados.php";
                $linkControleQuest = "admin/controle_perg.php";
                $linkControleUsuarios = "admin/controle_usuarios.php";
                $linkAreaCliente = "cliente/area_cliente.php";

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>

                <div class="cabecalho center">
                    <h2>Sobre Nós<br/><i>Time de Pesquisas Pop Corn'o:</i></h2>
                </div>

                <div class="center">
                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span6">
                                <div class="thumbnail mythumbnail">
                                <br>
                                    <div class="caption">
                                        <h2 class="center">Guilherme, 20 anos.</h2>
                                        <br>
                                        <p class="center">Estudante do 4º Semestre de Análise e Desenvolvimento de Sistemas no IFSP. Natural de Guarulhos. Agente Escolar. Desenhista e Compositor Musical.</p>
                                    </div>
                                </div>
                        </li>
                        <li class="span6">
                                <div class="thumbnail mythumbnail">
                                <br>
                                    <div class="caption">
                                        <h2 class="center">Douglas, 28 anos.</h2>
                                        <br>
                                        <p class="center">Estudante do 4º Semestre de Análise e Desenvolvimento de Sistemas no IFSP. Natural de Mogi Das Cruzes. Analista de Business Intelligence. Ex-Atleta e filiado ao PSOL.</p>
                                    </div>
                                </div>
                        </li>
                    </ul>
                </div>                                            
                    
                    <div id="integrantes" class="bloquete" style="width: 60%; margin: auto; margin-bottom: 25px; margin-top: 25px;">
                        <h4>A1FW2  --  Semestre 2  --  2019</h4>
                        <ul style="text-align: center; list-style-type: none;">
                           
                            <br>
                            <li>Guilherme Picoli Santos</li>
                            <li>Douglas Camandaroba</li>
                            <br>
                            <li>Apresentamos a segunda parte e esperada continuação do tão aclamado projeto PopCorn'o, iniciado em A1FW1.</li>
                            <br>
                        </ul>
                    </div>
                    
                    <div class="center">
                    <img src="../img/Pop Corn'o Logo.png" class="img" style="width: 30%; margin-bottom: 2%;">  
                    </div>
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

    </body>
</html>