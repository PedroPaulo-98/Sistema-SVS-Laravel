<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Designation;
use App\Models\Unit;
use App\Models\User;

class DesignationController extends Controller
{
    public function return() {
        return redirect('unit');
    }
    
    public function redirect($unit, $erro, $id) {
        return redirect('designation/' . $unit . '/' . $id);
    }

    public function create(Request $request, $unit) {
        if(ModuleController::verify($unit))
            return redirect($unit);
        elseif($unit <= 0 || $unit > Unit::max('id'))
            return redirect('unit');
        
        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];

        return view('modules.designation.create',[
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'unit' => $unit,
            'data' => Designation::join('users', 'designations.user', '=', 'users.id')
                      ->where('unit', $unit)
                      ->get(['designations.id', 'users.name']),
            'user' => User::all()->where('active', 1)
        ]);
    }
    
    public function store(Request $request, $unit) {
        $verify = Designation::where([
                        ['unit', $unit],
                        ['user', $request->user]
                    ])
                ->count();

        if($verify > 0) {
            return redirect('designation/' . $unit)->cookie('erro', 'Usuário Já Designado!', 0.03);
        } else {
            $create = new Designation;
            $create->unit = $unit;
            $create->user = $request->user;
            $create->save();
            
            return redirect('designation/' . $unit)->cookie('success', 'Usuário Designado com Sucesso!', 0.03);
        }
    }

    public function edit(Request $request, $unit, $id) {
        if(ModuleController::verify($id))
            return redirect($id);
        elseif($id <= 0 || $id > Designation::max('id'))
            return redirect('designation/' . $unit);

        $notification = [
            'erro' => $request->cookie('erro'),
            'success' => $request->cookie('success')
        ];        

        return view('modules.designation.update',[
            'menu' => PermissionController::menu(),
            'notification' => $notification,
            'unit' => $unit,
            'edit' => Designation::findOrFail($id),
            'data' => Designation::join('users', 'designations.user', '=', 'users.id')
                      ->where('unit', $unit)
                      ->get(['designations.id', 'users.name']),
            'user' => User::all()
        ]);
    }
    
    public function update(Request $request, $unit, $id) {
        $verify = Designation::where([
                        ['unit', $unit],
                        ['user', $request->user],
                        ['id', '!=', $id]
                    ])
                    ->count();
        
        if($verify > 0) {
            return redirect('designation/' . $unit . '/' . $id)->cookie('erro', 'Usuário Já Designado!', 0.03);
        } else {
            $update = Designation::find($id);
            $update->unit = $unit;
            $update->user = $request->user;
            $update->save();

            return redirect('designation/' . $unit)->cookie('success', 'Designação Atualizada com Sucesso!', 0.03);
        }
    }
    
    public function delete($unit, $id) {
        Designation::find($id)->delete();
        return redirect('designation/' . $unit)->cookie('success', 'Designação Apagada com Sucesso!', 0.03);
    }
}
