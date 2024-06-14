@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-9 text-start">
            <h2>Perfís</h2>
        </div>
    
        <div class="col-sm-3 text-end">
            <a href="/profile/create" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Cadastrar
            </a>
        </div>
    </div>
    
    <hr>
    
    <table class="table table-responsive table-striped table-secondary">
        <thead>
            <th width=5%>#</th>
            <th width=82%>Perfil</th>
            <th width=13%>Ações</th>
        </thead>
    
        <tbody>
            @foreach($data as $data)
                <tr class="align-middle">
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->title }}</td>
                    <td>
                        <div class="row">
                            <form class="px-0" action="profile/delete/{{ $data->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <a href="profile/{{ $data->id }}" class="btn btn-info" title="Editar Perfil">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
        
                                <a href="permission/{{ $data->id }}" class="btn btn-warning" title="Permissões do Perfil">
                                    <i class="fa-solid fa-gear"></i>
                                </a>
                                
                                <button type="submit" class="btn btn-danger" id="delete" name="delete" value="{{ $data->id }}" title="Deletar Perfil">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection