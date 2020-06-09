@extends('layouts.app', ["current" => "dadosbancarios"])

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
                <div class="card-header"><strong>{{ ('INFORMAÇÕES') }}</strong></div>    
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>CPF:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$bancarios[0]['cpf'] ?? ''}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Benefício:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$bancarios[0]['beneficio'] ?? ''}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Meio Pagamento:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$bancarios[0]['meioPagamento'] ?? ''}}</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiario"><strong>Banco:</strong></label>
                                        <label type="text" name="beneficioClientes" id="beneficioClientes">{{$bancarios[0]['banco'] ?? ''}}</label>
                                        <br>
                                        <label for="beneficiario"><strong>Agência:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$bancarios[0]['agencia'] ?? ''}}</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nomeclientes"><strong>Nome da Agência:</strong></label>
                                        <label type="text" name="cpfClientes" id="cpfClientes">{{$bancarios[0]['agencia_nome'] ?? ''}}</label>
                                        <br />
                                        <label for="beneficiario"><strong>Conta Corrente:</strong></label>
                                        <label type="text" name="nomeClientes" id="nomeClientes">{{$bancarios[0]['conta_corrente'] ?? ''}}</label>
                                        <br>
                                    </div>
                                </div>                                   
                            </div>                   
                        </div>
                    </div>
                </div>
            <br>                
        </div>

        <a href="/home" class="btn btn-sm btn-primary" role="button">Voltar</a>
    </div>
</div>

@stack('scripts')

@endsection