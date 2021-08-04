@extends('layouts.app')

@section('content')
    @include('layouts.headers.normal')
    <div class="container-fluid mt-7">
        <div class="row">
            <div class="card col-12 shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Adicionar Departamento</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-lg-5">
                            <div class="col-md-12">
                                <form role="form" method="POST" action="{{ route('departments.store') }}">
                                @csrf

                                <!-- Departamento -->
                                    <div class="text-center">
                                        <h2>{{ __('Departamento') }}</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome do Departamento') }}" type="text" name="name" value="" required>
                                            </div>
                                            @if ($errors->has('department'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-4 form-group{{ $errors->has('initials') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('initials') ? ' is-invalid' : '' }}" placeholder="{{ __('Sigla') }}" type="text" name="initials" value="" required>
                                            </div>
                                            @if ($errors->has('initials'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('initials') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Departamento -->
                                    <div class="text-center">
                                        <h2>{{ __('Contato') }}</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-8 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="contact_email" value="" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-4 form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefone') }}" type="phone" name="contact_phone" value="" required>
                                            </div>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{ __('Criar Novo Departamento') }}</button>
                                    </div>
                                </form>
                            </div>
                    </div>
            </div>
        </div>

    </div>


    @include('layouts.footers.auth')
@endsection
</div>

@push('js')
@endpush
