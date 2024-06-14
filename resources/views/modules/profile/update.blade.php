@extends('layouts.module')

@section('content')
    <main>
        <div class="container bg-system">
            <div class="col-sm-12 container">
                @include('layouts.notification')
                
                <div class="row">
                    <div class="col-sm-12 text-start">
                        <h2>Atualizar Perfil</h2>
                    </div>
                </div>
                
                <hr>
                
                <form action="update/{{ $data->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" required>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-redo"></i> Atualizar
                            </button>
                    
                            <button type="reset" class="btn btn-warning">
                                <i class="fa-solid fa-eraser"></i> Limpar
                            </button>
                    
                            <a href="profile" class="btn btn-danger">
                                <i class="fa-solid fa-angles-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection