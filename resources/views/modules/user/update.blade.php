@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-start">
            <h2>Atualizar Usuário</h2>
            <h5 class="mb-0 text-danger">Campos com * são obrigatórios</h5>
        </div>
    </div>

    <hr>

    <form action="update/{{ $data->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-sm-6">
                <label for="name" class="form-label">Nome <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
            </div>
            
            <div class="col-sm-3">
                <label for="cpf" class="form-label">CPF <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $data->cpf }}" required>
            </div>

            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-7">
                        <label for="advice" class="form-label">Conselho</label>
                        <input type="text" class="form-control" id="advice" name="advice" value="{{ $data->advice }}" maxlength=10>
                    </div>
    
                    <div class="col-sm-5">
                        <label for="uf" class="form-label">UF</label>
                        <select class="form-select" id="uf" name="uf">
                            <option value="">---</option>
                            <option value="AC" {{ $data->uf == 'AC' ? 'selected' : '' }}>AC</option>
                            <option value="AL" {{ $data->uf == 'AL' ? 'selected' : '' }}>AL</option>
                            <option value="AM" {{ $data->uf == 'AM' ? 'selected' : '' }}>AM</option>
                            <option value="AP" {{ $data->uf == 'AP' ? 'selected' : '' }}>AP</option>
                            <option value="BA" {{ $data->uf == 'BA' ? 'selected' : '' }}>BA</option>
                            <option value="CE" {{ $data->uf == 'CE' ? 'selected' : '' }}>CE</option>
                            <option value="DF" {{ $data->uf == 'DF' ? 'selected' : '' }}>DF</option>
                            <option value="ES" {{ $data->uf == 'ES' ? 'selected' : '' }}>ES</option>
                            <option value="GO" {{ $data->uf == 'GO' ? 'selected' : '' }}>GO</option>
                            <option value="MA" {{ $data->uf == 'MA' ? 'selected' : '' }}>MA</option>
                            <option value="MG" {{ $data->uf == 'MG' ? 'selected' : '' }}>MG</option>
                            <option value="MS" {{ $data->uf == 'MS' ? 'selected' : '' }}>MS</option>
                            <option value="MT" {{ $data->uf == 'MT' ? 'selected' : '' }}>MT</option>
                            <option value="PA" {{ $data->uf == 'PA' ? 'selected' : '' }}>PA</option>
                            <option value="PB" {{ $data->uf == 'PB' ? 'selected' : '' }}>PB</option>
                            <option value="PE" {{ $data->uf == 'PE' ? 'selected' : '' }}>PE</option>
                            <option value="PI" {{ $data->uf == 'PI' ? 'selected' : '' }}>PI</option>
                            <option value="PR" {{ $data->uf == 'PR' ? 'selected' : '' }}>PR</option>
                            <option value="RJ" {{ $data->uf == 'RJ' ? 'selected' : '' }}>RJ</option>
                            <option value="RN" {{ $data->uf == 'RN' ? 'selected' : '' }}>RN</option>
                            <option value="RO" {{ $data->uf == 'RO' ? 'selected' : '' }}>RO</option>
                            <option value="RR" {{ $data->uf == 'RR' ? 'selected' : '' }}>RR</option>
                            <option value="RS" {{ $data->uf == 'RS' ? 'selected' : '' }}>RS</option>
                            <option value="SC" {{ $data->uf == 'SC' ? 'selected' : '' }}>SC</option>
                            <option value="SE" {{ $data->uf == 'SE' ? 'selected' : '' }}>SE</option>
                            <option value="SP" {{ $data->uf == 'SP' ? 'selected' : '' }}>SP</option>
                            <option value="TO" {{ $data->uf == 'TO' ? 'selected' : '' }}>TO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="profile" class="form-label">Perfil <span class="text-danger fw-bold">*</span></label>
                <select class="form-select" id="profile" name="profile" required>
                    <option value="">---</option>
                    @foreach($profile as $profile)
                        <option value="{{ $profile->id }}" {{ $data->profile == $profile->id ? 'selected' : '' }}>{{ $profile->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-3">
                <label for="phone" class="form-label">Telefone <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" required>
            </div>
            
            <div class="col-sm-5">
                <label for="email" class="form-label">Email <span class="text-danger fw-bold">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
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
        
                <a href="user" class="btn btn-danger">
                    <i class="fa-solid fa-angles-left"></i> Voltar
                </a>
            </div>
        </div>
    </form>
@endsection