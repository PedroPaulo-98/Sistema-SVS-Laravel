@extends('layouts.module')

@section('content')                
    <div class="row">
        <div class="col-sm-12 text-start">
            <h2>Permissões de {{ $profile->title }}</h2>
        </div>
    </div>
    
    <hr>
    
    <form action="../update/{{ $profile->id }}/{{ $edit->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-sm-12">
                <label for="module" class="form-label">Módulo</label>
                <select class="form-select" id="module" name="module" required>
                    <option value="">---</option>
                    @foreach($module as $module)
                        <option value="{{ $module->id }}" {{ $module->id == $edit->module ? 'selected' : '' }}>{{ $module->title }}</option>
                    @endforeach
                </select>
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
        
                <a href="0" class="btn btn-danger">
                    <i class="fa-solid fa-angles-left"></i> Cancelar
                </a>
            </div>
        </div>
    </form>
    
    <hr>

    @include('modules.permission.list')
@endsection