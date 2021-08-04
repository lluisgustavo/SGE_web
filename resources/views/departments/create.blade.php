@extends('layouts.app')

@section('content')
    @include('layouts.headers.normal')
    <div class="container-fluid mt--7">
        {{$roles}}
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Editar Usuário</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Dados Pessoais -->
                                <div class="text-center mt-4">
                                    <h2>{{ __('Conta') }}</h2>
                                </div>
                                <form role="form" method="POST" action="{{ route('users.edit.user', $user->user_id) }}">
                                @csrf

                                <!-- Usuário -->
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" disabled name="email" value="{{ $user->email }}" required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Senha') }}" type="password" name="password" required>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="{{ __('Confirmar Senha') }}" type="password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="browser-default custom-select" name="role" required>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}" {{($user->role_id == $role->id) ? "selected" : ''}}>
                                                        @if($role->name == 'admin')
                                                            Administrador
                                                        @elseif($role->name == 'student')
                                                            Estudante
                                                        @elseif($role->name == 'employee')
                                                            Colaborador
                                                        @elseif($role->name == 'teacher')
                                                            Professor
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Editar Conta') }}</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <!-- Dados Pessoais -->
                                <div class="text-center mt-4">
                                    <h2>{{ __('Dados Pessoais') }}</h2>
                                </div>

                                <form role="form" method="POST" action="{{ route('users.edit.person', $user->person_id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="{{ __('Nome') }}" type="text" value="{{ $user->first_name }}" name="first_name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="{{ __('Sobrenome') }}" type="text" value="{{ $user->last_name }}" name="last_name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input onblur="ValidaCPF(this)" class="form-control ob" placeholder="{{ __('CPF') }}" value="{{ $user->cpf }}" type="text" name="cpf" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input class="form-control ob" placeholder="{{ __('Data de Nascimento') }}" type="date" value="{{ $user->birthday }}" data-mask="0000-0000" name="birthday" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input class="form-control ob" placeholder="{{ __('Telefone') }}" type="tel" value="{{ $user->phone }}" name="phone" required>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-4">{{ __('Editar Dados Pessoais') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Dados Pessoais -->

                            <!-- Endereço -->
                            <div class="text-center mt-4">
                                <h2>{{ __('Endereço') }}</h2>
                            </div>

                            <form role="form" method="POST" action="{{ route('users.edit.address', $user->address_id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input onblur="pesquisacep(this.value);" class="form-control ob" placeholder="{{ __('CEP') }}" value="{{ $user->postalcode }}"  type="text" name="postalcode" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control ob" placeholder="{{ __('Rua') }}" type="text" value="{{ $user->street }}" name="street" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control ob" placeholder="{{ __('Número') }}" type="text" value="{{ $user->number }}" name="number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="{{ __('Complemento') }}" type="text" value="{{ $user->complement }}" name="complement">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control ob" placeholder="{{ __('Bairro') }}" type="text" name="district" value="{{ $user->district }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control ob" placeholder="{{ __('Cidade') }}" type="text" name="city" value="{{ $user->city }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control ob" placeholder="{{ __('Estado') }}" type="text" name="state" value="{{ $user->state }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control ob" placeholder="{{ __('País') }}" type="text" name="country" value="{{ $user->country }}"  required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('Referência') }}" type="text" name="ref" value="{{ $user->ref }}" >
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Editar Endereço') }}</button>
                                </div>
                                <!-- Endereço -->
                            </form>
                </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
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
