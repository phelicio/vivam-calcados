<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = array(
            array(
                "nome" => "Acre",
                "sigla" => "AC"
            ),
            array(
                "nome" => "Alagoas",
                "sigla" => "AL"
            ),
            array(
                "nome" => "Amapá",
                "sigla" => "AP"
            ),
            array(
                "nome" => "Amazonas",
                "sigla" => "AM"
            ),
            array(
                "nome" => "Bahia",
                "sigla" => "BA"
            ),
            array(
                "nome" => "Ceará",
                "sigla" => "CE"
            ),
            array(
                "nome" => "Distrito Federal",
                "sigla" => "DF"
            ),
            array(
                "nome" => "Espírito Santo",
                "sigla" => "ES"
            ),
            array(
                "nome" => "Goiás",
                "sigla" => "GO"
            ),
            array(
                "nome" => "Maranhão",
                "sigla" => "MA"
            ),
            array(
                "nome" => "Mato Grosso",
                "sigla" => "MT"
            ),
            array(
                "nome" => "Mato Grosso do Sul",
                "sigla" => "MS"
            ),
            array(
                "nome" => "Minas Gerais",
                "sigla" => "MG"
            ),
            array(
                "nome" => "Pará",
                "sigla" => "PA"
            ),
            array(
                "nome" => "Paraíba",
                "sigla" => "PB"
            ),
            array(
                "nome" => "Paraná",
                "sigla" => "PR"
            ),
            array(
                "nome" => "Pernambuco",
                "sigla" => "PE"
            ),
            array(
                "nome" => "Piauí",
                "sigla" => "PI"
            ),
            array(
                "nome" => "Rio de Janeiro",
                "sigla" => "RJ"
            ),
            array(
                "nome" => "Rio Grande do Norte",
                "sigla" => "RN"
            ),
            array(
                "nome" => "Rio Grande do Sul",
                "sigla" => "RS"
            ),
            array(
                "nome" => "Rondônia",
                "sigla" => "RO"
            ),
            array(
                "nome" => "Roraima",
                "sigla" => "RR"
            ),
            array(
                "nome" => "Santa Catarina",
                "sigla" => "SC"
            ),
            array(
                "nome" => "São Paulo",
                "sigla" => "SP"
            ),
            array(
                "nome" => "Sergipe",
                "sigla" => "SE"
            ),
            array(
                "nome" => "Tocantins",
                "sigla" => "TO"
            ),
        );

        foreach ($estados as $estado) {
            App\Estado::create($estado);
        }
    }
}


