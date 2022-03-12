<?php

namespace JeanSassi\Focusnfe;

$api = new NFSe();
$api->setVerboseMode(true);


$api->setRef("555"); //Essa é a referência usada na sua requisição


//Estrutura dos dados
//Para detalhes e informações completas sobre cada campo
//Documentação Oficial: https://focusnfe.com.br/doc/#nfse_campos
$api->setForms(
    $data = array(
        "data_emissao" => "2017-09-21T22:15:00",
        "incentivador_cultural" => "false",
        "natureza_operacao" => "1",
        "optante_simples_nacional" => "true",
        "prestador" => array(
            "cnpj" => "18765499000199",
            "inscricao_municipal" => "12345",
            "codigo_municipio" => "3516200"
        ),
        "tomador" => array(
            "cnpj" => "07504505000132",
            "razao_social" => "Acras Tecnologia da Informação LTDA",
            "email" => "contato@acras.com.br",
            "endereco" => array(
                "bairro" => "Alto da XV",
                "cep" => "80045165",
                "codigo_municipio" => "4106902",
                "logradouro" => "Rua Dias da Rocha Filho",
                "numero" => "999",
                "uf" => "PR"
            )
        ),
        "servico" => array(
            "aliquota" => "2.01",
            "discriminacao" => "Nota fiscal referente a serviços prestados",
            "iss_retido" => "false",
            "item_lista_servico" => "0107",
            "codigo_tributario_municipio" => "620910000",
            "codigo_cnae" => "620910000",
            "valor_servicos" => "1.00"
        )
    )
);

var_dump($api->enviar());


sleep(60);

//$api->setRef("555");
var_dump($api->consultar());
