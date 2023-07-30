@extends('auth.app')
@section('title', 'Registro')
@section('content')
    <div class="">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xl-8">
                    <div class="auth-full-bg">
                        <div class="w-100">
                            <div class="d-flex h-100 flex-column">
                                <img src="{{ asset('assets/images/banner.jpg') }}" alt="" height="100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="my-auto">
                                    <a href="index.html" class="d-block auth-logo">
                                        <img src="{{ asset('assets/images/psico.png') }}" alt="" width="100%">
                                    </a>
                                    <div class="mt-4">
                                        @include('components.alerts')
                                        <form class="form-horizontal" action="{{ route('register.post') }}" autocomplete="off" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nombre</label>
                                                <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <div class="p-1">
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control @if ($errors->has('username')) is-invalid @endif" id="username" name="username" placeholder="Ingrese su usuario" value="{{ old('username') }}">
                                                @if ($errors->has('username'))
                                                    <div class="p-1">
                                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Correo Electrónico</label>
                                                <input type="text" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <div class="p-1">
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" name="password" placeholder="Ingrese su contraseña" aria-label="Password" aria-describedby="password-addon" value="{{ old('password') }}">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <div class="p-1">
                                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row d-flex mt-3 d-grid mt-4 justify-content-center align-items-center">
                                                <button class="btn btn-login w-50 btn-lg waves-effect waves-light" type="submit">Registrar</button>
                                            </div>
                                        </form>
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
