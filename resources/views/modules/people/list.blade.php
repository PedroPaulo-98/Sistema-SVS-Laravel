@extends('layouts.module')


@section('content')
    <div class="row">
        <div class="col-sm-9 text-start">
            <h2>pessoa</h2>
        </div>
        <div class="col-sm-3 text-end">
                <a href="people/create" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Cadastrar
                </a>
        </div>
    </div>
    
    <hr>
    
    <table class="table table-striped table-secondary table-responsive">
        <thead>
            <th width=80%>Pessoa</th>
            <th width=20%>Ações</th>
        </thead>
        <tbody>
        @foreach($data as $data)
            <tr class="align-middle">
                <td width=85%>
                    <table width=100%>
                        <tr>
                            <th >Nº de Cadastro: {{ $data->id }}</th>
                        </tr>
                        <tr>
                            <th >Nome:  {{ $data->name }} Nome Social:</th>                        
                        </tr>
                        <tr>
                            <th >Nome da Mãe: {{ $data->mother }}</th>
                        </tr>
                        <tr>
                            <th >Data de Nascimento: {{ date('d/m/Y', strtotime($data->birth_date)) }}</th>
                        </tr>
                        <tr>
                            <th>CPF: {{ $data->cpf }}</th>
                        </tr>
                    </table>
                </td>
                <td width=15%>
                    <div class="row">
                            <form method="post">
                                <a href="people/{{ $data->id }}" class="btn btn-info" title="Editar Usuário">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection