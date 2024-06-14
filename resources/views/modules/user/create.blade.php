@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-start">
            <h2>Cadastrar Usuário</h2>
            <h5 class="mb-0 text-danger">Campos com * são obrigatórios</h5>
        </div>
    </div>

    <hr>

    <form action="store" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-6">
                <label for="name" class="form-label">Nome <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="col-sm-3">
                <label for="cpf" class="form-label">CPF <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="cpf" name="cpf" minlength=14 required>
            </div>
            
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-7">
                        <label for="advice" class="form-label">Conselho</label>
                        <input type="text" class="form-control" id="advice" name="advice" maxlength=10>
                    </div>
    
                    <div class="col-sm-5">
                        <label for="uf" class="form-label">UF</label>
                        <select class="form-select" id="uf" name="uf">
                            <option value="">---</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AM">AM</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="PR">PR</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="RS">RS</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
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
                        <option value="{{ $profile->id }}">{{ $profile->title }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-sm-3">
                <label for="phone" class="form-label">Telefone <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            
            <div class="col-sm-5">
                <label for="email" class="form-label">Email <span class="text-danger fw-bold">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
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
        
                <a href="user" class="btn btn-danger">
                    <i class="fa-solid fa-angles-left"></i> Voltar
                </a>
            </div>
        </div>
    </form>
@endsection