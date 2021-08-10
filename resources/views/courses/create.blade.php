@extends('layouts.app')

@section('content')
    @include('layouts.headers.normal')
    <div class="container-fluid mt-7">
        <div class="row">
            <div class="card col-12 shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Adicionar Curso</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-lg-5">
                            <div class="col-md-12">
                                <form role="form" method="POST" action="{{ route('courses.store') }}">
                                @csrf

                                <!-- Departamento -->
                                    <div class="text-center">
                                        <h2>{{ __('Curso') }}</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8 form-group{{ $errors->has('course') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome do Curso') }}" type="text" name="name" value="" required>
                                            </div>
                                            @if ($errors->has('course'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('course') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-4 form-group{{ $errors->has('hourly_load') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('hourly_load') ? ' is-invalid' : '' }}" placeholder="{{ __('Carga Horária') }}" type="number" name="hourly_load" value="" required>
                                            </div>
                                            @if ($errors->has('hourly_load'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('hourly_load') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Departamento -->
                                    <div class="row">
                                        <div class="col-sm-6 col-md-8 form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="contact_email" value="" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{ __('Criar Novo Curso') }}</button>
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
