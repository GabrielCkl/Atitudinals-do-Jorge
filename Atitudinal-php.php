<?php
function alteraPagamento(&$array) {
    $dataPagamento = DateTime::createFromFormat('d/m/Y', $array['data_pagamento']);
    $limitePagamento = DateTime::createFromFormat('d/m/Y', '02/02/2024');
    
    if ($dataPagamento < $limitePagamento) {
        $array['pago'] = true;
    } else {
        $array['pago'] = false;
    }
}

function calcularMedia($array) {
    $notas = $array['notas'];
    $media = array_sum($notas) / count($notas);
    return $media;
}

function mostrarNomeIdade($array) {
    foreach ($array as $aluno) {
        echo "Nome: " . $aluno['nome'] . ", Idade: " . $aluno['idade'] . "\n";
    }
}

function verificarCadastro($usuario, &$usuarios) {
    if (strlen($usuario['nome']) > 3 &&
        $usuario['idade'] > 18 &&
        strlen($usuario['email']) > 10 &&
        strlen($usuario['senha']) > 8 &&
        !in_array($usuario['email'], array_column($usuarios, 'email'))) {
        
        $usuarios[] = $usuario;
        echo "Usuário cadastrado com sucesso!\n";
    } else {
        echo "Erro ao cadastrar usuário!\n";
    }
}

?>