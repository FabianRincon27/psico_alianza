<?php

namespace App\Http\Controllers\PsicoAlianza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Country;
use App\Models\City;
use App\Models\Position;
use App\Models\Role;
use App\Models\Area;
use App\Models\Roles;

class EmployeeController extends Controller
{
    public function getEmployees()
    {
        $countries = Country::orderBy('name', 'ASC')->get();
        $areas = Area::orderBy('name', 'ASC')->get();
        $positions = Position::orderBy('name', 'ASC')->get();
        $employees = Employee::with(['country', 'city', 'role', 'area', 'boss', 'positions'])
        ->orderByRaw("CONCAT(name, ' ', lastname) ASC")->get();
        // $t = collect();
        // foreach($employees as $employee){
        //     $positionsByEmployee = $employees->map(function ($employee) {
        //         return $employee->positions->pluck('id');
        //     });
        // }

        // return $positionsByEmployee;
        $roles = Roles::orderBy('name', 'ASC')->get();
        return view('psicoAlianza.employees.employee', compact('employees', 'countries', 'areas', 'positions', 'roles'));
    }

    public function postEmployee(Request $request){

        $messages = [
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'dni.required' => 'El número de identificación es requerido',
            'dni.unique' => 'El número de identificación ya existe',
            'country_id.required' => 'El país es requerido',
            'address.required' => 'La dirección es requerida',
            'phone.number' => 'El teléfono debe ser un número',
            'city_id.required' => 'La ciudad es requerida',
            'id_rol.required' => 'El rol es requerido',
            'id_area.required' => 'El área es requerida',
            'position_id.required' => 'Debe seleccionar almenos un cargo',
        ];

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'dni' => 'required|unique:employees,dni',
            'country_id' => 'required',
            'address' => 'required',
            'id_rol' => 'required',
            'id_area' => 'required',
            'city_id' => 'required',
            'position_id' => 'required',
        ], $messages);

        $employee = Employee::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'dni' => $request->dni,
            'phone' => $request->phone,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'role_id' => $request->id_rol,
            'area_id' => $request->id_area,
            'boss_id' => $request->id_boss,
        ]);

        $employee->positions()->sync($request->position_id);

        return redirect()->route('employees.get')->with('message', 'Empleado creado con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all');
    }

    public function getCities(Request $request){
        if($request->ajax()){
            $cities = City::where('country_id', $request->country_id)->get();
            return response()->json($cities);
        }
    }

    public function validateDni(Request $request){
        if($request->ajax()){
            $dni = Employee::where('dni', $request->dni)->count();
            return response()->json($dni);
        }
    }

    public function deleteSeveralEmployees(Request $request){
        $idsString = $request->selectedIds;
        $idsArray = explode(',', $idsString);

        $count = count($idsArray);
        ($count == 1) ? $message = 'Empleado eliminado con éxito.' : $message = $count . ' empleados eliminados con éxito.';

        $employees = Employee::whereIn('id', $idsArray)->get();
            foreach($employees as $employee){
                $employee->delete();
            }
        return redirect()->route('employees.get')->with('message', $message)
            ->with('type-alert', 'alert-success')
            ->with('icon', 'mdi-check-all');
    }

    public function editEmployee(Request $request, $id){
        $messages = [
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'dni.required' => 'El número de identificación es requerido',
            'address.required' => 'La dirección es requerida',
            'phone.number' => 'El teléfono debe ser un número',
            'rol_id.required' => 'El rol es requerido',
            'area_id.required' => 'El área es requerida',
            'position_id.required' => 'Debe seleccionar almenos un cargo',
        ];

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'dni' => 'required',
            'address' => 'required',
            'rol_id' => 'required',
            'area_id' => 'required',
            'position_id' => 'required',
        ], $messages);

        $employee = Employee::find($id);
        $employee->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'dni' => $request->dni,
            'phone' => $request->phone,
            'address' => $request->address,
            'role_id' => $request->rol_id,
            'area_id' => $request->area_id,
            'boss_id' => $request->boss_id,
        ]);

        $employee->positions()->sync($request->position_id);

        return redirect()->route('employees.get')->with('message', 'Empleado actualizado con éxito.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all');
    }
}
