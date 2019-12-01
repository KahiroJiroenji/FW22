<?php

include ('../../php_default/controle_login.php');

if (verificaLogin()) {
    if (getNivel_usuario() < 2) {
        header("location: ../../index.php");
    } else {
        $id = $_POST['id'];
        $quest = $_POST['quest'];
        $pergunta = $_POST['pergunta'];
        $AA = $_POST['alternativaA'];
        $AB = $_POST['alternativaB'];
        $AC = $_POST['alternativaC'];
        $AD = $_POST['alternativaD'];
        $AE = $_POST['alternativaE'];
        $status_disponivel = $_POST['status'];

        if ($quest) {
            if ($id) {

                mysqli_query($link, "update t_pesquisas set nome_pesquisa='$quest', pergunta='$pergunta', alternativa1='$AA', alternativa2='$AB', alternativa3='$AC', alternativa4='$AD', alternativa5='$AE', status_disponivel='$status_disponivel' where cod_pesquisa='$id'");

                header("location: ../../paginas/admin/controle_perg.php?func=edit");
            } else {
                echo '<script>'
                . 'alert("Por favor, arruma esse sistema!");'
                . 'history.back();'
                . '</script>';
            }
        } else {
            echo '<script>'
            . 'alert("Por favor, informe qual é o questionario da pergunta!");'
            . 'history.back();'
            . '</script>';
        }
    }
} else {
    header("location: ../../paginas/login_usuario.php");
}