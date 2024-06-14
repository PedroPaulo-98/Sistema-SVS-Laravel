@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-start">
            <h2>Cadastrar Unidade</h2>
        </div>
    </div>

    <hr>

    <form action="store" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-6">
                <label for="name" class="form-label">Unidade</label>
                <input type="text" class="form-control text-uppercase" id="name" name="name" required>
            </div>
            
            <div class="col-sm-3">
                <label for="initials" class="form-label">Sigla</label>
                <input type="text" class="form-control text-uppercase" id="initials" name="initials" required>
            </div>
            
        </div>
        
        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            
            <div class="col-sm-6">
                <label for="street" class="form-label">Logradouro</label>
                <input type="text" class="form-control text-uppercase" id="street" name="street" required>
            </div>
            
            <div class="col-sm-3">
                <label for="number" class="form-label">Número</label>
                <input type="text" class="form-control text-uppercase" id="number" name="number" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-sm-5">
                <label for="district" class="form-label">Bairro</label>
                <input type="text" class="form-control text-uppercase" id="district" name="district" required>
            </div>
            
            <div class="col-sm-5">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" class="form-control text-uppercase" id="city" name="city" required>
            </div>
            
        </div>

        <div class="row">
            <div class="col-sm-12">
            <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Cadastrar
                </button>
        
                <button type="reset" class="btn btn-warning">
                    <i class="fa-solid fa-eraser"></i> Limpar
                </button>
        
                <a href="unit" class="btn btn-danger">
                    <i class="fa-solid fa-angles-left"></i> Voltar
                </a>
            </div>
        </div>
    </form>
@endsection