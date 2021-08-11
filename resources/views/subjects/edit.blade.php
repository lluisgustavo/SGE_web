@extends('layouts.app')

@section('content')
    @include('layouts.headers.normal')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Editar Disciplina</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        <!-- Disciplina -->
                        <div class="col-md-12">
                            <form role="form" method="POST" action="{{ route('subjects.update', $subject->id) }}">
                            @csrf

                                <div class="text-center">
                                    <h2>{{ __('Disciplina') }}</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome da Disciplina') }}" type="text" name="name" value="{{ $subject->name }}" required>
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
                                            <input class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" placeholder="{{ __('Carga horária') }}" type="number" name="hourly_load" value="{{ $subject->hourly_load }}" required>
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
                                        <select multiple="multiple" class="browser-default custom-select" name="courses[]" required>
                                            <option>Selecione os Cursos</option>
                                            @foreach($courses as $course)
                                                <option value="{{$course->id}}"
                                                        @foreach($subject_courses as $subject_course)
                                                        @if($subject_course->course_id === $course->id)
                                                        selected
                                                        @endif
                                                        @endforeach>
                                                    {{ $course->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">{{ __('Editar Disciplina') }}</button>
                                </div>
                            </form>
                        </div>
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
