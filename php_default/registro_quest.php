<?php

include ('conexao_bd.php');

$queryQuest = "select * from t_pesquisas";
$resultQuest = mysqli_query($link, $queryQuest);

$num_Quests = 0;
$num_Questões = 0;
$maior_id = 1;

while ($row = mysqli_fetch_assoc($resultQuest)) {
    $num_Quests++;
    
    $id = $row['cod_pesquisa'];
    $nome = $row['nome_pesquisa'];
    $pergunta = $row['pergunta'];
    $A1 = $row['alternativa1'];
    $A2 = $row['alternativa2'];
    $A3 = $row['alternativa3'];
    $A4 = $row['alternativa4'];
    $A5 = $row['alternativa5'];

    $status_disponivel = (bool)$row['status_disponivel'];
    
    
    $Quest[$id]["cod_pesquisa"] = $id;
    $Quest[$id]["nome_pesquisa"] = $nome;
    $Quest[$id]["pergunta"] = $pergunta;
    $Quest[$id]["alternativa1"] = $A1;
    $Quest[$id]["alternativa2"] = $A2;
    $Quest[$id]["alternativa3"] = $A3;
    $Quest[$id]["alternativa4"] = $A4;
    $Quest[$id]["alternativa5"] = $A5;
    $Quest[$id]["status_disponivel"] = $status_disponivel;
    
    if($Quest[$id]["status_disponivel"]){
        $num_Quests++;
    }
    
    if($id > $maior_id){
        $maior_id = $id;
    }
}

function getId($id) {
    global $Quest;
    return $Quest[$id]["cod_pesquisa"];
}

function getNomePesquisa($id) {
    global $Quest;
    return $Quest[$id]["nome_pesquisa"];
}

function getPergunta($id) {
    global $Quest;
    return $Quest[$id]["pergunta"];
}

function getA1($id) {
    global $Quest;
    return $Quest[$id]["alternativa1"];
}

function getA2($id) {
    global $Quest;
    return $Quest[$id]["alternativa2"];
}

function getA3($id) {
    global $Quest;
    return $Quest[$id]["alternativa3"];
}

function getA4($id) {
    global $Quest;
    return $Quest[$id]["alternativa4"];
}

function getA5($id) {
    global $Quest;
    return $Quest[$id]["alternativa5"];
}

function getStatus_disponivel_quest($id) {
    global $Quest;
    return $Quest[$id]["status_disponivel"];
}
