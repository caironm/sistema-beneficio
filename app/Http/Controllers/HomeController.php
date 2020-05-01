<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new Client();
        $beneficio = 1688997153;
        $api_key = '4e302fd20c7441c5d7971e3f10e95ac2';
        $response = $client->request('GET', 'https://inss.api.dataconsig.com.br/v1/inss/historico/'.$beneficio.'?api_key=4e302fd20c7441c5d7971e3f10e95ac2');
        $response->json(['api_key' => $api_key], 200);
        $body = $response->getBody()->getContents();
        return $body;
    }

    public function beneficio()
    {
        $json = json_decode('[{ "beneficio" : "1688997153", "nome" : "MARIA ADENILDE DOS SANTOS", "dataNascimento" : "1966-02-12", "cpf" : "00748693530", "especie" : { "codigo" : "21", "descricao" : "PENSAO POR MORTE PREVIDENCIARIA" }, "dadosBancarios" : { "banco" : { "codigo" : "237", "nome" : "BRADESCO" }, "agencia" : { "codigo" : "5978", "nome" : "TAIGUE GAS - BRADESCO EXPRESSO", "endereco" : { "endereco" : "RUA ANISIO CARDOSO, 73", "bairro" : "CENTRO", "cidade" : "CUMBE", "cep" : "49660-000", "uf" : "SE" }, "orgaoPagador" : 74979 }, "meioPagamento" : { "tipo" : "CARTÃO MAGNÉTICO" } }, "situacaoBeneficio" : "ATIVO", "dib" : "2014-08-26", "valorBeneficio" : 1045.0, "possuiRepresentanteLegalProcurador" : false, "pensaoAlimenticia" : false, "bloqueioEmprestismo" : false, "beneficioPermiteEmprestimo" : true, "margem" : { "competencia" : "04/2020", "baseCalculoMargemConsignavel" : 1045.0, "margemDisponivelEmprestimo" : 1.9, "percentualMargemDisponivelEmprestimo" : 0.1, "percentualMargemTotalEmprestimo" : 30.0, "quantidadeEmprestimo" : 3, "possuiCartao" : true, "margemDisponivelCartao" : 2.35, "percentualmargemDisponivelCartao" : 0.2, "percentualMargemTotalCartao" : 5.0 }, "contratosEmprestimo" : [ { "contrato" : "000013382526", "tipoEmprestimo" : { "codigo" : 98, "descricao" : "Empréstimo por Consignação" }, "banco" : { "codigo" : "422", "nome" : "SAFRA" }, "dataInicioContrato" : "2020-03-18", "competenciaInicioDesconto" : "04/2020", "competenciaFimDesconto" : "03/2026", "dataInclusao" : "2020-03-18", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "valorEmprestado" : 11855.72, "valorParcela" : 281.0, "quantidadeParcelas" : 72, "quantidadeParcelasEmAberto" : 72, "saldoQuitacao" : 11964.39, "taxa" : 1.63 }, { "contrato" : "000013495367", "tipoEmprestimo" : { "codigo" : 98, "descricao" : "Empréstimo por Consignação" }, "banco" : { "codigo" : "422", "nome" : "SAFRA" }, "dataInicioContrato" : "2020-03-23", "competenciaInicioDesconto" : "04/2020", "competenciaFimDesconto" : "03/2026", "dataInclusao" : "2020-03-23", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "valorEmprestado" : 433.47, "valorParcela" : 12.3, "quantidadeParcelas" : 72, "quantidadeParcelasEmAberto" : 72, "saldoQuitacao" : 441.14, "taxa" : 2.28 }, { "contrato" : "329908749-8", "tipoEmprestimo" : { "codigo" : 75, "descricao" : "Empréstimo por Retenção" }, "banco" : { "codigo" : "237", "nome" : "BRADESCO" }, "dataInicioContrato" : "2019-10-10", "competenciaInicioDesconto" : "11/2019", "competenciaFimDesconto" : "10/2025", "dataInclusao" : "2019-10-10", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "valorEmprestado" : 643.69, "valorParcela" : 18.3, "quantidadeParcelas" : 72, "quantidadeParcelasEmAberto" : 67, "saldoQuitacao" : 637.54, "taxa" : 2.28 } ], "contratosCartao" : [ { "contrato" : "0229724943941", "tipoEmprestimo" : { "codigo" : 76, "descricao" : "Reserva de Margem para Cartão de Crédito" }, "banco" : { "codigo" : "623", "nome" : "PAN" }, "dataInicioContrato" : "2019-02-06", "dataInclusao" : "2019-02-06", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "limiteCartao" : 1287.0, "valorReservado" : 49.9 } ], "resultInfo" : { "timestamp" : "2020-04-30T17:55:25.448Z", "requesdId" : "714cf304c42a4669", "queryTime" : 1807 }, "billingInfo" : { "value" : 1.0, "charged" : true, "balance" : 18.0, "balanceValidUntil" : "2020-05-09T00:00:00.000-0300", "subscriptionId" : "1iso1i24r3ixf" } }]', true);
        //$client = new Client();
        //$beneficio = 1688997153;
        //$api_key = '4e302fd20c7441c5d7971e3f10e95ac2';
        //$response = $client->request('GET', 'https://inss.api.dataconsig.com.br/v1/inss/historico/'.$beneficio.'?api_key=4e302fd20c7441c5d7971e3f10e95ac2');
        //$response->json(['api_key' => $api_key], 200);
        //$body = $response->getBody()->getContents();
        //$body = is_array($body);
        
        //$nome = $body['nome'];
        //dd($nome); die();
        $nome = $json[0]['nome'];
        $dataNascimento = $json[0]['dataNascimento'];
        $cpf = $json[0]['cpf'];
        $especie_codigo = $json[0]['especie']['codigo'];
        $especie_descricao = $json[0]['especie']['descricao'];
        $banco_codigo = $json[0]['dadosBancarios']['banco']['codigo'];
        $banco_nome = $json[0]['dadosBancarios']['banco']['nome'];
        $agencia_codigo = $json[0]['dadosBancarios']['agencia']['codigo'];
        $agencia_nome = $json[0]['dadosBancarios']['agencia']['nome'];
        $agencia_orgaoPagador = $json[0]['dadosBancarios']['agencia']['orgaoPagador'];
        $agencia_endereco = $json[0]['dadosBancarios']['agencia']['endereco']['endereco'];
        $agencia_bairro = $json[0]['dadosBancarios']['agencia']['endereco']['bairro'];
        $agencia_cidade = $json[0]['dadosBancarios']['agencia']['endereco']['cidade'];
        $agencia_cep = $json[0]['dadosBancarios']['agencia']['endereco']['cep'];
        $agencia_uf = $json[0]['dadosBancarios']['agencia']['endereco']['uf'];
        $meioPagamento = $json[0]['dadosBancarios']['meioPagamento']['tipo'];
        $situacaoBeneficio = $json[0]['situacaoBeneficio'];
        $dib = $json[0]['dib'];
        $valorBeneficio = $json[0]['valorBeneficio'];
        $possuiRepresentanteLegalProcurador = $json[0]['possuiRepresentanteLegalProcurador'];
        $pensaoAlimenticia = $json[0]['pensaoAlimenticia'];
        $bloqueioEmprestismo = $json[0]['bloqueioEmprestismo'];
        $beneficioPermiteEmprestimo = $json[0]['beneficioPermiteEmprestimo'];
        $margem_competencia = $json[0]['margem']['competencia'];
        $baseCalculoMargemConsignavel = $json[0]['margem']['baseCalculoMargemConsignavel'];
        $margemDisponivelEmprestimo = $json[0]['margem']['margemDisponivelEmprestimo'];
        $percentualMargemDisponivelEmprestimo = $json[0]['margem']['percentualMargemDisponivelEmprestimo'];
        $percentualMargemTotalEmprestimo = $json[0]['margem']['percentualMargemTotalEmprestimo'];
        $quantidadeEmprestimo = $json[0]['margem']['quantidadeEmprestimo'];
        $possuiCartao = $json[0]['margem']['possuiCartao'];
        $margemDisponivelCartao = $json[0]['margem']['margemDisponivelCartao'];
        $percentualmargemDisponivelCartao = $json[0]['margem']['percentualmargemDisponivelCartao'];
        $percentualMargemTotalCartao = $json[0]['margem']['percentualMargemTotalCartao'];

        $emprestimo_contrato_0 = $json[0]['contratosEmprestimo']['0']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_0 = $json[0]['contratosEmprestimo']['0']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_0 = $json[0]['contratosEmprestimo']['0']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_0 = $json[0]['contratosEmprestimo']['0']['banco']['codigo'];
        $emprestimo_banco_nome_0 = $json[0]['contratosEmprestimo']['0']['banco']['nome'];
        $emprestimo_dataInicioContrato_0 = $json[0]['contratosEmprestimo']['0']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_0 = $json[0]['contratosEmprestimo']['0']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_0 = $json[0]['contratosEmprestimo']['0']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_0 = $json[0]['contratosEmprestimo']['0']['dataInclusao'];
        $emprestimo_situacao_0 = $json[0]['contratosEmprestimo']['0']['situacao'];
        $emprestimo_excluidoAps_0 = $json[0]['contratosEmprestimo']['0']['excluidoAps'];
        $emprestimo_excluidoBanco_0 = $json[0]['contratosEmprestimo']['0']['excluidoBanco'];
        $emprestimo_valorEmprestado_0 = $json[0]['contratosEmprestimo']['0']['valorEmprestado'];
        $emprestimo_valorParcela_0 = $json[0]['contratosEmprestimo']['0']['valorParcela'];
        $emprestimo_quantidadeParcelas_0 = $json[0]['contratosEmprestimo']['0']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_0 = $json[0]['contratosEmprestimo']['0']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_0 = $json[0]['contratosEmprestimo']['0']['saldoQuitacao'];
        $emprestimo_taxa_0 = $json[0]['contratosEmprestimo']['0']['taxa'];

        $emprestimo_contrato_1 = $json[0]['contratosEmprestimo']['1']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_1 = $json[0]['contratosEmprestimo']['1']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_1 = $json[0]['contratosEmprestimo']['1']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_1 = $json[0]['contratosEmprestimo']['1']['banco']['codigo'];
        $emprestimo_banco_nome_1 = $json[0]['contratosEmprestimo']['1']['banco']['nome'];
        $emprestimo_dataInicioContrato_1 = $json[0]['contratosEmprestimo']['1']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_1 = $json[0]['contratosEmprestimo']['1']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_1 = $json[0]['contratosEmprestimo']['1']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_1 = $json[0]['contratosEmprestimo']['1']['dataInclusao'];
        $emprestimo_situacao_1 = $json[0]['contratosEmprestimo']['1']['situacao'];
        $emprestimo_excluidoAps_1 = $json[0]['contratosEmprestimo']['1']['excluidoAps'];
        $emprestimo_excluidoBanco_1 = $json[0]['contratosEmprestimo']['1']['excluidoBanco'];
        $emprestimo_valorEmprestado_1 = $json[0]['contratosEmprestimo']['1']['valorEmprestado'];
        $emprestimo_valorParcela_1 = $json[0]['contratosEmprestimo']['1']['valorParcela'];
        $emprestimo_quantidadeParcelas_1 = $json[0]['contratosEmprestimo']['1']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_1 = $json[0]['contratosEmprestimo']['1']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_1 = $json[0]['contratosEmprestimo']['1']['saldoQuitacao'];
        $emprestimo_taxa_1 = $json[0]['contratosEmprestimo']['1']['taxa'];

        $emprestimo_contrato_2 = $json[0]['contratosEmprestimo']['2']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_2 = $json[0]['contratosEmprestimo']['2']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_2 = $json[0]['contratosEmprestimo']['2']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_2 = $json[0]['contratosEmprestimo']['2']['banco']['codigo'];
        $emprestimo_banco_nome_2 = $json[0]['contratosEmprestimo']['2']['banco']['nome'];
        $emprestimo_dataInicioContrato_2 = $json[0]['contratosEmprestimo']['2']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_2 = $json[0]['contratosEmprestimo']['2']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_2 = $json[0]['contratosEmprestimo']['2']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_2 = $json[0]['contratosEmprestimo']['2']['dataInclusao'];
        $emprestimo_situacao_2 = $json[0]['contratosEmprestimo']['2']['situacao'];
        $emprestimo_excluidoAps_2 = $json[0]['contratosEmprestimo']['2']['excluidoAps'];
        $emprestimo_excluidoBanco_2 = $json[0]['contratosEmprestimo']['2']['excluidoBanco'];
        $emprestimo_valorEmprestado_2 = $json[0]['contratosEmprestimo']['2']['valorEmprestado'];
        $emprestimo_valorParcela_2 = $json[0]['contratosEmprestimo']['2']['valorParcela'];
        $emprestimo_quantidadeParcelas_2 = $json[0]['contratosEmprestimo']['2']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_2 = $json[0]['contratosEmprestimo']['2']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_2 = $json[0]['contratosEmprestimo']['2']['saldoQuitacao'];
        $emprestimo_taxa_2 = $json[0]['contratosEmprestimo']['2']['taxa'];

        $emprestimo_contrato_3 = $json[0]['contratosEmprestimo']['3']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_3 = $json[0]['contratosEmprestimo']['3']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_3 = $json[0]['contratosEmprestimo']['3']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_3 = $json[0]['contratosEmprestimo']['3']['banco']['codigo'];
        $emprestimo_banco_nome_3 = $json[0]['contratosEmprestimo']['3']['banco']['nome'];
        $emprestimo_dataInicioContrato_3 = $json[0]['contratosEmprestimo']['3']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_3 = $json[0]['contratosEmprestimo']['3']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_3 = $json[0]['contratosEmprestimo']['3']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_3 = $json[0]['contratosEmprestimo']['3']['dataInclusao'];
        $emprestimo_situacao_3 = $json[0]['contratosEmprestimo']['3']['situacao'];
        $emprestimo_excluidoAps_3 = $json[0]['contratosEmprestimo']['3']['excluidoAps'];
        $emprestimo_excluidoBanco_3 = $json[0]['contratosEmprestimo']['3']['excluidoBanco'];
        $emprestimo_valorEmprestado_3 = $json[0]['contratosEmprestimo']['3']['valorEmprestado'];
        $emprestimo_valorParcela_3 = $json[0]['contratosEmprestimo']['3']['valorParcela'];
        $emprestimo_quantidadeParcelas_3 = $json[0]['contratosEmprestimo']['3']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_3 = $json[0]['contratosEmprestimo']['3']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_3 = $json[0]['contratosEmprestimo']['3']['saldoQuitacao'];
        $emprestimo_taxa_3 = $json[0]['contratosEmprestimo']['3']['taxa'];

        $emprestimo_contrato_4 = $json[0]['contratosEmprestimo']['4']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_4 = $json[0]['contratosEmprestimo']['4']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_4 = $json[0]['contratosEmprestimo']['4']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_4 = $json[0]['contratosEmprestimo']['4']['banco']['codigo'];
        $emprestimo_banco_nome_4 = $json[0]['contratosEmprestimo']['4']['banco']['nome'];
        $emprestimo_dataInicioContrato_4 = $json[0]['contratosEmprestimo']['4']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_4 = $json[0]['contratosEmprestimo']['4']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_4 = $json[0]['contratosEmprestimo']['4']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_4 = $json[0]['contratosEmprestimo']['4']['dataInclusao'];
        $emprestimo_situacao_4 = $json[0]['contratosEmprestimo']['4']['situacao'];
        $emprestimo_excluidoAps_4 = $json[0]['contratosEmprestimo']['4']['excluidoAps'];
        $emprestimo_excluidoBanco_4 = $json[0]['contratosEmprestimo']['4']['excluidoBanco'];
        $emprestimo_valorEmprestado_4 = $json[0]['contratosEmprestimo']['4']['valorEmprestado'];
        $emprestimo_valorParcela_4 = $json[0]['contratosEmprestimo']['4']['valorParcela'];
        $emprestimo_quantidadeParcelas_4 = $json[0]['contratosEmprestimo']['4']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_4 = $json[0]['contratosEmprestimo']['4']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_4 = $json[0]['contratosEmprestimo']['4']['saldoQuitacao'];
        $emprestimo_taxa_4 = $json[0]['contratosEmprestimo']['4']['taxa'];

        $emprestimo_contrato_5 = $json[0]['contratosEmprestimo']['5']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_5 = $json[0]['contratosEmprestimo']['5']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_5 = $json[0]['contratosEmprestimo']['5']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_5 = $json[0]['contratosEmprestimo']['5']['banco']['codigo'];
        $emprestimo_banco_nome_5 = $json[0]['contratosEmprestimo']['5']['banco']['nome'];
        $emprestimo_dataInicioContrato_5 = $json[0]['contratosEmprestimo']['5']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_5 = $json[0]['contratosEmprestimo']['5']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_5 = $json[0]['contratosEmprestimo']['5']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_5 = $json[0]['contratosEmprestimo']['5']['dataInclusao'];
        $emprestimo_situacao_5 = $json[0]['contratosEmprestimo']['5']['situacao'];
        $emprestimo_excluidoAps_5 = $json[0]['contratosEmprestimo']['5']['excluidoAps'];
        $emprestimo_excluidoBanco_5 = $json[0]['contratosEmprestimo']['5']['excluidoBanco'];
        $emprestimo_valorEmprestado_5 = $json[0]['contratosEmprestimo']['5']['valorEmprestado'];
        $emprestimo_valorParcela_5 = $json[0]['contratosEmprestimo']['5']['valorParcela'];
        $emprestimo_quantidadeParcelas_5 = $json[0]['contratosEmprestimo']['5']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_5 = $json[0]['contratosEmprestimo']['5']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_5 = $json[0]['contratosEmprestimo']['5']['saldoQuitacao'];
        $emprestimo_taxa_5 = $json[0]['contratosEmprestimo']['5']['taxa'];

        $emprestimo_contrato_6 = $json[0]['contratosEmprestimo']['6']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_6 = $json[0]['contratosEmprestimo']['6']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_6 = $json[0]['contratosEmprestimo']['6']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_6 = $json[0]['contratosEmprestimo']['6']['banco']['codigo'];
        $emprestimo_banco_nome_6 = $json[0]['contratosEmprestimo']['6']['banco']['nome'];
        $emprestimo_dataInicioContrato_6 = $json[0]['contratosEmprestimo']['6']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_6 = $json[0]['contratosEmprestimo']['6']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_6 = $json[0]['contratosEmprestimo']['6']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_6 = $json[0]['contratosEmprestimo']['6']['dataInclusao'];
        $emprestimo_situacao_6 = $json[0]['contratosEmprestimo']['6']['situacao'];
        $emprestimo_excluidoAps_6 = $json[0]['contratosEmprestimo']['6']['excluidoAps'];
        $emprestimo_excluidoBanco_6 = $json[0]['contratosEmprestimo']['6']['excluidoBanco'];
        $emprestimo_valorEmprestado_6 = $json[0]['contratosEmprestimo']['6']['valorEmprestado'];
        $emprestimo_valorParcela_6 = $json[0]['contratosEmprestimo']['6']['valorParcela'];
        $emprestimo_quantidadeParcelas_6 = $json[0]['contratosEmprestimo']['6']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_6 = $json[0]['contratosEmprestimo']['6']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_6 = $json[0]['contratosEmprestimo']['6']['saldoQuitacao'];
        $emprestimo_taxa_6 = $json[0]['contratosEmprestimo']['6']['taxa'];

        $emprestimo_contrato_7 = $json[0]['contratosEmprestimo']['7']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_7 = $json[0]['contratosEmprestimo']['7']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_7 = $json[0]['contratosEmprestimo']['7']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_7 = $json[0]['contratosEmprestimo']['7']['banco']['codigo'];
        $emprestimo_banco_nome_7 = $json[0]['contratosEmprestimo']['7']['banco']['nome'];
        $emprestimo_dataInicioContrato_7 = $json[0]['contratosEmprestimo']['7']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_7 = $json[0]['contratosEmprestimo']['7']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_7 = $json[0]['contratosEmprestimo']['7']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_7 = $json[0]['contratosEmprestimo']['7']['dataInclusao'];
        $emprestimo_situacao_7 = $json[0]['contratosEmprestimo']['7']['situacao'];
        $emprestimo_excluidoAps_7 = $json[0]['contratosEmprestimo']['7']['excluidoAps'];
        $emprestimo_excluidoBanco_7 = $json[0]['contratosEmprestimo']['7']['excluidoBanco'];
        $emprestimo_valorEmprestado_7 = $json[0]['contratosEmprestimo']['7']['valorEmprestado'];
        $emprestimo_valorParcela_7 = $json[0]['contratosEmprestimo']['7']['valorParcela'];
        $emprestimo_quantidadeParcelas_7 = $json[0]['contratosEmprestimo']['7']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_7 = $json[0]['contratosEmprestimo']['7']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_7 = $json[0]['contratosEmprestimo']['7']['saldoQuitacao'];
        $emprestimo_taxa_7 = $json[0]['contratosEmprestimo']['7']['taxa'];

        $emprestimo_contrato_8 = $json[0]['contratosEmprestimo']['8']['contrato'];
        $emprestimo_tipoEmprestimo_codigo_8 = $json[0]['contratosEmprestimo']['8']['tipoEmprestimo']['codigo'];
        $emprestimo_tipoEmprestimo_descricao_8 = $json[0]['contratosEmprestimo']['8']['tipoEmprestimo']['descricao'];
        $emprestimo_banco_codigo_8 = $json[0]['contratosEmprestimo']['8']['banco']['codigo'];
        $emprestimo_banco_nome_8 = $json[0]['contratosEmprestimo']['8']['banco']['nome'];
        $emprestimo_dataInicioContrato_8 = $json[0]['contratosEmprestimo']['8']['dataInicioContrato'];
        $emprestimo_competenciaInicioDesconto_8 = $json[0]['contratosEmprestimo']['8']['competenciaInicioDesconto'];
        $emprestimo_competenciaFimDesconto_8 = $json[0]['contratosEmprestimo']['8']['competenciaFimDesconto'];
        $emprestimo_dataInclusao_8 = $json[0]['contratosEmprestimo']['8']['dataInclusao'];
        $emprestimo_situacao_8 = $json[0]['contratosEmprestimo']['8']['situacao'];
        $emprestimo_excluidoAps_8 = $json[0]['contratosEmprestimo']['8']['excluidoAps'];
        $emprestimo_excluidoBanco_8 = $json[0]['contratosEmprestimo']['8']['excluidoBanco'];
        $emprestimo_valorEmprestado_8 = $json[0]['contratosEmprestimo']['8']['valorEmprestado'];
        $emprestimo_valorParcela_8 = $json[0]['contratosEmprestimo']['8']['valorParcela'];
        $emprestimo_quantidadeParcelas_8 = $json[0]['contratosEmprestimo']['8']['quantidadeParcelas'];
        $emprestimo_quantidadeParcelasEmAberto_8 = $json[0]['contratosEmprestimo']['8']['quantidadeParcelasEmAberto'];
        $emprestimo_saldoQuitacao_8 = $json[0]['contratosEmprestimo']['8']['saldoQuitacao'];
        $emprestimo_taxa_8 = $json[0]['contratosEmprestimo']['8']['taxa'];

        $cartao_contrato_0 = $json[0]['contratosCartao']['0']['contrato'];
        $cartao_tipoEmprestimo_codigo_0 = $json[0]['contratosCartao']['0']['tipoEmprestimo']['codigo'];
        $cartao_tipoEmprestimo_descricao_0 = $json[0]['contratosCartao']['0']['tipoEmprestimo']['descricao'];
        $cartao_banco_codigo_0 = $json[0]['contratosCartao']['0']['banco']['codigo'];
        $cartao_banco_nome_0 = $json[0]['contratosCartao']['0']['banco']['nome'];
        $cartao_dataInicioContrato_0 = $json[0]['contratosCartao']['0']['dataInicioContrato'];
        $cartao_dataInclusao_0 = $json[0]['contratosCartao']['0']['dataInclusao'];
        $cartao_situacao_0 = $json[0]['contratosCartao']['0']['situacao'];
        $cartao_excluidoAps_0 = $json[0]['contratosCartao']['0']['excluidoAps'];
        $cartao_excluidoBanco_0 = $json[0]['contratosCartao']['0']['excluidoBanco'];
        $cartao_limiteCartao_0 = $json[0]['contratosCartao']['0']['limiteCartao'];
        $cartao_valorReservado_0 = $json[0]['contratosCartao']['0']['valorReservado'];

        $resultInfo_timestamp = $json[0]['resultInfo']['timestamp'];
        $resultInfo_requesdIdp = $json[0]['resultInfo']['requesdId'];
        $resultInfo_queryTime = $json[0]['resultInfo']['queryTime'];

        $billingInfo_value = $json[0]['billingInfo']['value'];
        $billingInfo_charged = $json[0]['billingInfo']['charged'];
        $billingInfo_balance = $json[0]['billingInfo']['balance'];
        $billingInfo_balanceValidUntil = $json[0]['billingInfo']['balanceValidUntil'];
        $billingInfo_subscriptionId = $json[0]['billingInfo']['subscriptionId'];
        
        
        
        dd($banco_nome_0);

    }
}
