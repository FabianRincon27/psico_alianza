@extends('auth.app')
@section('title', 'Iniciar Sesión')
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
                                        <form class="form-horizontal" action="{{ route('login.post') }}" autocomplete="off" method="post">
                                            @csrf
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
                                            <div class="row justify-content-center mt-4">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember-check">
                                                        <label class="form-check-label" for="remember-check">
                                                            Recordar Cuenta
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex mt-3 d-grid mt-4 justify-content-center align-items-center">
                                                <button class="btn btn-login w-50 btn-lg waves-effect waves-light" type="submit">Iniciar sesión</button>
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
