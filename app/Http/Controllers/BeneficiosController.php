<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use App\Beneficio;


class BeneficiosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
		return view('novobeneficios');
	}

	public function create()
    {
        $benefs = Beneficio::all();
        return view('novobeneficios', compact('benefs'));
    }

	public function show(Request $request) {

		$beneficio = $request->input('numeroBeneficio');

        //$body = json_decode('[{ "beneficio" : "1688997153", "nome" : "MARIA ADENILDE DOS SANTOS", "dataNascimento" : "1966-02-12", "cpf" : "00748693530", "especie" : { "codigo" : "21", "descricao" : "PENSAO POR MORTE PREVIDENCIARIA" }, "dadosBancarios" : { "banco" : { "codigo" : "237", "nome" : "BRADESCO" }, "agencia" : { "codigo" : "5978", "nome" : "TAIGUE GAS - BRADESCO EXPRESSO", "endereco" : { "endereco" : "RUA ANISIO CARDOSO, 73", "bairro" : "CENTRO", "cidade" : "CUMBE", "cep" : "49660-000", "uf" : "SE" }, "orgaoPagador" : 74979 }, "meioPagamento" : { "tipo" : "CARTÃO MAGNÉTICO" } }, "situacaoBeneficio" : "ATIVO", "nit" : "12853966056", "identidade" : "0000016405137601", "sexo" : "FEMININO", "dib" : "2014-08-26", "valorBeneficio" : 1045.0, "possuiRepresentanteLegalProcurador" : false, "pensaoAlimenticia" : false, "bloqueioEmprestismo" : false, "beneficioPermiteEmprestimo" : true, "margem" : { "competencia" : "04/2020", "baseCalculoMargemConsignavel" : 1045.0, "margemDisponivelEmprestimo" : 1.9, "percentualMargemDisponivelEmprestimo" : 0.1, "percentualMargemTotalEmprestimo" : 30.0, "quantidadeEmprestimo" : 3, "possuiCartao" : true, "margemDisponivelCartao" : 2.35, "percentualmargemDisponivelCartao" : 0.2, "percentualMargemTotalCartao" : 5.0 }, "contratosEmprestimo" : [ { "contrato" : "000013382526", "tipoEmprestimo" : { "codigo" : 98, "descricao" : "Empréstimo por Consignação" }, "banco" : { "codigo" : "422", "nome" : "SAFRA" }, "dataInicioContrato" : "2020-03-18", "competenciaInicioDesconto" : "04/2020", "competenciaFimDesconto" : "03/2026", "dataInclusao" : "2020-03-18", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "valorEmprestado" : 11855.72, "valorParcela" : 281.0, "quantidadeParcelas" : 72, "quantidadeParcelasEmAberto" : 72, "saldoQuitacao" : 11964.39, "taxa" : 1.63 }, { "contrato" : "000013495367", "tipoEmprestimo" : { "codigo" : 98, "descricao" : "Empréstimo por Consignação" }, "banco" : { "codigo" : "422", "nome" : "SAFRA" }, "dataInicioContrato" : "2020-03-23", "competenciaInicioDesconto" : "04/2020", "competenciaFimDesconto" : "03/2026", "dataInclusao" : "2020-03-23", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "valorEmprestado" : 433.47, "valorParcela" : 12.3, "quantidadeParcelas" : 72, "quantidadeParcelasEmAberto" : 72, "saldoQuitacao" : 441.14, "taxa" : 2.28 }, { "contrato" : "329908749-8", "tipoEmprestimo" : { "codigo" : 75, "descricao" : "Empréstimo por Retenção" }, "banco" : { "codigo" : "237", "nome" : "BRADESCO" }, "dataInicioContrato" : "2019-10-10", "competenciaInicioDesconto" : "11/2019", "competenciaFimDesconto" : "10/2025", "dataInclusao" : "2019-10-10", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "valorEmprestado" : 643.69, "valorParcela" : 18.3, "quantidadeParcelas" : 72, "quantidadeParcelasEmAberto" : 67, "saldoQuitacao" : 637.54, "taxa" : 2.28 } ], "contratosCartao" : [ { "contrato" : "0229724943941", "tipoEmprestimo" : { "codigo" : 76, "descricao" : "Reserva de Margem para Cartão de Crédito" }, "banco" : { "codigo" : "623", "nome" : "PAN" }, "dataInicioContrato" : "2019-02-06", "dataInclusao" : "2019-02-06", "situacao" : "Ativo", "excluidoAps" : false, "excluidoBanco" : false, "limiteCartao" : 1287.0, "valorReservado" : 49.9 } ], "resultInfo" : { "timestamp" : "2020-04-30T17:55:25.448Z", "requesdId" : "714cf304c42a4669", "queryTime" : 1807 }, "billingInfo" : { "value" : 1.0, "charged" : true, "balance" : 18.0, "balanceValidUntil" : "2020-05-09T00:00:00.000-0300", "subscriptionId" : "1iso1i24r3ixf" } }]', true);
        
        $client = new Client();
        $api_key = '4e302fd20c7441c5d7971e3f10e95ac2';
        $request = $client->get('https://inss.api.dataconsig.com.br/v1/inss/historico/'.$beneficio.'?api_key='.$api_key);
        $response = $request->getBody()->getContents();
        $body = json_decode($response, true);
        
        //$nome = $body['nome'];
        //dd($body);

        //$json[0];

        $nome = $body[0]['nome'];
        $dataNascimento = $body[0]['dataNascimento'];
        $cpf = $body[0]['cpf'];
        $especie_codigo = $body[0]['especie']['codigo'];
        $especie_descricao = $body[0]['especie']['descricao'];
        $banco_codigo = $body[0]['dadosBancarios']['banco']['codigo'];
        $banco_nome = $body[0]['dadosBancarios']['banco']['nome'];
        $agencia_codigo = $body[0]['dadosBancarios']['agencia']['codigo'];
        $agencia_nome = $body[0]['dadosBancarios']['agencia']['nome'];
        $agencia_orgaoPagador = $body[0]['dadosBancarios']['agencia']['orgaoPagador'];
        $agencia_endereco = $body[0]['dadosBancarios']['agencia']['endereco']['endereco'];
        $agencia_bairro = $body[0]['dadosBancarios']['agencia']['endereco']['bairro'];
        $agencia_cidade = $body[0]['dadosBancarios']['agencia']['endereco']['cidade'];
        $agencia_cep = $body[0]['dadosBancarios']['agencia']['endereco']['cep'];
        $agencia_uf = $body[0]['dadosBancarios']['agencia']['endereco']['uf'];
        $meioPagamento = $body[0]['dadosBancarios']['meioPagamento']['tipo'];
        $situacaoBeneficio = $body[0]['situacaoBeneficio'];
        $nit = $body[0]['nit'];
        $identidade = $body[0]['identidade'];
        $sexo = $body[0]['sexo'];
        $dib = $body[0]['dib'];
        $valorBeneficio = $body[0]['valorBeneficio'];
        $possuiRepresentanteLegalProcurador = $body[0]['possuiRepresentanteLegalProcurador'];
        $pensaoAlimenticia = $body[0]['pensaoAlimenticia'];
        $bloqueioEmprestismo = $body[0]['bloqueioEmprestismo'];
        $beneficioPermiteEmprestimo = $body[0]['beneficioPermiteEmprestimo'];
        $margem_competencia = $body[0]['margem']['competencia'];
        $baseCalculoMargemConsignavel = $body[0]['margem']['baseCalculoMargemConsignavel'];
        $margemDisponivelEmprestimo = $body[0]['margem']['margemDisponivelEmprestimo'];
        $percentualMargemDisponivelEmprestimo = $body[0]['margem']['percentualMargemDisponivelEmprestimo'];
        $percentualMargemTotalEmprestimo = $body[0]['margem']['percentualMargemTotalEmprestimo'];
        $quantidadeEmprestimo = $body[0]['margem']['quantidadeEmprestimo'];
        $possuiCartao = $body[0]['margem']['possuiCartao'];
        $margemDisponivelCartao = $body[0]['margem']['margemDisponivelCartao'];
        $percentualmargemDisponivelCartao = $body[0]['margem']['percentualmargemDisponivelCartao'];
        $percentualMargemTotalCartao = $body[0]['margem']['percentualMargemTotalCartao'];

        if (isset($body[0]['contratosEmprestimo']['0']['contrato']) != NULL) {
            $emprestimo_contrato_0 = $body[0]['contratosEmprestimo']['0']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_0 = $body[0]['contratosEmprestimo']['0']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_0 = $body[0]['contratosEmprestimo']['0']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_0 = $body[0]['contratosEmprestimo']['0']['banco']['codigo'];
            $emprestimo_banco_nome_0 = $body[0]['contratosEmprestimo']['0']['banco']['nome'];
            $emprestimo_dataInicioContrato_0 = $body[0]['contratosEmprestimo']['0']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_0 = $body[0]['contratosEmprestimo']['0']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_0 = $body[0]['contratosEmprestimo']['0']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_0 = $body[0]['contratosEmprestimo']['0']['dataInclusao'];
            $emprestimo_situacao_0 = $body[0]['contratosEmprestimo']['0']['situacao'];
            $emprestimo_excluidoAps_0 = $body[0]['contratosEmprestimo']['0']['excluidoAps'];
            $emprestimo_excluidoBanco_0 = $body[0]['contratosEmprestimo']['0']['excluidoBanco'];
            $emprestimo_valorEmprestado_0 = $body[0]['contratosEmprestimo']['0']['valorEmprestado'];
            $emprestimo_valorParcela_0 = $body[0]['contratosEmprestimo']['0']['valorParcela'];
            $emprestimo_quantidadeParcelas_0 = $body[0]['contratosEmprestimo']['0']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_0 = $body[0]['contratosEmprestimo']['0']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_0 = $body[0]['contratosEmprestimo']['0']['saldoQuitacao'];
            $emprestimo_taxa_0 = $body[0]['contratosEmprestimo']['0']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['1']['contrato']) != NULL) {
            $emprestimo_contrato_1 = $body[0]['contratosEmprestimo']['1']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_1 = $body[0]['contratosEmprestimo']['1']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_1 = $body[0]['contratosEmprestimo']['1']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_1 = $body[0]['contratosEmprestimo']['1']['banco']['codigo'];
            $emprestimo_banco_nome_1 = $body[0]['contratosEmprestimo']['1']['banco']['nome'];
            $emprestimo_dataInicioContrato_1 = $body[0]['contratosEmprestimo']['1']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_1 = $body[0]['contratosEmprestimo']['1']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_1 = $body[0]['contratosEmprestimo']['1']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_1 = $body[0]['contratosEmprestimo']['1']['dataInclusao'];
            $emprestimo_situacao_1 = $body[0]['contratosEmprestimo']['1']['situacao'];
            $emprestimo_excluidoAps_1 = $body[0]['contratosEmprestimo']['1']['excluidoAps'];
            $emprestimo_excluidoBanco_1 = $body[0]['contratosEmprestimo']['1']['excluidoBanco'];
            $emprestimo_valorEmprestado_1 = $body[0]['contratosEmprestimo']['1']['valorEmprestado'];
            $emprestimo_valorParcela_1 = $body[0]['contratosEmprestimo']['1']['valorParcela'];
            $emprestimo_quantidadeParcelas_1 = $body[0]['contratosEmprestimo']['1']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_1 = $body[0]['contratosEmprestimo']['1']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_1 = $body[0]['contratosEmprestimo']['1']['saldoQuitacao'];
            $emprestimo_taxa_1 = $body[0]['contratosEmprestimo']['1']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['2']['contrato']) != NULL) {
            $emprestimo_contrato_2 = $body[0]['contratosEmprestimo']['2']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_2 = $body[0]['contratosEmprestimo']['2']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_2 = $body[0]['contratosEmprestimo']['2']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_2 = $body[0]['contratosEmprestimo']['2']['banco']['codigo'];
            $emprestimo_banco_nome_2 = $body[0]['contratosEmprestimo']['2']['banco']['nome'];
            $emprestimo_dataInicioContrato_2 = $body[0]['contratosEmprestimo']['2']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_2 = $body[0]['contratosEmprestimo']['2']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_2 = $body[0]['contratosEmprestimo']['2']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_2 = $body[0]['contratosEmprestimo']['2']['dataInclusao'];
            $emprestimo_situacao_2 = $body[0]['contratosEmprestimo']['2']['situacao'];
            $emprestimo_excluidoAps_2 = $body[0]['contratosEmprestimo']['2']['excluidoAps'];
            $emprestimo_excluidoBanco_2 = $body[0]['contratosEmprestimo']['2']['excluidoBanco'];
            $emprestimo_valorEmprestado_2 = $body[0]['contratosEmprestimo']['2']['valorEmprestado'];
            $emprestimo_valorParcela_2 = $body[0]['contratosEmprestimo']['2']['valorParcela'];
            $emprestimo_quantidadeParcelas_2 = $body[0]['contratosEmprestimo']['2']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_2 = $body[0]['contratosEmprestimo']['2']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_2 = $body[0]['contratosEmprestimo']['2']['saldoQuitacao'];
            $emprestimo_taxa_2 = $body[0]['contratosEmprestimo']['2']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['3']['contrato']) != NULL) {
            $emprestimo_contrato_3 = $body[0]['contratosEmprestimo']['3']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_3 = $body[0]['contratosEmprestimo']['3']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_3 = $body[0]['contratosEmprestimo']['3']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_3 = $body[0]['contratosEmprestimo']['3']['banco']['codigo'];
            $emprestimo_banco_nome_3 = $body[0]['contratosEmprestimo']['3']['banco']['nome'];
            $emprestimo_dataInicioContrato_3 = $body[0]['contratosEmprestimo']['3']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_3 = $body[0]['contratosEmprestimo']['3']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_3 = $body[0]['contratosEmprestimo']['3']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_3 = $body[0]['contratosEmprestimo']['3']['dataInclusao'];
            $emprestimo_situacao_3 = $body[0]['contratosEmprestimo']['3']['situacao'];
            $emprestimo_excluidoAps_3 = $body[0]['contratosEmprestimo']['3']['excluidoAps'];
            $emprestimo_excluidoBanco_3 = $body[0]['contratosEmprestimo']['3']['excluidoBanco'];
            $emprestimo_valorEmprestado_3 = $body[0]['contratosEmprestimo']['3']['valorEmprestado'];
            $emprestimo_valorParcela_3 = $body[0]['contratosEmprestimo']['3']['valorParcela'];
            $emprestimo_quantidadeParcelas_3 = $body[0]['contratosEmprestimo']['3']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_3 = $body[0]['contratosEmprestimo']['3']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_3 = $body[0]['contratosEmprestimo']['3']['saldoQuitacao'];
            $emprestimo_taxa_3 = $body[0]['contratosEmprestimo']['3']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['4']['contrato']) != '') {
            $emprestimo_contrato_4 = $body[0]['contratosEmprestimo']['4']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_4 = $body[0]['contratosEmprestimo']['4']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_4 = $body[0]['contratosEmprestimo']['4']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_4 = $body[0]['contratosEmprestimo']['4']['banco']['codigo'];
            $emprestimo_banco_nome_4 = $body[0]['contratosEmprestimo']['4']['banco']['nome'];
            $emprestimo_dataInicioContrato_4 = $body[0]['contratosEmprestimo']['4']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_4 = $body[0]['contratosEmprestimo']['4']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_4 = $body[0]['contratosEmprestimo']['4']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_4 = $body[0]['contratosEmprestimo']['4']['dataInclusao'];
            $emprestimo_situacao_4 = $body[0]['contratosEmprestimo']['4']['situacao'];
            $emprestimo_excluidoAps_4 = $body[0]['contratosEmprestimo']['4']['excluidoAps'];
            $emprestimo_excluidoBanco_4 = $body[0]['contratosEmprestimo']['4']['excluidoBanco'];
            $emprestimo_valorEmprestado_4 = $body[0]['contratosEmprestimo']['4']['valorEmprestado'];
            $emprestimo_valorParcela_4 = $body[0]['contratosEmprestimo']['4']['valorParcela'];
            $emprestimo_quantidadeParcelas_4 = $body[0]['contratosEmprestimo']['4']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_4 = $body[0]['contratosEmprestimo']['4']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_4 = $body[0]['contratosEmprestimo']['4']['saldoQuitacao'];
            $emprestimo_taxa_4 = $body[0]['contratosEmprestimo']['4']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['5']['contrato']) != NULL) {
            $emprestimo_contrato_5 = $body[0]['contratosEmprestimo']['5']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_5 = $body[0]['contratosEmprestimo']['5']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_5 = $body[0]['contratosEmprestimo']['5']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_5 = $body[0]['contratosEmprestimo']['5']['banco']['codigo'];
            $emprestimo_banco_nome_5 = $body[0]['contratosEmprestimo']['5']['banco']['nome'];
            $emprestimo_dataInicioContrato_5 = $body[0]['contratosEmprestimo']['5']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_5 = $body[0]['contratosEmprestimo']['5']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_5 = $body[0]['contratosEmprestimo']['5']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_5 = $body[0]['contratosEmprestimo']['5']['dataInclusao'];
            $emprestimo_situacao_5 = $body[0]['contratosEmprestimo']['5']['situacao'];
            $emprestimo_excluidoAps_5 = $body[0]['contratosEmprestimo']['5']['excluidoAps'];
            $emprestimo_excluidoBanco_5 = $body[0]['contratosEmprestimo']['5']['excluidoBanco'];
            $emprestimo_valorEmprestado_5 = $body[0]['contratosEmprestimo']['5']['valorEmprestado'];
            $emprestimo_valorParcela_5 = $body[0]['contratosEmprestimo']['5']['valorParcela'];
            $emprestimo_quantidadeParcelas_5 = $body[0]['contratosEmprestimo']['5']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_5 = $body[0]['contratosEmprestimo']['5']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_5 = $body[0]['contratosEmprestimo']['5']['saldoQuitacao'];
            $emprestimo_taxa_5 = $body[0]['contratosEmprestimo']['5']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['6']['contrato']) != '') {
            $emprestimo_contrato_6 = $body[0]['contratosEmprestimo']['6']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_6 = $body[0]['contratosEmprestimo']['6']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_6 = $body[0]['contratosEmprestimo']['6']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_6 = $body[0]['contratosEmprestimo']['6']['banco']['codigo'];
            $emprestimo_banco_nome_6 = $body[0]['contratosEmprestimo']['6']['banco']['nome'];
            $emprestimo_dataInicioContrato_6 = $body[0]['contratosEmprestimo']['6']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_6 = $body[0]['contratosEmprestimo']['6']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_6 = $body[0]['contratosEmprestimo']['6']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_6 = $body[0]['contratosEmprestimo']['6']['dataInclusao'];
            $emprestimo_situacao_6 = $body[0]['contratosEmprestimo']['6']['situacao'];
            $emprestimo_excluidoAps_6 = $body[0]['contratosEmprestimo']['6']['excluidoAps'];
            $emprestimo_excluidoBanco_6 = $body[0]['contratosEmprestimo']['6']['excluidoBanco'];
            $emprestimo_valorEmprestado_6 = $body[0]['contratosEmprestimo']['6']['valorEmprestado'];
            $emprestimo_valorParcela_6 = $body[0]['contratosEmprestimo']['6']['valorParcela'];
            $emprestimo_quantidadeParcelas_6 = $body[0]['contratosEmprestimo']['6']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_6 = $body[0]['contratosEmprestimo']['6']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_6 = $body[0]['contratosEmprestimo']['6']['saldoQuitacao'];
            $emprestimo_taxa_6 = $body[0]['contratosEmprestimo']['6']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['7']['contrato']) != '') {
            $emprestimo_contrato_7 = $body[0]['contratosEmprestimo']['7']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_7 = $body[0]['contratosEmprestimo']['7']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_7 = $body[0]['contratosEmprestimo']['7']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_7 = $body[0]['contratosEmprestimo']['7']['banco']['codigo'];
            $emprestimo_banco_nome_7 = $body[0]['contratosEmprestimo']['7']['banco']['nome'];
            $emprestimo_dataInicioContrato_7 = $body[0]['contratosEmprestimo']['7']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_7 = $body[0]['contratosEmprestimo']['7']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_7 = $body[0]['contratosEmprestimo']['7']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_7 = $body[0]['contratosEmprestimo']['7']['dataInclusao'];
            $emprestimo_situacao_7 = $body[0]['contratosEmprestimo']['7']['situacao'];
            $emprestimo_excluidoAps_7 = $body[0]['contratosEmprestimo']['7']['excluidoAps'];
            $emprestimo_excluidoBanco_7 = $body[0]['contratosEmprestimo']['7']['excluidoBanco'];
            $emprestimo_valorEmprestado_7 = $body[0]['contratosEmprestimo']['7']['valorEmprestado'];
            $emprestimo_valorParcela_7 = $body[0]['contratosEmprestimo']['7']['valorParcela'];
            $emprestimo_quantidadeParcelas_7 = $body[0]['contratosEmprestimo']['7']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_7 = $body[0]['contratosEmprestimo']['7']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_7 = $body[0]['contratosEmprestimo']['7']['saldoQuitacao'];
            $emprestimo_taxa_7 = $body[0]['contratosEmprestimo']['7']['taxa'];
        }

        if (isset($body[0]['contratosEmprestimo']['8']['contrato']) != '') {
            $emprestimo_contrato_8 = $body[0]['contratosEmprestimo']['8']['contrato'];
            $emprestimo_tipoEmprestimo_codigo_8 = $body[0]['contratosEmprestimo']['8']['tipoEmprestimo']['codigo'];
            $emprestimo_tipoEmprestimo_descricao_8 = $body[0]['contratosEmprestimo']['8']['tipoEmprestimo']['descricao'];
            $emprestimo_banco_codigo_8 = $body[0]['contratosEmprestimo']['8']['banco']['codigo'];
            $emprestimo_banco_nome_8 = $body[0]['contratosEmprestimo']['8']['banco']['nome'];
            $emprestimo_dataInicioContrato_8 = $body[0]['contratosEmprestimo']['8']['dataInicioContrato'];
            $emprestimo_competenciaInicioDesconto_8 = $body[0]['contratosEmprestimo']['8']['competenciaInicioDesconto'];
            $emprestimo_competenciaFimDesconto_8 = $body[0]['contratosEmprestimo']['8']['competenciaFimDesconto'];
            $emprestimo_dataInclusao_8 = $body[0]['contratosEmprestimo']['8']['dataInclusao'];
            $emprestimo_situacao_8 = $body[0]['contratosEmprestimo']['8']['situacao'];
            $emprestimo_excluidoAps_8 = $body[0]['contratosEmprestimo']['8']['excluidoAps'];
            $emprestimo_excluidoBanco_8 = $body[0]['contratosEmprestimo']['8']['excluidoBanco'];
            $emprestimo_valorEmprestado_8 = $body[0]['contratosEmprestimo']['8']['valorEmprestado'];
            $emprestimo_valorParcela_8 = $body[0]['contratosEmprestimo']['8']['valorParcela'];
            $emprestimo_quantidadeParcelas_8 = $body[0]['contratosEmprestimo']['8']['quantidadeParcelas'];
            $emprestimo_quantidadeParcelasEmAberto_8 = $body[0]['contratosEmprestimo']['8']['quantidadeParcelasEmAberto'];
            $emprestimo_saldoQuitacao_8 = $body[0]['contratosEmprestimo']['8']['saldoQuitacao'];
            $emprestimo_taxa_8 = $body[0]['contratosEmprestimo']['8']['taxa'];
        }

        if (isset($body[0]['contratosCartao']['0']['contrato']) != '') {
            $cartao_contrato_0 = $body[0]['contratosCartao']['0']['contrato'];
            $cartao_tipoEmprestimo_codigo_0 = $body[0]['contratosCartao']['0']['tipoEmprestimo']['codigo'];
            $cartao_tipoEmprestimo_descricao_0 = $body[0]['contratosCartao']['0']['tipoEmprestimo']['descricao'];
            $cartao_banco_codigo_0 = $body[0]['contratosCartao']['0']['banco']['codigo'];
            $cartao_banco_nome_0 = $body[0]['contratosCartao']['0']['banco']['nome'];
            $cartao_dataInicioContrato_0 = $body[0]['contratosCartao']['0']['dataInicioContrato'];
            $cartao_dataInclusao_0 = $body[0]['contratosCartao']['0']['dataInclusao'];
            $cartao_situacao_0 = $body[0]['contratosCartao']['0']['situacao'];
            $cartao_excluidoAps_0 = $body[0]['contratosCartao']['0']['excluidoAps'];
            $cartao_excluidoBanco_0 = $body[0]['contratosCartao']['0']['excluidoBanco'];
            $cartao_limiteCartao_0 = $body[0]['contratosCartao']['0']['limiteCartao'];
            $cartao_valorReservado_0 = $body[0]['contratosCartao']['0']['valorReservado'];
        }

        $resultInfo_timestamp = $body[0]['resultInfo']['timestamp'];
        $resultInfo_timestamp = strtotime($resultInfo_timestamp);
        $resultInfo_timestamp = date('Y-m-d H:i:s', $resultInfo_timestamp);
        $resultInfo_requesdIdp = $body[0]['resultInfo']['requesdId'];
        $resultInfo_queryTime = $body[0]['resultInfo']['queryTime'];

        $billingInfo_value = $body[0]['billingInfo']['value'];
        $billingInfo_charged = $body[0]['billingInfo']['charged'];
        $billingInfo_balance = $body[0]['billingInfo']['balance'];
        $billingInfo_balanceValidUntil = $body[0]['billingInfo']['balanceValidUntil'];
        $billingInfo_balanceValidUntil = strtotime($billingInfo_balanceValidUntil);
        $billingInfo_balanceValidUntil = date('Y-m-d H:i:s', $billingInfo_balanceValidUntil);
        $billingInfo_subscriptionId = $body[0]['billingInfo']['subscriptionId'];
        
        //dd($billingInfo_subscriptionId);

        $benefs = new Beneficio();

        $benefs->nome = $nome;
        $benefs->beneficio = $beneficio;        
        $benefs->cpf = $cpf;
        $benefs->dataNascimento = $dataNascimento;
        $benefs->especie_codigo = $especie_codigo;
        $benefs->especie_descricao = $especie_descricao;

        $benefs->banco_codigo = $banco_codigo;
        $benefs->banco_nome = $banco_nome;
        $benefs->agencia_codigo = $agencia_codigo;
        $benefs->agencia_nome = $agencia_nome;
        $benefs->agencia_orgaoPagador = $agencia_orgaoPagador;
        $benefs->agencia_endereco = $agencia_endereco;
        $benefs->agencia_bairro = $agencia_bairro;
        $benefs->agencia_cidade = $agencia_cidade;
        $benefs->agencia_cep = $agencia_cep;
        $benefs->agencia_uf = $agencia_uf;
        $benefs->meioPagamento = $meioPagamento;

        $benefs->situacaoBeneficio = $situacaoBeneficio;
        $benefs->nit = $nit;
        $benefs->identidade = $identidade;
        $benefs->sexo = $sexo;
        $benefs->dib = $dib;
        $benefs->valorBeneficio = $valorBeneficio;
        $benefs->possuiRepresentanteLegalProcurador = $possuiRepresentanteLegalProcurador;
        $benefs->pensaoAlimenticia = $pensaoAlimenticia;
        $benefs->bloqueioEmprestismo = $bloqueioEmprestismo;
        $benefs->beneficioPermiteEmprestimo = $beneficioPermiteEmprestimo;
        $benefs->margem_competencia = $margem_competencia;
        $benefs->baseCalculoMargemConsignavel = $baseCalculoMargemConsignavel;
        $benefs->margemDisponivelEmprestimo = $margemDisponivelEmprestimo;
        $benefs->percentualMargemDisponivelEmprestimo = $percentualMargemDisponivelEmprestimo;
        $benefs->percentualMargemTotalEmprestimo = $percentualMargemTotalEmprestimo;
        $benefs->quantidadeEmprestimo = $quantidadeEmprestimo;
        $benefs->possuiCartao = $possuiCartao;
        $benefs->margemDisponivelCartao = $margemDisponivelCartao;
        $benefs->percentualmargemDisponivelCartao = $percentualmargemDisponivelCartao;
        $benefs->percentualMargemTotalCartao = $percentualMargemTotalCartao;

        if(isset($emprestimo_contrato_0)) {
            $benefs->emprestimo_contrato_0 = $emprestimo_contrato_0;
            $benefs->emprestimo_tipoEmprestimo_codigo_0 = $emprestimo_tipoEmprestimo_codigo_0;
            $benefs->emprestimo_tipoEmprestimo_descricao_0 = $emprestimo_tipoEmprestimo_descricao_0;
            $benefs->emprestimo_banco_codigo_0 = $emprestimo_banco_codigo_0;
            $benefs->emprestimo_banco_nome_0 = $emprestimo_banco_nome_0;
            $benefs->emprestimo_dataInicioContrato_0 = $emprestimo_dataInicioContrato_0;
            $benefs->emprestimo_competenciaInicioDesconto_0 = $emprestimo_competenciaInicioDesconto_0;
            $benefs->emprestimo_competenciaFimDesconto_0 = $emprestimo_competenciaFimDesconto_0;
            $benefs->emprestimo_dataInclusao_0 = $emprestimo_dataInclusao_0;
            $benefs->emprestimo_situacao_0 = $emprestimo_situacao_0;
            $benefs->emprestimo_excluidoAps_0 = $emprestimo_excluidoAps_0;
            $benefs->emprestimo_excluidoBanco_0 = $emprestimo_excluidoBanco_0;
            $benefs->emprestimo_valorEmprestado_0 = $emprestimo_valorEmprestado_0;
            $benefs->emprestimo_valorParcela_0 = $emprestimo_valorParcela_0;
            $benefs->emprestimo_quantidadeParcelas_0 = $emprestimo_quantidadeParcelas_0;
            $benefs->emprestimo_quantidadeParcelasEmAberto_0 = $emprestimo_quantidadeParcelasEmAberto_0;
            $benefs->emprestimo_saldoQuitacao_0 = $emprestimo_saldoQuitacao_0;
            $benefs->emprestimo_taxa_0 = $emprestimo_taxa_0;
        }

        if(isset($emprestimo_contrato_1)) {
            $benefs->emprestimo_contrato_1 = $emprestimo_contrato_1;
            $benefs->emprestimo_tipoEmprestimo_codigo_1 = $emprestimo_tipoEmprestimo_codigo_1;
            $benefs->emprestimo_tipoEmprestimo_descricao_1 = $emprestimo_tipoEmprestimo_descricao_1;
            $benefs->emprestimo_banco_codigo_1 = $emprestimo_banco_codigo_1;
            $benefs->emprestimo_banco_nome_1 = $emprestimo_banco_nome_1;
            $benefs->emprestimo_dataInicioContrato_1 = $emprestimo_dataInicioContrato_1;
            $benefs->emprestimo_competenciaInicioDesconto_1 = $emprestimo_competenciaInicioDesconto_1;
            $benefs->emprestimo_competenciaFimDesconto_1 = $emprestimo_competenciaFimDesconto_1;
            $benefs->emprestimo_dataInclusao_1 = $emprestimo_dataInclusao_1;
            $benefs->emprestimo_situacao_1 = $emprestimo_situacao_1;
            $benefs->emprestimo_excluidoAps_1 = $emprestimo_excluidoAps_1;
            $benefs->emprestimo_excluidoBanco_1 = $emprestimo_excluidoBanco_1;
            $benefs->emprestimo_valorEmprestado_1 = $emprestimo_valorEmprestado_1;
            $benefs->emprestimo_valorParcela_1 = $emprestimo_valorParcela_1;
            $benefs->emprestimo_quantidadeParcelas_1 = $emprestimo_quantidadeParcelas_1;
            $benefs->emprestimo_quantidadeParcelasEmAberto_1 = $emprestimo_quantidadeParcelasEmAberto_1;
            $benefs->emprestimo_saldoQuitacao_1 = $emprestimo_saldoQuitacao_1;
            $benefs->emprestimo_taxa_1 = $emprestimo_taxa_1;
        }

        if(isset($emprestimo_contrato_2)) {
            $benefs->emprestimo_contrato_2 = $emprestimo_contrato_2;
            $benefs->emprestimo_tipoEmprestimo_codigo_2 = $emprestimo_tipoEmprestimo_codigo_2;
            $benefs->emprestimo_tipoEmprestimo_descricao_2 = $emprestimo_tipoEmprestimo_descricao_2;
            $benefs->emprestimo_banco_codigo_2 = $emprestimo_banco_codigo_2;
            $benefs->emprestimo_banco_nome_2 = $emprestimo_banco_nome_2;
            $benefs->emprestimo_dataInicioContrato_2 = $emprestimo_dataInicioContrato_2;
            $benefs->emprestimo_competenciaInicioDesconto_2 = $emprestimo_competenciaInicioDesconto_2;
            $benefs->emprestimo_competenciaFimDesconto_2 = $emprestimo_competenciaFimDesconto_2;
            $benefs->emprestimo_dataInclusao_2 = $emprestimo_dataInclusao_2;
            $benefs->emprestimo_situacao_2 = $emprestimo_situacao_2;
            $benefs->emprestimo_excluidoAps_2 = $emprestimo_excluidoAps_2;
            $benefs->emprestimo_excluidoBanco_2 = $emprestimo_excluidoBanco_2;
            $benefs->emprestimo_valorEmprestado_2 = $emprestimo_valorEmprestado_2;
            $benefs->emprestimo_valorParcela_2 = $emprestimo_valorParcela_2;
            $benefs->emprestimo_quantidadeParcelas_2 = $emprestimo_quantidadeParcelas_2;
            $benefs->emprestimo_quantidadeParcelasEmAberto_2 = $emprestimo_quantidadeParcelasEmAberto_2;
            $benefs->emprestimo_saldoQuitacao_2 = $emprestimo_saldoQuitacao_2;
            $benefs->emprestimo_taxa_2 = $emprestimo_taxa_2;
        }

        if(isset($emprestimo_contrato_3)) {
            $benefs->emprestimo_contrato_3 = $emprestimo_contrato_3;
            $benefs->emprestimo_tipoEmprestimo_codigo_3 = $emprestimo_tipoEmprestimo_codigo_3;
            $benefs->emprestimo_tipoEmprestimo_descricao_3 = $emprestimo_tipoEmprestimo_descricao_3;
            $benefs->emprestimo_banco_codigo_3 = $emprestimo_banco_codigo_3;
            $benefs->emprestimo_banco_nome_3 = $emprestimo_banco_nome_3;
            $benefs->emprestimo_dataInicioContrato_3 = $emprestimo_dataInicioContrato_3;
            $benefs->emprestimo_competenciaInicioDesconto_3 = $emprestimo_competenciaInicioDesconto_3;
            $benefs->emprestimo_competenciaFimDesconto_3 = $emprestimo_competenciaFimDesconto_3;
            $benefs->emprestimo_dataInclusao_3 = $emprestimo_dataInclusao_3;
            $benefs->emprestimo_situacao_3 = $emprestimo_situacao_3;
            $benefs->emprestimo_excluidoAps_3 = $emprestimo_excluidoAps_3;
            $benefs->emprestimo_excluidoBanco_3 = $emprestimo_excluidoBanco_3;
            $benefs->emprestimo_valorEmprestado_3 = $emprestimo_valorEmprestado_3;
            $benefs->emprestimo_valorParcela_3 = $emprestimo_valorParcela_3;
            $benefs->emprestimo_quantidadeParcelas_3 = $emprestimo_quantidadeParcelas_3;
            $benefs->emprestimo_quantidadeParcelasEmAberto_3 = $emprestimo_quantidadeParcelasEmAberto_3;
            $benefs->emprestimo_saldoQuitacao_3 = $emprestimo_saldoQuitacao_3;
            $benefs->emprestimo_taxa_3 = $emprestimo_taxa_3;
        }

        if(isset($emprestimo_contrato_4)) {
            $benefs->emprestimo_contrato_4 = $emprestimo_contrato_4;
            $benefs->emprestimo_tipoEmprestimo_codigo_4 = $emprestimo_tipoEmprestimo_codigo_4;
            $benefs->emprestimo_tipoEmprestimo_descricao_4 = $emprestimo_tipoEmprestimo_descricao_4;
            $benefs->emprestimo_banco_codigo_4 = $emprestimo_banco_codigo_4;
            $benefs->emprestimo_banco_nome_4 = $emprestimo_banco_nome_4;
            $benefs->emprestimo_dataInicioContrato_4 = $emprestimo_dataInicioContrato_4;
            $benefs->emprestimo_competenciaInicioDesconto_4 = $emprestimo_competenciaInicioDesconto_4;
            $benefs->emprestimo_competenciaFimDesconto_4 = $emprestimo_competenciaFimDesconto_4;
            $benefs->emprestimo_dataInclusao_4 = $emprestimo_dataInclusao_4;
            $benefs->emprestimo_situacao_4 = $emprestimo_situacao_4;
            $benefs->emprestimo_excluidoAps_4 = $emprestimo_excluidoAps_4;
            $benefs->emprestimo_excluidoBanco_4 = $emprestimo_excluidoBanco_4;
            $benefs->emprestimo_valorEmprestado_4 = $emprestimo_valorEmprestado_4;
            $benefs->emprestimo_valorParcela_4 = $emprestimo_valorParcela_4;
            $benefs->emprestimo_quantidadeParcelas_4 = $emprestimo_quantidadeParcelas_4;
            $benefs->emprestimo_quantidadeParcelasEmAberto_4 = $emprestimo_quantidadeParcelasEmAberto_4;
            $benefs->emprestimo_saldoQuitacao_4 = $emprestimo_saldoQuitacao_4;
            $benefs->emprestimo_taxa_4 = $emprestimo_taxa_4;
        }

        if(isset($emprestimo_contrato_5)) {
            $benefs->emprestimo_contrato_5 = $emprestimo_contrato_5;
            $benefs->emprestimo_tipoEmprestimo_codigo_5 = $emprestimo_tipoEmprestimo_codigo_5;
            $benefs->emprestimo_tipoEmprestimo_descricao_5 = $emprestimo_tipoEmprestimo_descricao_5;
            $benefs->emprestimo_banco_codigo_5 = $emprestimo_banco_codigo_5;
            $benefs->emprestimo_banco_nome_5 = $emprestimo_banco_nome_5;
            $benefs->emprestimo_dataInicioContrato_5 = $emprestimo_dataInicioContrato_5;
            $benefs->emprestimo_competenciaInicioDesconto_5 = $emprestimo_competenciaInicioDesconto_5;
            $benefs->emprestimo_competenciaFimDesconto_5 = $emprestimo_competenciaFimDesconto_5;
            $benefs->emprestimo_dataInclusao_5 = $emprestimo_dataInclusao_5;
            $benefs->emprestimo_situacao_5 = $emprestimo_situacao_5;
            $benefs->emprestimo_excluidoAps_5 = $emprestimo_excluidoAps_5;
            $benefs->emprestimo_excluidoBanco_5 = $emprestimo_excluidoBanco_5;
            $benefs->emprestimo_valorEmprestado_5 = $emprestimo_valorEmprestado_5;
            $benefs->emprestimo_valorParcela_5 = $emprestimo_valorParcela_5;
            $benefs->emprestimo_quantidadeParcelas_5 = $emprestimo_quantidadeParcelas_5;
            $benefs->emprestimo_quantidadeParcelasEmAberto_5 = $emprestimo_quantidadeParcelasEmAberto_5;
            $benefs->emprestimo_saldoQuitacao_5 = $emprestimo_saldoQuitacao_5;
            $benefs->emprestimo_taxa_5 = $emprestimo_taxa_5;
        }

        if(isset($emprestimo_contrato_6)) {
            $benefs->emprestimo_contrato_6 = $emprestimo_contrato_6;
            $benefs->emprestimo_tipoEmprestimo_codigo_6 = $emprestimo_tipoEmprestimo_codigo_6;
            $benefs->emprestimo_tipoEmprestimo_descricao_6 = $emprestimo_tipoEmprestimo_descricao_6;
            $benefs->emprestimo_banco_codigo_6 = $emprestimo_banco_codigo_6;
            $benefs->emprestimo_banco_nome_6 = $emprestimo_banco_nome_6;
            $benefs->emprestimo_dataInicioContrato_6 = $emprestimo_dataInicioContrato_6;
            $benefs->emprestimo_competenciaInicioDesconto_6 = $emprestimo_competenciaInicioDesconto_6;
            $benefs->emprestimo_competenciaFimDesconto_6 = $emprestimo_competenciaFimDesconto_6;
            $benefs->emprestimo_dataInclusao_6 = $emprestimo_dataInclusao_6;
            $benefs->emprestimo_situacao_6 = $emprestimo_situacao_6;
            $benefs->emprestimo_excluidoAps_6 = $emprestimo_excluidoAps_6;
            $benefs->emprestimo_excluidoBanco_6 = $emprestimo_excluidoBanco_6;
            $benefs->emprestimo_valorEmprestado_6 = $emprestimo_valorEmprestado_6;
            $benefs->emprestimo_valorParcela_6 = $emprestimo_valorParcela_6;
            $benefs->emprestimo_quantidadeParcelas_6 = $emprestimo_quantidadeParcelas_6;
            $benefs->emprestimo_quantidadeParcelasEmAberto_6 = $emprestimo_quantidadeParcelasEmAberto_6;
            $benefs->emprestimo_saldoQuitacao_6 = $emprestimo_saldoQuitacao_6;
            $benefs->emprestimo_taxa_6 = $emprestimo_taxa_6;
        }

        if(isset($emprestimo_contrato_7)) {
            $benefs->emprestimo_contrato_7 = $emprestimo_contrato_7;
            $benefs->emprestimo_tipoEmprestimo_codigo_7 = $emprestimo_tipoEmprestimo_codigo_7;
            $benefs->emprestimo_tipoEmprestimo_descricao_7 = $emprestimo_tipoEmprestimo_descricao_7;
            $benefs->emprestimo_banco_codigo_7 = $emprestimo_banco_codigo_7;
            $benefs->emprestimo_banco_nome_7 = $emprestimo_banco_nome_7;
            $benefs->emprestimo_dataInicioContrato_7 = $emprestimo_dataInicioContrato_7;
            $benefs->emprestimo_competenciaInicioDesconto_7 = $emprestimo_competenciaInicioDesconto_7;
            $benefs->emprestimo_competenciaFimDesconto_7 = $emprestimo_competenciaFimDesconto_7;
            $benefs->emprestimo_dataInclusao_7 = $emprestimo_dataInclusao_7;
            $benefs->emprestimo_situacao_7 = $emprestimo_situacao_7;
            $benefs->emprestimo_excluidoAps_7 = $emprestimo_excluidoAps_7;
            $benefs->emprestimo_excluidoBanco_7 = $emprestimo_excluidoBanco_7;
            $benefs->emprestimo_valorEmprestado_7 = $emprestimo_valorEmprestado_7;
            $benefs->emprestimo_valorParcela_7 = $emprestimo_valorParcela_7;
            $benefs->emprestimo_quantidadeParcelas_7 = $emprestimo_quantidadeParcelas_7;
            $benefs->emprestimo_quantidadeParcelasEmAberto_7 = $emprestimo_quantidadeParcelasEmAberto_7;
            $benefs->emprestimo_saldoQuitacao_7 = $emprestimo_saldoQuitacao_7;
            $benefs->emprestimo_taxa_7 = $emprestimo_taxa_7;
        }

        if(isset($emprestimo_contrato_8)) {
            $benefs->emprestimo_contrato_8 = $emprestimo_contrato_8;
            $benefs->emprestimo_tipoEmprestimo_codigo_8 = $emprestimo_tipoEmprestimo_codigo_8;
            $benefs->emprestimo_tipoEmprestimo_descricao_8 = $emprestimo_tipoEmprestimo_descricao_8;
            $benefs->emprestimo_banco_codigo_8 = $emprestimo_banco_codigo_8;
            $benefs->emprestimo_banco_nome_8 = $emprestimo_banco_nome_8;
            $benefs->emprestimo_dataInicioContrato_8 = $emprestimo_dataInicioContrato_8;
            $benefs->emprestimo_competenciaInicioDesconto_8 = $emprestimo_competenciaInicioDesconto_8;
            $benefs->emprestimo_competenciaFimDesconto_8 = $emprestimo_competenciaFimDesconto_8;
            $benefs->emprestimo_dataInclusao_8 = $emprestimo_dataInclusao_8;
            $benefs->emprestimo_situacao_8 = $emprestimo_situacao_8;
            $benefs->emprestimo_excluidoAps_8 = $emprestimo_excluidoAps_8;
            $benefs->emprestimo_excluidoBanco_8 = $emprestimo_excluidoBanco_8;
            $benefs->emprestimo_valorEmprestado_8 = $emprestimo_valorEmprestado_8;
            $benefs->emprestimo_valorParcela_8 = $emprestimo_valorParcela_8;
            $benefs->emprestimo_quantidadeParcelas_8 = $emprestimo_quantidadeParcelas_8;
            $benefs->emprestimo_quantidadeParcelasEmAberto_8 = $emprestimo_quantidadeParcelasEmAberto_8;
            $benefs->emprestimo_saldoQuitacao_8 = $emprestimo_saldoQuitacao_8;
            $benefs->emprestimo_taxa_8 = $emprestimo_taxa_8;
        }

        if(isset($cartao_contrato_0)) {
            $benefs->cartao_contrato_0 = $cartao_contrato_0;
            $benefs->cartao_tipoEmprestimo_codigo_0 = $cartao_tipoEmprestimo_codigo_0;
            $benefs->cartao_tipoEmprestimo_descricao_0 = $cartao_tipoEmprestimo_descricao_0;
            $benefs->cartao_banco_codigo_0 = $cartao_banco_codigo_0;
            $benefs->cartao_banco_nome_0 = $cartao_banco_nome_0;
            $benefs->cartao_dataInicioContrato_0 = $cartao_dataInicioContrato_0;
            $benefs->cartao_dataInclusao_0 = $cartao_dataInclusao_0;
            $benefs->cartao_situacao_0 = $cartao_situacao_0;
            $benefs->cartao_excluidoAps_0 = $cartao_excluidoAps_0;
            $benefs->cartao_excluidoBanco_0 = $cartao_excluidoBanco_0;
            $benefs->cartao_limiteCartao_0 = $cartao_limiteCartao_0;
            $benefs->cartao_valorReservado_0 = $cartao_valorReservado_0;
        }

        $benefs->resultInfo_timestamp = $resultInfo_timestamp;
        $benefs->resultInfo_requesdIdp = $resultInfo_requesdIdp;
        $benefs->resultInfo_queryTime = $resultInfo_queryTime;

        $benefs->billingInfo_value = $billingInfo_value;
        $benefs->billingInfo_charged = $billingInfo_charged;
        $benefs->billingInfo_balance = $billingInfo_balance;
        $benefs->billingInfo_balanceValidUntil = $billingInfo_balanceValidUntil;
        $benefs->billingInfo_subscriptionId = $billingInfo_subscriptionId;

        $benefs->save();

        //dd($benefs);
        return view('verbeneficios', compact('benefs'));
    }

	public function edit(Product $product){
		return view(‘product_edit’);
	}

	public function update(Product $product, Request $request){
	//
	}

	public function destroy(Product $product){
	//
	}
}
