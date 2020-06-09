@extends('layouts.app', ["current" => "beneficios"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ ('NOVO BENEFÍCIO') }}</strong></div>
    
                    <div class="card border">
                        <div class="card-body">
                            <form action="/beneficio/ver/{beneficio}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <label for="beneficio">Número do Benefício</label>
                                    <input type="text" class="form-control cpf" name="numeroBeneficios" id="numeroBeneficios" placeholder="Digite aqui...">
                                    <br />
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                                <a href="/beneficio" class="btn btn-sm btn-danger" role="button">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection