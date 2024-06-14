<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\People;

class PeopleController extends Controller
{
    public function list(Request $request) {
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.people.list', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'data' => People::all()
        ]);
    }

    public function create(Request $request) {
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.people.create', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
        ]);
    }

    public function store(Request $request) {
        $verify = People::where('cpf', $request->cpf)
                    ->count();

        if($verify > 0) {
            return redirect('people/create')->cookie('erro', 'Pessoa Já Cadastrado!', 0.03);
        } else {
            $create = new People;
            $create->name            = trim(ucwords(mb_strtoupper($request->name)));
            $create->social_name     = trim(ucwords(mb_strtoupper($request->social_name)));
            $create->mother          = trim(ucwords(mb_strtoupper($request->mother)));
            $create->father          = trim(ucwords(mb_strtoupper($request->father)));
            $create->breed           = $request->breed;
            $create->birth_date      = $request->birth_date;
            $create->sex             = $request->sex;
            $create->cpf             = $request->cpf;
            $create->rg              = $request->rg;
            $create->uf_rg           = $request->uf_rg;
            $create->expediter       = trim(ucwords(mb_strtoupper($request->expediter)));
            $create->marital_status  = $request->marital_status;
            $create->nationallity    = trim(ucwords(mb_strtoupper($request->nationallity)));
            $create->naturalness     = trim(ucwords(mb_strtoupper($request->naturalness)));
            $create->uf_naturalness  = $request->uf_naturalness;
            $create->phone           = $request->phone;
            $create->cep             = $request->cep;
            $create->street          = trim(mb_strtoupper($request->street));
            $create->complement      = trim(mb_strtoupper($request->complement));
            $create->district        = trim(mb_strtoupper($request->district));
            $create->city            = trim(mb_strtoupper($request->city));
            $create->state           = $request->state;
            $create->save();

            return redirect('people')->cookie('success', 'Pessoa Cadastrado com Sucesso!', 0.03);
        }
    }

    public function edit(Request $request, $id) {
        if(ModuleController::verify($id))
            return redirect($id);
        elseif($id <= 0 || $id > People::max('id'))
            return redirect('people');

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.people.update', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'data' => People::findOrFail($id),
        ]);
    }
    public function update(Request $request, $id) {
        $verify = People::where([
                        ['cpf', $request->cpf],
                        ['id', '!=', $id]
                    ])->count();
        
        if($verify > 0) {
            $cookie = cookie('erro', 'Pessoa Já Cadastrado!', 0.03);
            return redirect('people/' . $id)->cookie($cookie);
        } else {
            $update = People::find($id);
            $update->name            = trim(ucwords(mb_strtoupper($request->name)));
            $update->social_name     = trim(ucwords(mb_strtoupper($request->social_name)));
            $update->mother          = trim(ucwords(mb_strtoupper($request->mother)));
            $update->father          = trim(ucwords(mb_strtoupper($request->father)));
            $update->breed           = $request->breed;
            $update->birth_date      = $request->birth_date;
            $update->sex             = $request->sex;
            $update->cpf             = $request->cpf;
            $update->rg              = $request->rg;
            $update->uf_rg           = $request->uf_rg;
            $update->expediter       = trim(ucwords(mb_strtoupper($request->expediter)));
            $update->marital_status  = $request->marital_status;
            $update->nationallity    = trim(ucwords(mb_strtoupper($request->nationallity)));
            $update->naturalness     = trim(ucwords(mb_strtoupper($request->naturalness)));
            $update->uf_naturalness  = $request->uf_naturalness;
            $update->phone           = $request->phone;
            $update->cep             = $request->cep;
            $update->street          = trim(mb_strtoupper($request->street));
            $update->complement      = trim(mb_strtoupper($request->complement));
            $update->district        = trim(mb_strtoupper($request->district));
            $update->city            = trim(mb_strtoupper($request->city));
            $update->state           = $request->state;
            $update->save();

            return redirect('people')->cookie('success', 'Pessoa Atualizado com Sucesso!', 0.03);
        }
    }

}
