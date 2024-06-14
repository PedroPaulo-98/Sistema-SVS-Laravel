<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unit;

class UnitController extends Controller
{
    public function list(Request $request) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.unit.list', [
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'data' => Unit::all()
        ]);
    }

    public function create(Request $request) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.unit.create', [
            'menu' => PermissionController::menu(),
            'notification' => $notification
        ]);
    }

    public function store(Request $request) {
        $verify = Unit::where('name', $request->name)
                      ->count();
        
        if($verify > 0) {
            return redirect('unit/create')->cookie('erro', 'Unidade Já Cadastrada!', 0.03);
        } else {
            $create = new Unit;
            $create->name = trim(mb_strtoupper($request->name));
            $create->initials = trim(mb_strtoupper($request->initials));
            $create->cep = $request->cep;
            $create->street = trim(ucwords($request->street));
            $create->number = $request->number;
            $create->district = trim(ucwords($request->district));
            $create->city = trim(ucwords($request->city));
            $create->active = 1;
            $create->save();

            return redirect('unit')->cookie('success', 'Unidade Cadastrada com Sucesso!', 0.03);
        }
    }

    public function edit(Request $request, $id) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        if(ModuleController::verify($id))
            return redirect($id);
        elseif($id <= 0 || $id > Unit::max('id'))
            return redirect('unit');

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];
                  
        return view('modules.unit.update', [
            'menu' => PermissionController::menu(),
            'data' => Unit::findOrFail($id),
            'notification' => $notification
        ]);
    }
    
    public function update(Request $request, $id) {
        $verify = Unit::where([
                        ['id', '!=', $id]
                    ])
                    ->count();

        if($verify > 0) {
            return redirect('unit/' . $id)->cookie('erro', 'Unidade Já Cadastrada!', 0.03);
        } else {
            $update = Unit::find($id);
            $update->name         = trim(mb_strtoupper($request->name));
            $update->initials     = trim(mb_strtoupper($request->initials));
            $update->cep          = $request->cep;
            $update->street       = trim(ucwords($request->street));
            $update->number       = $request->number;
            $update->district     = trim(ucwords($request->district));
            $update->city         = trim(ucwords($request->city));
            $update->save();
            
            return redirect('unit')->cookie('success', 'Unidade Atualizada com Sucesso!', 0.03);
        }
    }

    public function active(Request $request, $id) {
        if($request->disable) {
            $disable = Unit::find($id);
            $disable->active = 0;
            $disable->save();

            return redirect('unit')->cookie('success', 'Unidade Desativada com Sucesso!', 0.03);
        } elseif($request->enable) {
            $enable = Unit::find($id);
            $enable->active = 1;
            $enable->save();

            return redirect('unit')->cookie('success', 'Unidade Reativada com Sucesso!', 0.03);
        }
    }
}
