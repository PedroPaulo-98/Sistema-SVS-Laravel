@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-9 text-start">
            <h2>Usuários</h2>
        </div>
    
        <div class="col-sm-3 text-end">
            <a href="user/create" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Cadastrar
            </a>
        </div>
    </div>
    
    <hr>
    
    <table class="table table-responsive table-striped table-secondary" id="table">
        <thead>
            <th width=5%>#</th>
            <th width=50%>Nome</th>
            <th width=25%>CPF</th>
            <th width=7%>Ativo</th>
            <th width=13%>Ações</th>
        </thead>
        
        <tbody>
            @foreach($data as $data)
                <tr class="align-middle">
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->cpf }}</td>
                    <th class="text-{{ $data->active ? 'success' : 'danger' }}">{{ $data->active ? 'Sim' : 'Não' }}</th>
                    <td>     
                        <div class="row">
                            <form class="px-0" action="user/function/{{ $data->id }}" method="post">
                                @csrf
                                @method('PUT')
                                @if(!$data->active)
                                    <button type="submit" class="btn btn-info" id="enable" name="enable" value="{{ $data->id }}" title="Reativar Usuário">
                                        <i class="fa-solid fa-recycle"></i>
                                    </button>
                                @else
                                    <a href="user/{{ $data->id }}" class="btn btn-info" title="Editar Usuário">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="submit" class="btn btn-warning" id="password" name="password" value="{{ $data->id }}" title="Alterar Senha de Usuário">
                                        <i class="fa-solid fa-key"></i>
                                    </button>
                                    
                                    <button type="submit" class="btn btn-danger" id="disable" name="disable" value="{{ $data->id }}" title="Desativar Usuário">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                @endif
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection