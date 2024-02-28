<?php
function ValidarCaixa()
{
    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query =   "SELECT * FROM tb_produtos";

    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();

    return $lista;
}

function ConsultarCaixa()
{
    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query =   "SELECT * FROM tb_produtos_venda
    LEFT JOIN tb_produtos ON tb_produtos_venda.id_produtos=tb_produtos.id
    WHERE processamento = 0";

    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();

    return $lista;
}

function CodigoCaixa()
{
    $conexaos = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query =   "SELECT * FROM tb_vendas";

    $resultados = $conexaos->query($query);
    $lista = $resultados->fetchAll();

    return $lista;
}

function SomarValores()
{
    try {
        $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

        $query =   "SELECT * FROM tb_produtos_venda
        LEFT JOIN tb_produtos ON tb_produtos_venda.id_produtos=tb_produtos.id
        WHERE processamento = 0 ";

        $resultados = $conexao->query($query);

        $soma = 0;

        if ($resultados->rowCount() > 0) {
            foreach ($resultados as $row) {
                $soma += $row['valor'] * $row['Quantidade'];
            }
        }

        $soma_formatada = number_format($soma, 2, ',', '.');


        return $soma_formatada;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
}

$valores = SomarValores();


function CalcularDesconto()
{
    $conexaos = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query = "SELECT * FROM tb_produtos_venda
    LEFT JOIN tb_produtos ON tb_produtos_venda.id_produtos=tb_produtos.id
    WHERE processamento = 0";
    $resultados = $conexaos->query($query);

    $soma = 0;

    if ($resultados->rowCount() > 0) {
        foreach ($resultados as $row) {
            $soma += $row['valor'];
        }
    }

    $desconto = $soma * 0.02;

    $desconto_formatado = number_format($desconto, 2, ',', '.');


    return $desconto_formatado;
}

$descontos = CalcularDesconto();

function NovaVenda()
{
    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $hora = date("Y-m-d H:i:s");
    $query = "INSERT INTO tb_vendas (hora) VALUES (:hora)";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':hora', $hora);
    $stmt->execute();
    return $hora;
}

function updateProcessamento($processamentos){
    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");
    

    if (isset($processamentos)) {
        $query = "UPDATE tb_produtos_venda SET processamento = 1 WHERE id_venda = $processamentos";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $processamentos;
    } else {
        return "Erro: processamento não definido";
    }
}


