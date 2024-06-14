<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;


class ProfileController extends Controller
{
    public function list(Request $request) {
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.profile.list', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'data' => Profile::all()
        ]);
    }

    public function create(Request $request) {
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.profile.create', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
        ]);
    }

    public function store(Request $request) {
        $verify = Profile::where('title', $request->title)
                    ->count();

        if($verify > 0) {
            return redirect('profile/create')->cookie('erro', 'Perfil Já Cadastrado!', 0.03);
        } else {
            $create = new Profile;
            $create->title   = $request->title;
            $create->save();

            return redirect('user')->cookie('success', 'Perfil Cadastrado com Sucesso!', 0.03);
        }
    }
    public function edit(Request $request, $id) {
        if(ModuleController::verify($id))
            return redirect($id);
        elseif($id <= 0 || $id > Profile::max('id'))
            return redirect('profile');

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.profile.update', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'data' => Profile::findOrFail($id),
        ]);
    }
    public function update(Request $request, $id) {
        $verify = Profile::where([
                        ['title', $request->title],
                        ['id', '!=', $id]
                    ])->count();
                    
        if($verify > 0) {
            $cookie = cookie('erro', 'Perfil Já Cadastrado!', 0.03);
            return redirect('profile/' . $id)->cookie($cookie);
        } else {
            $update = Profile::find($id);
            $update->title   = $request->title;
            $update->save();

            return redirect('profile')->cookie('success', 'Perfil Atualizado com Sucesso!', 0.03);
        }
    }

    public function delete($id) {
        Permission::where('profile', '=', $id)->delete();
        $delete = Profile::find($id)->delete();
        return redirect('profile')->cookie('success', 'Perfil Apagado com Sucesso!', 0.03);
    }
}
