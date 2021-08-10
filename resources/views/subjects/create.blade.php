@extends('layouts.app')

@section('content')
    @include('layouts.headers.normal')
    <div class="container-fluid mt-7">
        <div class="row">
            <div class="card col-12 shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Adicionar Disciplina</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-lg-5">
                            <div class="col-md-12">
                                <form role="form" method="POST" action="{{ route('subjects.store') }}">
                                @csrf

                                <!-- Curso -->
                                    <div class="text-center">
                                        <h2>{{ __('Disciplina') }}</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome da Disciplina') }}" type="text" name="name" value="" required>
                                            </div>
                                            @if ($errors->has('subject'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-2 form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" placeholder="{{ __('Carga horária') }}" type="number" name="name" value="" required>
                                            </div>
                                            @if ($errors->has('subject'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select multiple="multiple" class="browser-default custom-select" name="course_id" required>
                                                <option>Selecione os Cursos</option>
                                                @foreach($courses as $course)
                                                    <option value="{{$course->id}}">
                                                        {{ $course->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{ __('Criar Nova Disciplina') }}</button>
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
