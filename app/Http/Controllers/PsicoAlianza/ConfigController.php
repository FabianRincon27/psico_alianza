<?php

namespace App\Http\Controllers\PsicoAlianza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Area;
use App\Models\Roles;

class ConfigController extends Controller
{
    public function getConfig()
    {
        $positions = Position::orderBy('name', 'ASC')->get();
        $areas = Area::orderBy('name', 'ASC')->get();
        $roles = Roles::orderBy('name', 'ASC')->get();
        return view('PsicoAlianza.config.config', compact('positions', 'areas', 'roles'));
    }

    public function postPosition(Request $request){
        $messages = [
            'position.required' => 'Debe ingresar un cargo',
            'position.unique' => 'El cargo ya existe'
        ];

        $request->validate([
            'position' => 'required',
            'position' => 'unique:positions,name'
        ], $messages);

        $position = Position::create([
            'name' => $request->position,
        ]);

        return redirect()->route('config.get')->with('message', 'Cargo creado con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all')
                ->with('accordeon', 'position');
    }

    public function deletePosition($id){
        $position = Position::find($id);
        $position->delete();

        return redirect()->route('config.get')->with('message', 'Cargo eliminado con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all')
                ->with('accordeon', 'position');
    }

    public function postArea(Request $request){
        $messages = [
            'area.required' => 'Debe ingresar una área',
            'area.unique' => 'El área ya existe'
        ];

        $request->validate([
            'area' => 'required',
            'area' => 'unique:areas,name'
        ], $messages);

        $area = Area::create([
            'name' => $request->area,
        ]);

        return redirect()->route('config.get')->with('message', 'Área creada con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all')
                ->with('accordeon', 'area');
    }

    public function deleteArea($id){
        $area = Area::find($id);
        $area->delete();

        return redirect()->route('config.get')->with('message', 'Área eliminada con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all')
                ->with('accordeon', 'area');
    }

    public function postRol(Request $request){
        $messages = [
            'rol.required' => 'Debe ingresar un rol',
            'rol.unique' => 'El rol ya existe'
        ];

        $request->validate([
            'rol' => 'required',
            'rol' => 'unique:roles,name'
        ], $messages);

        $rol = Roles::create([
            'name' => $request->rol,
        ]);

        return redirect()->route('config.get')->with('message', 'Rol creado con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all')
                ->with('accordeon', 'rol');
    }

    public function deleteRol($id){
        $rol = Roles::find($id);
        $rol->delete();

        return redirect()->route('config.get')->with('message', 'Rol eliminado con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all')
                ->with('accordeon', 'rol');
    }
}
