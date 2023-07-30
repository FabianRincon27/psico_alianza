@extends('PsicoAlianza.layouts.app');
@section('title', 'Configuración')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Cargos, Áreas y Roles</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                                    <li class="breadcrumb-item active">Cargos, Áreas y Roles</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    @include('components.alerts')
                </div>
                <div class="row">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-medium @if(Session::get('accordeon') != 'position') collapsed @endif" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Cargos
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse @if(Session::get('accordeon') == 'position') show @endif" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ route('config.position.post') }}" method="post" autocomplete="off"
                                        class="mb-4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-9">
                                                <input type="text"
                                                    class="form-control @if ($errors->has('position')) is-invalid @endif"
                                                    id="position" name="position" placeholder="Nombre nuevo cargo"
                                                    value="{{ old('position') }}">
                                            </div>
                                            <div class="col-3">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-100">Agregar</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                @if ($errors->has('position'))
                                                    <div class="p-1 mb-3">
                                                        <span class="text-danger">{{ $errors->first('position') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <div class="custom-separator">
                                        <div class="left-line"></div>
                                        <i class="bx bx-brightness"></i>
                                        <div class="right-line"></div>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped data-table fs-6">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($positions as $position)
                                                    <tr>
                                                        <td>{{ $position->name }}</td>
                                                        <td class="align-middle text-center">
                                                            <form
                                                                action="{{ route('config.position.delete', $position->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm waves-effect waves-light"><i
                                                                        class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button fw-medium @if(Session::get('accordeon') != 'area') collapsed @endif" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Áreas
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse @if(Session::get('accordeon') == 'area') show @endif" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ route('config.area.post') }}" method="post" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-9">
                                                <input type="text"
                                                    class="form-control @if ($errors->has('area')) is-invalid @endif"
                                                    id="area" name="area" placeholder="Nombre nueva área"
                                                    value="{{ old('area') }}">
                                            </div>
                                            <div class="col-3">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect w-100 waves-light">Agregar</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                @if ($errors->has('area'))
                                                    <div class="p-1 mb-3">
                                                        <span class="text-danger">{{ $errors->first('area') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <div class="custom-separator">
                                        <div class="left-line"></div>
                                        <i class="bx bx-brightness"></i>
                                        <div class="right-line"></div>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped data-table fs-6">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $area)
                                                    <tr>
                                                        <td>{{ $area->name }}</td>
                                                        <td class="align-middle text-center">
                                                            <form action="{{ route('config.area.delete', $area->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm waves-effect waves-light"><i
                                                                        class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button fw-medium @if(Session::get('accordeon') != 'rol') collapsed @endif" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Roles
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse @if(Session::get('accordeon') == 'rol') show @endif" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="{{ route('config.rol.post') }}" method="post" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-9">
                                                <input type="text"
                                                    class="form-control @if ($errors->has('rol')) is-invalid @endif"
                                                    id="rol" name="rol" placeholder="Nombre nuevo rol"
                                                    value="{{ old('rol') }}">
                                            </div>
                                            <div class="col-3">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect w-100 waves-light">Agregar</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                @if ($errors->has('rol'))
                                                    <div class="p-1 mb-3">
                                                        <span class="text-danger">{{ $errors->first('rol') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <div class="custom-separator">
                                        <div class="left-line"></div>
                                        <i class="bx bx-brightness"></i>
                                        <div class="right-line"></div>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped data-table fs-6">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $rol)
                                                    <tr>
                                                        <td>{{ $rol->name }}</td>
                                                        <td class="align-middle text-center">
                                                            <form action="{{ route('config.rol.delete', $rol->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm waves-effect waves-light"><i
                                                                        class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
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
        </div>
    </div>
@endsection
