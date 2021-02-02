<?php

use PHPUnit\Framework\TestCase;
use Wead\DigitalCep\Search;

class SearchTest extends TestCase{

    /**
     * @dataProvider dadosTeste
     */
    public function testGetAddressFromZipcodeDefaultUsage(string $input, array $esperado){
        $resultado = new Search;
        $resultado = $resultado->getAddressFromZipcode($input);

        $this->assertEquals($esperado, $resultado);
    }

    public function dadosTeste(){
        return [
            "Rua Espirito Santo" => [
                "	36011970",
                [
                    "cep" => "	36011-970",
                    "logradouro" => "Espirito Santo",
                    "complemento" => "Centro",
                    "bairro" => "Centro",
                    "localidade" => "Juiz de Fora",
                    "uf" => "MG",
                    "unidade" => "",
                    "ibge" => "	36011-970",
                    "gia" => "0000"
                ]
            ],
            "Endereço Qualquer" => [
                " 36015-000",
                [
                    "cep" => " 36015-000",
                    "logradouro" => "Rua Santo Antônio",
                    "complemento" => "",
                    "bairro" => "Centro",
                    "localidade" => "Juiz de Fora",
                    "uf" => "MG",
                    "unidade" => "",
                    "ibge" => "3550318",
                    "gia" => "1004"
                ]
            ]
        ];
    }
}