<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;
use App\Models\Profile;
use App\Models\Module;

class PermissionController extends Controller
{
    public static function menu() {
        return Permission::join('modules', 'permissions.module', '=', 'modules.id')
                 ->where('permissions.profile', session()->get('profile'))
                 ->get(['modules.*']);
    }

    public function return() {
        return redirect('profile');
    }

    public function redirect($profile, $erro, $id) {
        return redirect('permission/' . $profile . '/' . $id);
    }
    
    public function create(Request $request, $profile) {
        if(ModuleController::verify($profile))
            return redirect($profile);
        elseif($profile <= 0 || $profile > Profile::max('id'))
            return redirect('profile');
        
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];
        
        return view('modules.permission.create',[
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'profile' => Profile::findOrFail($profile),
            'data' => Permission::join('modules', 'permissions.module', '=', 'modules.id')
                                ->where('permissions.profile', '=', $profile)
                                ->get(['permissions.id', 'modules.title']),
            'module' => Module::All()
        ]);
    }
    
    public function store(Request $request, $profile) {
        $verify = Permission::where([
                        ['profile', '=', $profile],
                        ['module', '=', $request->module]
                    ])
                    ->count();

        if($verify > 0) {
            return redirect('permission/' . $profile)->cookie('erro', 'Permissão Já Cadastrada!', 0.03);
        } else {
            $create = new Permission;
            $create->profile = $profile;
            $create->module  = $request->module;
            $create->save();

            return redirect('permission/' . $profile)->cookie('success', 'Permissão Cadastrada com Sucesso!', 0.03);
        }
    }

    public function edit(Request $request, $profile, $id) {
        if(ModuleController::verify($id))
            return redirect($id);
        elseif($id <= 0 || $id > Permission::max('id'))
            return redirect('permission/' . $profile);

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];        

        return view('modules.permission.update',[
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'profile' => Profile::findOrFail($profile),
            'edit' => Permission::findOrFail($id),
            'data' => Permission::join('modules', 'permissions.module', '=', 'modules.id')
                                ->where('permissions.profile', '=', $profile)
                                ->get(['permissions.id', 'modules.title']),
            'module' => Module::All()
        ]);
    }
    
    public function update(Request $request, $profile, $id) {
        $verify = Permission::where([
                        ['profile', $profile],
                        ['module', $request->module],
                        ['id', '!=', $id]
                    ])
                    ->count();

        if($verify > 0) {
            return redirect('permission/' . $profile . '/' . $id)->cookie('erro', 'Permissão Já Cadastrada!', 0.03);
        } else {
            $update = Permission::find($id);
            $update->profile = $profile;
            $update->module  = $request->module;
            $update->save();

            return redirect('permission/' . $profile)->cookie('success', 'Permissão Atualizada com Sucesso!', 0.03);
        }
    }
    
    public function delete(Request $request, $profile, $id) {
        if ($profile <= 0 || $profile > DB::table('profiles')->max('id'))
            return redirect('/profile');
        DB::table('permissions')->where('id', '=', $id)->delete();
        $cookie = cookie('success', 'Permissão Apagada com Sucesso!', 0.03);
        return redirect('permission/' . $profile)->cookie($cookie);
    }
}