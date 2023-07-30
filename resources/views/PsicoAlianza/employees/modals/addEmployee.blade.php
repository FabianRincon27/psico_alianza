<div class="modal fade bs-example-modal-lg" id="addEmployee" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header shadow">
                <h5 class="modal-title" id="myLargeModalLabel">Añadir Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employees.post') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">

                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Ingrese el nombre del empleado" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="Ingrese el apellido del empleado" value="{{ old('lastname') }}">
                                @if ($errors->has('lastname'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="mb-3">
                                <label for="dni" class="form-label">Identificación</label>
                                <input type="text" class="form-control" id="dni" name="dni"
                                    placeholder="Ingrese la identificación del empleado" value="{{ old('dni') }}">
                                @if ($errors->has('dni'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('dni') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="mb-3">
                                <label for="address" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Ingrese la dirección del empleado" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="Ingrese el teléfono del empleado" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <label for="country_id">País</label>
                            <div class="mb-3">
                                <select class="form-select " name="country_id" id="country_id">
                                    <option value="" disabled selected>Seleccione un país</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <label for="city_id">Ciudad</label>
                            <div class="mb-3">
                                <select class="form-select " name="city_id" id="city_id">
                                    <option value="" disabled selected>Seleccione una ciudad</option>
                                </select>
                                @if ($errors->has('city_id'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('city_id') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <label for="id_area">Área</label>
                            <div class="mb-3">
                                <select class="form-select " name="id_area" id="id_area">
                                    <option value="" disabled selected>Seleccione un país</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_area'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('id_area') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                            <label for="id_rol">Rol</label>
                            <div class="mb-3">
                                <select class="form-select " name="id_rol" id="id_rol">
                                    <option value="" disabled selected>Seleccione un rol</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_rol'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('id_rol') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-4" id="div_boss_id">
                            <label for="boss_id">Jefe</label>
                            <div class="mb-3">
                                <select class="form-select " name="boss_id" id="boss_id">
                                    <option value="" disabled selected>Seleccione un jefe</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('boss_id'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('boss_id') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <label for="position_id">Cargo</label>
                            <div class="mb-3">
                                <div class="row">
                                    @foreach ($positions as $position)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $position->id }}" id="position_{{ $position->id }}"
                                                    name="position_id[]">
                                                <label class="form-check-label"
                                                    for="position_{{ $position->id }}">{{ $position->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($errors->has('position_id'))
                                    <div class="p-1">
                                        <span class="text-danger">{{ $errors->first('position_id') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mt-lg-4">
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-secondary btn-rounded w-25"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-outline-primary btn-rounded w-25 ms-3"
                                    id="btn_new_employee">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
