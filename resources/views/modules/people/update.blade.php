@extends('layouts.module')

@section('content')

<main>
    <div class="container bg-system">
        <div class="col-sm-12 container">
        @include('layouts.notification')
            <div class="row">
                <div class="col-sm-9 text-start">
                    <h2>> Paciente</h2>
                </div>

            </div>
            <hr>
            <form action="../update/{{ $data->id }}" method="post">
            @csrf
            @method('PUT')
                <div class="people" style="display: block">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control text-uppercase" id="name" name="name" value="{{ $data->name }}" required>
                        </div>
                        
                        <div class="col-sm-3">
                            <label for="birth_date" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $data->birth_date }}" required>
                        </div>
            
                        <div class="col-sm-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $data->cpf }}" required>
                        </div>
                    </div>
                    <br>
                    
            
            
                    <div class="row">
                        <div class="col-sm-4 d-flex align-items-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="use_sn" name="use_sn" onchange="Social_Name()" {{ $data->social_name ? 'checked' : '' }}>
                                <label class="form-check-label" for="use_sn">Tratamento pelo nome social?</label>
                            </div>
                        </div>
                
                        <div class="col-sm-8">
                            <label for="social_name" class="form-label">Nome Social</label>
                            <input type="text" class="form-control text-uppercase" id="social_name" name="social_name" value="{{ $data->social_name }}" required disabled>
                            <p class="mb-0" style="font-size: 9pt">Nome social: designação pela qual a pessoa travesti ou transexual se identifica e é socialmente reconhecida;<br>
                            Conforme o Decreto Federal Nº 8.727, de 28 de Abril de 2016.</p>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="mother" class="form-label">Nome da Mãe</label>
                            <input type="text" class="form-control text-uppercase" id="mother" name="mother" value="{{ $data->mother }}" required>
                        </div>
                
                        <div class="col-sm-6">
                            <label for="father" class="form-label">Nome do Pai</label>
                            <input type="text" class="form-control text-uppercase" id="father" name="father" value="{{ $data->father }}">
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="rg" class="form-label">RG</label>
                            <input type="text" class="form-control text-uppercase" id="rg" name="rg" value="{{ $data->rg }}" >
                        </div>
                        
                        <div class="col-sm-2">
                            <label for="uf_rg" class="form-label">UF do RG</label>
                            <select class="form-select" id="uf_rg" name="uf_rg">
                                <option></option>
                                <option value="AC" {{ $data->uf_rg == 'AC' ? 'selected' : '' }}>AC</option>
                                <option value="AL" {{ $data->uf_rg == 'AL' ? 'selected' : '' }}>AL</option>
                                <option value="AM" {{ $data->uf_rg == 'AM' ? 'selected' : '' }}>AM</option>
                                <option value="AP" {{ $data->uf_rg == 'AP' ? 'selected' : '' }}>AP</option>
                                <option value="BA" {{ $data->uf_rg == 'BA' ? 'selected' : '' }}>BA</option>
                                <option value="CE" {{ $data->uf_rg == 'CE' ? 'selected' : '' }}>CE</option>
                                <option value="DF" {{ $data->uf_rg == 'DF' ? 'selected' : '' }}>DF</option>
                                <option value="ES" {{ $data->uf_rg == 'ES' ? 'selected' : '' }}>ES</option>
                                <option value="GO" {{ $data->uf_rg == 'GO' ? 'selected' : '' }}>GO</option>
                                <option value="MA" {{ $data->uf_rg == 'MA' ? 'selected' : '' }}>MA</option>
                                <option value="MG" {{ $data->uf_rg == 'MG' ? 'selected' : '' }}>MG</option>
                                <option value="MS" {{ $data->uf_rg == 'MS' ? 'selected' : '' }}>MS</option>
                                <option value="MT" {{ $data->uf_rg == 'MT' ? 'selected' : '' }}>MT</option>
                                <option value="PA" {{ $data->uf_rg == 'PA' ? 'selected' : '' }}>PA</option>
                                <option value="PB" {{ $data->uf_rg == 'PB' ? 'selected' : '' }}>PB</option>
                                <option value="PE" {{ $data->uf_rg == 'PE' ? 'selected' : '' }}>PE</option>
                                <option value="PI" {{ $data->uf_rg == 'PI' ? 'selected' : '' }}>PI</option>
                                <option value="PR" {{ $data->uf_rg == 'PR' ? 'selected' : '' }}>PR</option>
                                <option value="RJ" {{ $data->uf_rg == 'RJ' ? 'selected' : '' }}>RJ</option>
                                <option value="RN" {{ $data->uf_rg == 'RN' ? 'selected' : '' }}>RN</option>
                                <option value="RO" {{ $data->uf_rg == 'RO' ? 'selected' : '' }}>RO</option>
                                <option value="RR" {{ $data->uf_rg == 'RR' ? 'selected' : '' }}>RR</option>
                                <option value="RS" {{ $data->uf_rg == 'RS' ? 'selected' : '' }}>RS</option>
                                <option value="SC" {{ $data->uf_rg == 'SC' ? 'selected' : '' }}>SC</option>
                                <option value="SE" {{ $data->uf_rg == 'SE' ? 'selected' : '' }}>SE</option>
                                <option value="SP" {{ $data->uf_rg == 'SP' ? 'selected' : '' }}>SP</option>
                                <option value="TO" {{ $data->uf_rg == 'TO' ? 'selected' : '' }}>TO</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-3">
                            <label for="expediter" class="form-label">Orgão Expedidor</label>
                            <input type="text" class="form-control text-uppercase" id="expediter" name="expediter" value="{{ $data->expediter }}">
                        </div>
                        
                        <div class="col-sm-4">
                            <label for="cns" class="form-label">CNS</label>
                            <input type="text" class="form-control" id="cns" name="cns" value="{{ $data->cns }}" required>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="breed" class="form-label">Raça/Cor</label>
                            <select class="form-select" id="breed" name="breed">
                                <option></option>
                                <option value="BRANCA" {{ $data->breed == 'BRANCA' ? 'selected' : '' }}>BRANCA</option>
                                <option value="PRETA" {{ $data->breed == 'PRETA' ? 'selected' : '' }}>PRETA</option>
                                <option value="PARDA" {{ $data->breed == 'PARDA' ? 'selected' : '' }}>PARDA</option>
                                <option value="AMARELA" {{ $data->breed == 'AMARELA' ? 'selected' : '' }}>AMARELA</option>
                                <option value="INDIGENA" {{ $data->breed == 'INDIGENA' ? 'selected' : '' }}>INDIGENA</option>
                            </select>
                        </div>
            
                        <div class="col-sm-3">
                            <label for="sex" class="form-label">Sexo</label>
                            <select class="form-select" id="sex" name="sex" required>
                                <option></option>
                                <option value="MASCULINO" {{ $data->sex == 'MASCULINO' ? 'selected' : '' }}>MASCULINO</option>
                                <option value="FEMININO" {{ $data->sex == 'FEMININO' ? 'selected' : '' }}>FEMININO</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-3">
                            <label for="marital_status" class="form-label">Estado Civil</label>
                            <select class="form-select" id="marital_status" name="marital_status">
                                <option></option>
                                <option value="SOLTEIRO" {{ $data->marital_status == 'SOLTEIRO' ? 'selected' : '' }}>SOLTEIRO</option>
                                <option value="CASADO" {{ $data->marital_status == 'CASADO' ? 'selected' : '' }}>CASADO</option>
                                <option value="SEPARADO" {{ $data->marital_status == 'SEPARADO' ? 'selected' : '' }}>SEPARADO</option>
                                <option value="DIVORCIADO" {{ $data->marital_status == 'DIVORCIADO' ? 'selected' : '' }}>DIVORCIADO</option>
                                <option value="VIUVO" {{ $data->marital_status == 'VIUVO' ? 'selected' : '' }}>VIUVO</option>
                            </select>
                        </div>
            
            
                        <div class="col-sm-3">
                            <label for="nationallity" class="form-label">Nacionalidade</label>
                            <input type="text" class="form-control text-uppercase" id="nationallity" name="nationallity" value="{{ $data->nationallity }}" >
                        </div>
                        
            
                        
                        
                    </div>
                    <br>
                        <div class="row">
            
                        <div class="col-sm-3">
                            <label for="naturalness" class="form-label">Naturalidade</label>
                            <input type="text" class="form-control text-uppercase" id="naturalness" name="naturalness" value="{{ $data->naturalness }}" >
                        </div>
            
            
                    
                        
                        <div class="col-sm-2">
                            <label for="uf_naturalness" class="form-label">UF</label>
                            <select class="form-select" id="uf_naturalness" name="uf_naturalness">
                                <option></option>
                                <option value="AC" {{ $data->uf_naturalness == 'AC' ? 'selected' : '' }} >AC</option>
                                <option value="AL" {{ $data->uf_naturalness == 'AL' ? 'selected' : '' }} >AL</option>
                                <option value="AM" {{ $data->uf_naturalness == 'AM' ? 'selected' : '' }} >AM</option>
                                <option value="AP" {{ $data->uf_naturalness == 'AP' ? 'selected' : '' }} >AP</option>
                                <option value="BA" {{ $data->uf_naturalness == 'BA' ? 'selected' : '' }} >BA</option>
                                <option value="CE" {{ $data->uf_naturalness == 'CE' ? 'selected' : '' }} >CE</option>
                                <option value="DF" {{ $data->uf_naturalness == 'DF' ? 'selected' : '' }} >DF</option>
                                <option value="ES" {{ $data->uf_naturalness == 'ES' ? 'selected' : '' }} >ES</option>
                                <option value="GO" {{ $data->uf_naturalness == 'GO' ? 'selected' : '' }} >GO</option>
                                <option value="MA" {{ $data->uf_naturalness == 'MA' ? 'selected' : '' }} >MA</option>
                                <option value="MG" {{ $data->uf_naturalness == 'MG' ? 'selected' : '' }} >MG</option>
                                <option value="MS" {{ $data->uf_naturalness == 'MS' ? 'selected' : '' }} >MS</option>
                                <option value="MT" {{ $data->uf_naturalness == 'MT' ? 'selected' : '' }} >MT</option>
                                <option value="PA" {{ $data->uf_naturalness == 'PA' ? 'selected' : '' }} >PA</option>
                                <option value="PB" {{ $data->uf_naturalness == 'PB' ? 'selected' : '' }} >PB</option>
                                <option value="PE" {{ $data->uf_naturalness == 'PE' ? 'selected' : '' }} >PE</option>
                                <option value="PI" {{ $data->uf_naturalness == 'PI' ? 'selected' : '' }} >PI</option>
                                <option value="PR" {{ $data->uf_naturalness == 'PR' ? 'selected' : '' }} >PR</option>
                                <option value="RJ" {{ $data->uf_naturalness == 'RJ' ? 'selected' : '' }} >RJ</option>
                                <option value="RN" {{ $data->uf_naturalness == 'RN' ? 'selected' : '' }} >RN</option>
                                <option value="RO" {{ $data->uf_naturalness == 'RO' ? 'selected' : '' }} >RO</option>
                                <option value="RR" {{ $data->uf_naturalness == 'RR' ? 'selected' : '' }} >RR</option>
                                <option value="RS" {{ $data->uf_naturalness == 'RS' ? 'selected' : '' }} >RS</option>
                                <option value="SC" {{ $data->uf_naturalness == 'SC' ? 'selected' : '' }} >SC</option>
                                <option value="SE" {{ $data->uf_naturalness == 'SE' ? 'selected' : '' }} >SE</option>
                                <option value="SP" {{ $data->uf_naturalness == 'SP' ? 'selected' : '' }} >SP</option>
                                <option value="TO" {{ $data->uf_naturalness == 'TO' ? 'selected' : '' }} >TO</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" class="form-control text-uppercase" id="phone" name="phone" value="{{ $data->phone }}" required>
                        </div>
            
            
                        <div class="col-sm-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control text-uppercase" id="cep" name="cep" value="{{ $data->cep }}">
                        </div>
                    </div>
                    <br>
            
                    <div class="row">
                        <div class="col-sm-7">
                            <label for="street" class="form-label">Endereço</label>
                            <input type="text" class="form-control text-uppercase" id="street" name="street" value="{{ $data->street }}" >
                        </div>
                        <div class="col-sm-5">
                            <label for="district" class="form-label">Bairro</label>
                            <input type="text" class="form-control text-uppercase" id="district" name="district" value="{{ $data->district }}" >
                        </div>
                    </div>
                    <br>
            
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="complement" class="form-label">Complemento</label>
                            <input type="text" class="form-control text-uppercase" id="complement" name="complement" value="{{ $data->complement }}">
                        </div>
                        <div class="col-sm-5">
                            <label for="city" class="form-label">Municipio</label>
                            <input type="text" class="form-control text-uppercase" id="city" name="city" value="{{ $data->city }}" >
                        </div>
                        
                        <div class="col-sm-2">
                            <label for="state" class="form-label">Estado</label>
                            <select class="form-select" id="state" name="state">
                                <option value=""></option>
                                <option value="AC" {{ $data->state == 'AC' ? 'selected' : '' }} >AC</option>
                                <option value="AL" {{ $data->state == 'AL' ? 'selected' : '' }} >AL</option>
                                <option value="AM" {{ $data->state == 'AM' ? 'selected' : '' }} >AM</option>
                                <option value="AP" {{ $data->state == 'AP' ? 'selected' : '' }} >AP</option>
                                <option value="BA" {{ $data->state == 'BA' ? 'selected' : '' }} >BA</option>
                                <option value="CE" {{ $data->state == 'CE' ? 'selected' : '' }} >CE</option>
                                <option value="DF" {{ $data->state == 'DF' ? 'selected' : '' }} >DF</option>
                                <option value="ES" {{ $data->state == 'ES' ? 'selected' : '' }} >ES</option>
                                <option value="GO" {{ $data->state == 'GO' ? 'selected' : '' }} >GO</option>
                                <option value="MA" {{ $data->state == 'MA' ? 'selected' : '' }} >MA</option>
                                <option value="MG" {{ $data->state == 'MG' ? 'selected' : '' }} >MG</option>
                                <option value="MS" {{ $data->state == 'MS' ? 'selected' : '' }} >MS</option>
                                <option value="MT" {{ $data->state == 'MT' ? 'selected' : '' }} >MT</option>
                                <option value="PA" {{ $data->state == 'PA' ? 'selected' : '' }} >PA</option>
                                <option value="PB" {{ $data->state == 'PB' ? 'selected' : '' }} >PB</option>
                                <option value="PE" {{ $data->state == 'PE' ? 'selected' : '' }} >PE</option>
                                <option value="PI" {{ $data->state == 'PI' ? 'selected' : '' }} >PI</option>
                                <option value="PR" {{ $data->state == 'PR' ? 'selected' : '' }} >PR</option>
                                <option value="RJ" {{ $data->state == 'RJ' ? 'selected' : '' }} >RJ</option>
                                <option value="RN" {{ $data->state == 'RN' ? 'selected' : '' }} >RN</option>
                                <option value="RO" {{ $data->state == 'RO' ? 'selected' : '' }} >RO</option>
                                <option value="RR" {{ $data->state == 'RR' ? 'selected' : '' }} >RR</option>
                                <option value="RS" {{ $data->state == 'RS' ? 'selected' : '' }} >RS</option>
                                <option value="SC" {{ $data->state == 'SC' ? 'selected' : '' }} >SC</option>
                                <option value="SE" {{ $data->state == 'SE' ? 'selected' : '' }} >SE</option>
                                <option value="SP" {{ $data->state == 'SP' ? 'selected' : '' }} >SP</option>
                                <option value="TO" {{ $data->state == 'TO' ? 'selected' : '' }} >TO</option>
                            </select>
                        </div>
                    </div>
                    <br>
                </div>
            
            
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-redo"></i> Atualizar
                        </button>
                
                        <button type="reset" class="btn btn-warning">
                            <i class="fa-solid fa-eraser"></i> Limpar
                        </button>
                
                        <a href="people" class="btn btn-danger">
                            <i class="fa-solid fa-angles-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection