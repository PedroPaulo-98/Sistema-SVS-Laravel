<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Module;
use App\Models\Permission;

class ModuleController extends Controller
{
    public static function verify($id) {
        if(Module::where('module', $id)->count() > 0)
            return true;
    }

    public function list(Request $request) {
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.module.list', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'data' => Module::all()
        ]);
    }

    public function create(Request $request) {
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.module.create', [
            'menu' => PermissionController::menu(),
            'notification' => $notification
        ]);
    }

    public function store(Request $request) {
        $verify = Module::where([
                        ['module', $request->module],
                        ['title', $request->title]
                    ])
                    ->count();
        
        if($verify > 0) {
            return redirect('module/create')->cookie('erro', 'Módulo Já Cadastrado!', 0.03);
        } else {
            $create = new Module;
            $create->icon   = trim(mb_strtolower($request->icon));
            $create->module = trim(mb_strtolower($request->module));
            $create->title  = trim(ucwords(mb_strtolower($request->title)));
            $create->save();

            return redirect('module')->cookie('success', 'Módulo Cadastrado com Sucesso!', 0.03);
        }
    }

    public function edit(Request $request, $id) {
        if(ModuleController::verify($id))
            return redirect($id);
        elseif($id <= 0 || $id > Module::max('id'))
            return redirect('module');

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.module.update', [
            'menu' => PermissionController::menu(),
            'data' => Module::findOrFail($id),
            'notification' => $notification
        ]);
    }

    public function update(Request $request, $id) {
        $verify = Module::where([
                        ['module', $request->module],
                        ['title', $request->title],
                        ['id', '!=', $request->id]
                    ])
                    ->count();
        
        if($verify > 0) {
            return redirect('module/' . $id)->cookie('erro', 'Módulo Já Cadastrado!', 0.03);
        } else {
            $update = Module::find($id);
            $update->icon   = trim(mb_strtolower($request->icon));
            $update->module = trim(mb_strtolower($request->module));
            $update->title  = trim(ucwords(mb_strtolower($request->title)));
            $update->save();
            
            return redirect('module')->cookie('success', 'Módulo Atualizado com Sucesso!', 0.03);
        }
    }

    public function delete($id) {
        Permission::where('module', $id)->delete();
        $delete = Module::find($id)->delete();
        return redirect('module')->cookie('success', 'Módulo Apagado com Sucesso!', 0.03);
    }
}