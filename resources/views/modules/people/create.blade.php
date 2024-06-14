@extends('layouts.module')

@section('content')
    <div class="row">
        <div class="col-sm-9 text-start">
            <h2>Pessoa</h2>
        </div>
        
        <div class="col-sm-3 text-end">
            <a href="" class="btn btn-danger">
                <i class="fa-solid fa-angles-left"></i> Voltar
            </a>
        </div>
    </div>
    <hr>
    <form action="store" method="post">
    @csrf
        <div class="people" style="display: block">
            <div class="row">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control text-uppercase" id="name" name="name" required>
                </div>
                
                <div class="col-sm-3">
                    <label for="birth_date" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                </div>
    
                <div class="col-sm-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" minlength=14 required>
                </div>
            </div>
            <br>
            
    
    
            <div class="row">
                <div class="col-sm-4 d-flex align-items-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="use_sn" name="use_sn" onchange="Social_Name()" >
                        <label class="form-check-label" for="use_sn">Tratamento pelo nome social?</label>
                    </div>
                </div>
        
                <div class="col-sm-8">
                    <label for="social_name" class="form-label">Nome Social</label>
                    <input type="text" class="form-control text-uppercase" id="social_name" name="social_name" required disabled>
                    <p class="mb-0" style="font-size: 9pt">Nome social: designação pela qual a pessoa travesti ou transexual se identifica e é socialmente reconhecida;<br>
                    Conforme o Decreto Federal Nº 8.727, de 28 de Abril de 2016.</p>
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-sm-6">
                    <label for="mother" class="form-label">Nome da Mãe</label>
                    <input type="text" class="form-control text-uppercase" id="mother" name="mother" required>
                </div>
        
                <div class="col-sm-6">
                    <label for="father" class="form-label">Nome do Pai</label>
                    <input type="text" class="form-control text-uppercase" id="father" name="father" >
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-sm-3">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" class="form-control text-uppercase" id="rg" name="rg" >
                </div>
                
                <div class="col-sm-4">
                    <label for="uf_rg" class="form-label">UF do RG</label>
                    <select class="form-select" id="uf_rg" name="uf_rg">
                        <option></option>
                        <option value="AC" >AC</option>
                        <option value="AL" >AL</option>
                        <option value="AM" >AM</option>
                        <option value="AP" >AP</option>
                        <option value="BA" >BA</option>
                        <option value="CE" >CE</option>
                        <option value="DF" >DF</option>
                        <option value="ES" >ES</option>
                        <option value="GO" >GO</option>
                        <option value="MA" >MA</option>
                        <option value="MG" >MG</option>
                        <option value="MS" >MS</option>
                        <option value="MT" >MT</option>
                        <option value="PA" >PA</option>
                        <option value="PB" >PB</option>
                        <option value="PE" >PE</option>
                        <option value="PI" >PI</option>
                        <option value="PR" >PR</option>
                        <option value="RJ" >RJ</option>
                        <option value="RN" >RN</option>
                        <option value="RO" >RO</option>
                        <option value="RR" >RR</option>
                        <option value="RS" >RS</option>
                        <option value="SC" >SC</option>
                        <option value="SE" >SE</option>
                        <option value="SP" >SP</option>
                        <option value="TO" >TO</option>
                    </select>
                </div>
                
                <div class="col-sm-5">
                    <label for="expediter" class="form-label">Orgão Expedidor</label>
                    <input type="text" class="form-control text-uppercase" id="expediter" name="expediter">
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-sm-3">
                    <label for="breed" class="form-label">Raça/Cor</label>
                    <select class="form-select" id="breed" name="breed">
                        <option></option>
                        <option value="BRANCA" >BRANCA</option>
                        <option value="PRETA" >PRETA</option>
                        <option value="PARDA" >PARDA</option>
                        <option value="AMARELA" >AMARELA</option>
                        <option value="INDIGENA" >INDIGENA</option>
                    </select>
                </div>
    
                <div class="col-sm-3">
                    <label for="sex" class="form-label">Sexo</label>
                    <select class="form-select" id="sex" name="sex" required>
                        <option></option>
                        <option value="MASCULINO" >MASCULINO</option>
                        <option value="FEMININO" >FEMININO</option>
                    </select>
                </div>
                
                <div class="col-sm-3">
                    <label for="marital_status" class="form-label">Estado Civil</label>
                    <select class="form-select" id="marital_status" name="marital_status">
                        <option></option>
                        <option value="SOLTEIRO" >SOLTEIRO</option>
                        <option value="CASADO" >CASADO</option>
                        <option value="SEPARADO" >SEPARADO</option>
                        <option value="DIVORCIADO" >DIVORCIADO</option>
                        <option value="VIUVO" >VIUVO</option>
                    </select>
                </div>
    
    
                <div class="col-sm-3">
                    <label for="nationallity" class="form-label">Nacionalidade</label>
                    <input type="text" class="form-control text-uppercase" id="nationallity" name="nationallity">
                </div>

            </div>
            <br>
                <div class="row">
    
                <div class="col-sm-3">
                    <label for="naturalness" class="form-label">Naturalidade</label>
                    <input type="text" class="form-control text-uppercase" id="naturalness" name="naturalness">
                </div>

                <div class="col-sm-2">
                    <label for="uf_naturalness" class="form-label">UF</label>
                    <select class="form-select" id="uf_naturalness" name="uf_naturalness">
                        <option></option>
                        <option value="AC" >AC</option>
                        <option value="AL" >AL</option>
                        <option value="AM" >AM</option>
                        <option value="AP" >AP</option>
                        <option value="BA" >BA</option>
                        <option value="CE" >CE</option>
                        <option value="DF" >DF</option>
                        <option value="ES" >ES</option>
                        <option value="GO" >GO</option>
                        <option value="MA" >MA</option>
                        <option value="MG" >MG</option>
                        <option value="MS" >MS</option>
                        <option value="MT" >MT</option>
                        <option value="PA" >PA</option>
                        <option value="PB" >PB</option>
                        <option value="PE" >PE</option>
                        <option value="PI" >PI</option>
                        <option value="PR" >PR</option>
                        <option value="RJ" >RJ</option>
                        <option value="RN" >RN</option>
                        <option value="RO" >RO</option>
                        <option value="RR" >RR</option>
                        <option value="RS" >RS</option>
                        <option value="SC" >SC</option>
                        <option value="SE" >SE</option>
                        <option value="SP" >SP</option>
                        <option value="TO" >TO</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control text-uppercase" id="phone" name="phone" required>
                </div>
    
    
                <div class="col-sm-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control text-uppercase" id="cep" name="cep" >
                </div>
            </div>
            <br>
    
            <div class="row">
                <div class="col-sm-7">
                    <label for="street" class="form-label">Endereço</label>
                    <input type="text" class="form-control text-uppercase" id="street" name="street" >
                </div>
                <div class="col-sm-5">
                    <label for="district" class="form-label">Bairro</label>
                    <input type="text" class="form-control text-uppercase" id="district" name="district" >
                </div>
            </div>
            <br>
    
            <div class="row">
                <div class="col-sm-5">
                    <label for="complement" class="form-label">Complemento</label>
                    <input type="text" class="form-control text-uppercase" id="complement" name="complement" >
                </div>
                <div class="col-sm-5">
                    <label for="city" class="form-label">Municipio</label>
                    <input type="text" class="form-control text-uppercase" id="city" name="city" >
                </div>
                
                <div class="col-sm-2">
                    <label for="state" class="form-label">Estado</label>
                    <select class="form-select" id="state" name="state">
                        <option value=""></option>
                        <option value="AC" >AC</option>
                        <option value="AL" >AL</option>
                        <option value="AM" >AM</option>
                        <option value="AP" >AP</option>
                        <option value="BA" >BA</option>
                        <option value="CE" >CE</option>
                        <option value="DF" >DF</option>
                        <option value="ES" >ES</option>
                        <option value="GO" >GO</option>
                        <option value="MA" >MA</option>
                        <option value="MG" >MG</option>
                        <option value="MS" >MS</option>
                        <option value="MT" >MT</option>
                        <option value="PA" >PA</option>
                        <option value="PB" >PB</option>
                        <option value="PE" >PE</option>
                        <option value="PI" >PI</option>
                        <option value="PR" >PR</option>
                        <option value="RJ" >RJ</option>
                        <option value="RN" >RN</option>
                        <option value="RO" >RO</option>
                        <option value="RR" >RR</option>
                        <option value="RS" >RS</option>
                        <option value="SC" >SC</option>
                        <option value="SE" >SE</option>
                        <option value="SP" >SP</option>
                        <option value="TO" >TO</option>
                    </select>
                </div>
            </div>
            <br>
        </div>
    
    
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Cadastrar
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
@endsection