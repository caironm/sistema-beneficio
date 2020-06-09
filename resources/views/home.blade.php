@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado!
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Dados Bancários</div>

                <div class="card-body">
                    <form action="/dadosbancario/ver/{beneficio}" method="GET">
                    @csrf
                        <div class="form-group">
                            <label for="beneficio">Busca por Benefício</label>
                            <input type="text" class="form-control cpf" name="numeroBeneficios" id="numeroBeneficio" placeholder="Digite apenas números...">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Extrato INSS</div>

                <div class="card-body">
                    <form action="/beneficio/ver/{beneficio}" method="GET">
                    @csrf
                        <div class="form-group">
                            <label for="beneficio">Busca por Benefício</label>
                            <input type="text" class="form-control cpf" name="numeroBeneficio" id="numeroBeneficio" placeholder="Digite apenas números...">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Telefones</div>

                <div class="card-body">
                    <form action="/telefone/ver/{cpf}" method="GET">
                    @csrf
                        <div class="form-group">
                            <label for="beneficio">Busca por CPF</label>
                            <input type="text" class="form-control cpf" name="numeroCpf" id="numeroCpf" placeholder="Digite apenas números..." disabled>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm" disabled>Consultar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
