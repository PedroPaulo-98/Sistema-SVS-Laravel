@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-start">
            <h2>Designações</h2>
        </div>
    </div>

    <hr>

    <form action="../update/{{ $unit }}/{{ $edit->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-sm-12">
                <label for="user" class="form-label">Usuário</label>
                <select class="form-select" id="user" name="user" required>
                    <option value="">---</option>
                    @foreach($user as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $edit->user ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Atualizar
                </button>
        
                <button type="reset" class="btn btn-warning">
                    <i class="fa-solid fa-eraser"></i> Limpar
                </button>
        
                <a href="0" class="btn btn-danger">
                    <i class="fa-solid fa-angles-left"></i> Cancelar
                </a>
            </div>
        </div>
    </form>

    <hr>
    
    @include('modules.designation.list')
@endsection