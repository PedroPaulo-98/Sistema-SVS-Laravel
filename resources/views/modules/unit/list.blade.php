@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-9 text-start">
            <h2>Unidades</h2>
        </div>
        
        <div class="col-sm-3 text-end">
            <a href="unit/create" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Cadastrar
            </a>
        </div>
    </div>
        
    <hr>
        
    <table class="table table-responsive table-striped table-secondary">
        <thead>
            <th width=5%>#</th>
            <th width=70%>Unidade</th>
            <th width=10%>Ativo</th>
            <th width=15%>Ações</th>
        </thead>
        
        <tbody>
            @foreach($data as $data)
                <tr class="align-middle">
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <th class="text-{{ $data->active ? 'success' : 'danger' }}">{{ $data->active ? 'Sim' : 'Não' }}</th>
                    <td>
                        <div class="row">
                            <form class="px-0" action="unit/active/{{ $data->id }}" method="post">
                                @csrf
                                @method('PUT')
                                @if(!$data->active)
                                    <button type="submit" class="btn btn-info" id="enable" name="enable" value="{{ $data->id }}" title="Reativar Usuário">
                                        <i class="fa-solid fa-recycle"></i>
                                    </button>
                                @else
                                    <a href="unit/{{ $data->id }}" class="btn btn-info" title="Editar Unidade">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
            
                                    <a href="designation/{{ $data->id }}" class="btn btn-success" title="Designar Usuário para Unidade">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </a>
            
                                    <button type="submit" class="btn btn-danger" id="disable" name="disable" value="{{ $data->id }}" title="Deletar Unidade">
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