@extends('PsicoAlianza.layouts.app');
@section('title', 'Empleados')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Empleados</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                                    <li class="breadcrumb-item active">Empleados</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <form id="form_delete_several_employees" action="{{ route('employees.delete') }}"
                                method="post">
                                @csrf
                                <input type="hidden" id="selectedIdsInput" name="selectedIds">
                                <span id="selected-count" class="me-2 d-none">0 elementos seleccionados</span>
                                <button id="btn-delete-selected" class="btn btn-outline-danger mx-2 d-none"
                                    type="button">Borrar elementos seleccionados</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="float-end">
                            <button class="btn btn-outline-primary btn-rounded waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#addEmployee">Agregar Empleado</button>
                            @include('PsicoAlianza.employees.modals.addEmployee')
                        </div>
                    </div>
                </div>
                <div class="row">
                    @include('components.alerts')
                </div>
                <div class="row">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="">
                                <table id="datatable-buttons" class="table table-striped table-striped fs-6">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <input type="checkbox" id="check-all">
                                            </th>
                                            <th>Nombre</th>
                                            <th>Identificación</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Residencia</th>
                                            <th>Área</th>
                                            <th>Cargo</th>
                                            <th>Rol</th>
                                            <th>Jefe</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            @include('PsicoAlianza.employees.modals.editEmployee')
                                            <tr class="align-middle">
                                                <td></td>
                                                <td class="align-middle">
                                                    <input type="checkbox" class="check-row" data-id="{{ $employee->id }}">
                                                </td>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->dni }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>{{ $employee->country->name }} - {{ $employee->city->name }}</td>
                                                <td>{{ $employee->area->name }}</td>
                                                <td class="align-middle">
                                                    <ul>
                                                        @foreach ($employee->positions as $position)
                                                            <li>{{ $position->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    {{ $employee->role->name }}
                                                </td>
                                                <td>{{ $employee->haveBoss }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editEmployee{{ $employee->id }}"><i
                                                            class="bx bxs-edit-alt"></i></a>
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script src="{{ asset('assets/js/pages/employee.js') }}" type="module"></script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#addEmployee').modal('show');
            });
        </script>
    @endif
    <script>
        function validatePositionEdit(employe, position) {
            var selectedPositions = $('#position_' + employe + '_' + position);
            var selectedLabel = $('#lbl_position_' + employe + '_' + position);
            var bool = (selectedLabel.text().trim() == 'Presidente');
            if (selectedPositions.prop('checked') && bool) {
                $('#div_boss_id_' + employe).addClass('d-none');
                $('#boss_id_' + employe).val('');
            } else {
                $('#div_boss_id_' + employe).removeClass('d-none');
            }
        }
    </script>
@endsection
@endsection
