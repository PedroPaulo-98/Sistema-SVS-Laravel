<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(Request $request) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        return view('modules.user.list', [
            'menu' => PermissionController::menu(),
            'success' => $request->cookie('success'),
            'data' => User::all()
        ]);
    }

    public function create(Request $request) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        return view('modules.user.create', [
            'menu' => PermissionController::menu(),
            'erro' => $request->cookie('erro'),
            'profile' => Profile::all()
        ]);
    }

    public function store(Request $request) {
        $verify = User::where('cpf', $request->cpf)
                ->orWhere('email', $request->email)
                ->count();

        if($verify > 0) {
            return redirect('user/create')->cookie('erro', 'Usuário Já Cadastrado!', 0.03);
        } else {
            $create = new User;
            $create->name            = trim(ucwords(mb_strtolower($request->name)));
            $create->cpf             = $request->cpf;
            $create->advice          = $request->advice;
            $create->uf              = $request->uf;
            $create->profile         = $request->profile;
            $create->phone           = $request->phone;
            $create->email           = trim(mb_strtolower($request->email));
            $create->password        = Hash::make('123');
            $create->active          = 1;
            $create->change_password = 1;
            $create->save();

            return redirect('user')->cookie('success', 'Usuário Cadastrado com Sucesso! Senha padrão: 123', 0.03);
        }
    }

    public function edit(Request $request, $id) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        if(ModuleController::verify($id))
            return redirect($id);
        elseif($id <= 0 || $id > User::max('id'))
            return redirect('user');

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.user.update', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'data' => User::findOrFail($id),
            'profile' => Profile::all()
        ]);
    }

    public function update(Request $request, $id) {
        $verify = User::where([
                        ['cpf', $request->cpf],
                        ['id', '!=', $id]
                    ])->count();
                    
        if($verify > 0) {
            $cookie = cookie('erro', 'Usuário Já Cadastrado!', 0.03);
            return redirect('user/' . $id)->cookie($cookie);
        } else {
            $update = User::find($id);
            $update->name    = trim(ucwords(mb_strtolower($request->name)));
            $update->cpf     = $request->cpf;
            $update->profile = $request->profile;
            $update->phone = $request->phone;
            $update->email = trim(mb_strtolower($request->email));
            $update->save();

            return redirect('user')->cookie('success', 'Usuário Atualizado com Sucesso!', 0.03);
        }
    }

    public function function(Request $request, $id) {
        if($request->disable) {
            $disable = User::find($id);
            $disable->active = 0;
            $disable->save();

            return redirect('user')->cookie('success', 'Usuário Desativado com Sucesso!', 0.03);

        } elseif($request->enable) {
            $enable = User::find($id);
            $enable->password = Hash::make('123');
            $enable->active = 1;
            $enable->change_password = 1;
            $enable->save();

            return redirect('user')->cookie('success', 'Usuário Reativado com Sucesso!', 0.03);

        } elseif($request->password) {
            $password = User::find($id);
            $password->password = Hash::make('123');
            $password->change_password = 1;
            $password->save();

            return redirect('user')->cookie('success', 'Senha Resetada com Sucesso! Senha padrão: 123', 0.03);
        }
    }
}
