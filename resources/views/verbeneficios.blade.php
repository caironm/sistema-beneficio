@extends('layouts.app', ["current" => "beneficios"])

@push('scripts')
    <script>
        //Input mask
        $(document).ready(function($){
            $('.date').mask('00/00/0000');
            $('.time').mask('00:00:00');
            $('.date_time').mask('00/00/0000 00:00:00');
            $('#cep').mask('00000-000');
            $('.phone').mask('(00) #0000-0000');
            $('.tel').mask('(00) 00000-0000');
            $('.phone_us').mask('(000) 000-0000');
            $('.mixed').mask('AAA 000-S0S');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            $('.money').mask('000.000.000.000.000,00', {reverse: true});
            $('.money2').mask("#.##0,00", {reverse: true});
            $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                translation: {
                    'Z': {
                        pattern: /[0-9]/, optional: true
                    }
                }
            });
            $('.ip_address').mask('099.099.099.099');
            $('.percent').mask('##0,00%', {reverse: true});
            $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
            $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
            $('.fallback').mask("00r00r0000", {
                translation: {
                    'r': {
                        pattern: /[\/]/,
                        fallback: '/'
                    },
                    placeholder: "__/__/____"
                }
            });
            $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
        });
        //jQuery to find CEP
        jQuery(function($){
            $("#cep").change(function(){
                var cep_code = $(this).val();
                if( cep_code.length <= 0 ) return;
                $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
                    function(result){
                        if( result.status!=1 ){
                            alert(result.message || "Houve um erro desconhecido");
                            return;
                        }
                        $("input#cep").val( result.code );
                        $("input#estado").val( result.state );
                        $("input#cidade").val( result.city );
                        $("input#bairro").val( result.district );
                            $("input#endereco").val( result.address );
                        $("input#uf").val( result.state );
                    });
            });
        });
    </script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @csrf
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('INFORMAÇÕES PESSOAIS') }}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->nome}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Nascimento:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->dataNascimento}}</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Benefício:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->beneficio}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Espécie - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->especie_codigo}}</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>CPF:</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->cpf}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Espécie - Descrição:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->especie_descricao}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('DADOS BANCÁRIOS') }}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Banco - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->banco_codigo}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Agência - Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->agencia_nome}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Agência - Bairro:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->agencia_bairro}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Agência - UF:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->agencia_uf}}</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Banco - Nome:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->banco_nome}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Agência - Orgão Pagador:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->agencia_orgaoPagador}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Agência - Cidade:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->agencia_cidade}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Meio de Pagamento:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->meioPagamento}}</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Agência - Códigp:</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->agencia_codigo}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Agência - Endereço:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->agencia_endereco}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Agência - CEP:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->agencia_cep}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('DEMAIS INFORMAÇÕES') }}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Situação Benefício:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->situacaoBeneficio}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Benefício:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->valorBeneficio}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Bloqueio Empréstimo:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->bloqueioEmprestismo}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Margem Consignado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->baseCalculoMargemConsignavel}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Percentual Margem Total Empréstimo:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->percentualMargemTotalEmprestimo}}%</label>
                                        <br>
                                        <label for="beneficiario"><strong>Margem Disponível Cartão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->margemDisponivelCartao}}%</label>
                                        <br>
                                        <label for="beneficiario"><strong>Percentual Margem Disponível Cartão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->percentualmargemDisponivelCartao}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>NIT:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->nit}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Sexo:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->sexo}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Possui representante legal?:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">
                                        <?php
                                            $representante_legal = $benefs->possuiRepresentanteLegalProcurador;
                                            if ($representante_legal == 1) {
                                                $representante_legal = 'Sim';
                                            } else {
                                                $representante_legal = 'Não';
                                            }
                                        ?>
                                        {{$representante_legal}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Benefício permite empréstimo?:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">
                                        <?php
                                            $permite_emprestimo = $benefs->beneficioPermiteEmprestimo;
                                            if ($permite_emprestimo == 1) {
                                                $permite_emprestimo = 'Sim';
                                            } else {
                                                $permite_emprestimo = 'Não';
                                            }
                                        ?>
                                        {{$permite_emprestimo}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Margem Disponível Empréstimo:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->margemDisponivelEmprestimo}}%</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Empréstimo:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->quantidadeEmprestimo}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Percentual Margem Total Cartão?:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->percentualMargemTotalCartao}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Identidade:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->identidade}}</label>
                                        <br>
                                        <label for="nomeclientes"><strong>DIB</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->dib}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Pensão Alimentícia:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">
                                        <?php
                                            $pensao_alimenticia = $benefs->pensaoAlimenticia;
                                            if ($pensao_alimenticia == 1) {
                                                $pensao_alimenticia = 'Sim';
                                            } else {
                                                $pensao_alimenticia = 'Não';
                                            }
                                        ?>
                                        {{$pensao_alimenticia}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Margem Competência:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->margem_competencia}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Percentual Margem Disponível Empréstimo:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->percentualMargemDisponivelEmprestimo}}%</label>
                                        <br>
                                        <label for="beneficiario"><strong>Possui cartão?:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes"><?php
                                            $possui_cartao = $benefs->possuiCartao;
                                            if ($possui_cartao == 1) {
                                                $possui_cartao = 'Sim';
                                            } else {
                                                $possui_cartao = 'Não';
                                            }
                                        ?>
                                        {{$possui_cartao}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @if(isset($emprestimo_contrato_0))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_0}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_0}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_0}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_0}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_0}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_0}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_0}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_1))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_1}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_1}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_1}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_1}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_1}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_1}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_1}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_1}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_2))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_2}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_2}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_2}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_2}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_2}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_2}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_2}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_2}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_3))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_3}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_3}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_3}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_3}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_3}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_3}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_3}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_3}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_4))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_4}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_4}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_4}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_4}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_4}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_4}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_4}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_4}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_5))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_5}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_5}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_5}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_5}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_5}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_5}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_5}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_5}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_6))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_6}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_6}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_6}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_6}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_6}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_6}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_6}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_6}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_7))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_7}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_7}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_7}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_7}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_7}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_7}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_7}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_7}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($emprestimo_contrato_8))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO EMPRÉSTIMO - ') }}{{$benefs->emprestimo_contrato_8}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_tipoEmprestimo_codigo_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_banco_nome_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoAps_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Parcela:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorParcela_8}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Saldo Quitação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_saldoQuitacao_8}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->emprestimo_tipoEmprestimo_descricao_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInicioContrato_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_dataInclusao_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_excluidoBanco_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade de Parcelas:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelas_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Empréstimo Taxa:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_taxa_8}}%</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->emprestimo_banco_codigo_8}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_situacao_8}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Emprestado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->emprestimo_valorEmprestado_8}},00</label>
                                        <br>
                                        <label for="beneficiario"><strong>Quantidade Parcelas em Aberto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_quantidadeParcelasEmAberto_8}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        @if(isset($cartao_contrato_0))

        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ ('CONTRATO CARTÃO - ') }}{{$benefs->cartao_contrato_0}}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Código:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_tipoEmprestimo_codigo_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Banco Nome:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_banco_nome_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Fim Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaFimDesconto_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Aps:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_excluidoAps_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Valor Reservado:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">R$ {{$benefs->cartao_valorReservado_0}},00</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Tipo Empréstimo - Descrição:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$benefs->cartao_tipoEmprestimo_descricao_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Início do Contrato:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_dataInicioContrato_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Data de Inclusão:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_dataInclusao_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Excluído Banco:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_excluidoBanco_0}}</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Banco Código</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$benefs->cartao_banco_codigo_0}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Início Desconto:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->emprestimo_competenciaInicioDesconto_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Situação:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_situacao_0}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Limite:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$benefs->cartao_limiteCartao_0}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        @endif

        <a href="/home" class="btn btn-sm btn-primary" role="button">Voltar</a>
    </div>
</div>

@stack('scripts')

@endsection