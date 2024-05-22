<?php
function alteraPagamento(&$array) {
    $dataPagamento = DateTime::createFromFormat('d/m/Y', $array['data_pagamento']);
    $limitePagamento = DateTime::createFromFormat('d/m/Y', '02/02/2024');
    
    if ($dataPagamento < $limitePagamento) {
        $array['pago'] = true;
    } else {
        $array['pago'] = false;
    }
    return $array;
}

$pagamento = [
    "produto" => "Camisa DnD - Tamanho M",
    "data_pagamento" => "01/02/2024",
    "pago" => false
];

$pagamento = alteraPagamento($pagamento);
print_r($pagamento);

function calcularMedia($array) {
    $notas = $array['notas'];
    $media = array_sum($notas) / count($notas);
    return $media;
}

$aluno = [
    "nome" => "João",
    "notas" => [
        "prova1" => 8,
        "prova2" => 7,
        "prova3" => 6,
        "prova4" => 9
    ]
];

$media = calcularMedia($aluno['notas']);
echo "Média das notas de " . $aluno['nome'] . ": " . $media . "\n";

function mostrarAlunos($array) {
    foreach ($array as $aluno) {
        echo "Nome: " . $aluno['nome'] . ", Idade: " . $aluno['idade'] . "\n";
    }
}

$alunos = [
    [
        "nome" => "João",
        "idade" => 20
    ],
    [
        "nome" => "Maria",
        "idade" => 22
    ],
    [
        "nome" => "José",
        "idade" => 21
    ]
];

mostrarAlunos($alunos);

function cadastrarUsuario($usuario, &$usuarios) {
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

$usuarios = [
    [
        "nome" => "João",
        "idade" => 20,
        "email" => "email@email.com",
        "senha" => "12345678"
    ],
    [
        "nome" => "Guilherme",
        "idade" => 17,
        "email" => "meu.email@email.com",
        "senha" => "abc12312312"
    ]
];

$novoUsuario = [
    "nome" => "Fernanda",
    "idade" => 25,
    "email" => "fernanda@email.com",
    "senha" => "minhasenha123"
];

cadastrarUsuario($novoUsuario, $usuarios);
print_r($usuarios);

?>