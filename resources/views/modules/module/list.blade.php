@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-9 text-start">
            <h2>Módulos</h2>
        </div>
    
        <div class="col-sm-3 text-end">
            <a href="module/create" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Cadastrar
            </a>
        </div>
    </div>
    
    <hr>
    
    <table class="table table-responsive table-striped table-secondary">
        <thead>
            <th width=5%>#</th>
            <th width=85%>Módulo</th>
            <th width=10%>Ações</th>
        </thead>
    
        <tbody>
            @foreach($data as $data) 
                <tr class="align-middle">
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->title }}</td>
                    <td>
                        <div class="row">
                            <form class="px-0" action="module/delete/{{ $data->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <a href="module/{{ $data->id }}" class="btn btn-info" title="Editar Modulo">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <button type="submit" class="btn btn-danger" id="delete" name="delete" value="{{ $data->id }}" title="Deletar Modulo">
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