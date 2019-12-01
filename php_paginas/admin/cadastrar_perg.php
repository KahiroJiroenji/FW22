<?php

include ('../../php_default/controle_login.php');


if (verificaLogin()) {
    if (getNivel_usuario() == 2) {
        
        $pesquisa = $_POST['pesquisa'];
        $nome = $_POST['nome'];
        $Q1 = $_POST['Q1'];
        $Q1a = $_POST['Q1a'];
        $Q1b = $_POST['Q1b'];
        $Q1c = $_POST['Q1c'];
        $Q1d = $_POST['Q1d'];
        $Q1e = $_POST['Q1e'];
    } 
    else {
        header("location: ../../index.php"); 
    }      

        if ($pesquisa) {
                mysqli_query($link, "insert into t_pesquisas (nome_pesquisa, pergunta, alternativa1, alternativa2, alternativa3, alternativa4, alternativa5) "
                        . "values ('$pesquisa', '$Q1', '$Q1a', '$Q1b', '$Q1c', '$Q1d', '$Q1e')") or die (mysqli_error($link));
                
                header("location: ../../paginas/admin/controle_perg.php?func=new");
            
        } else {
            echo '<script>'
            . 'alert("Por favor, informe o nome da pesquisa!");'
            . 'history.back();'
            . '</script>';
        }
    
} else {
    header("location: ../../paginas/login_usuario.php");
}
