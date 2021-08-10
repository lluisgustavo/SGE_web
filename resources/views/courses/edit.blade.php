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
                                <h3 class="mb-0">Editar Curso</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        <!-- Curso -->
                        <form role="form" method="POST" action="{{ route('courses.update', $course->id) }}">
                            @csrf

                            <div class="form-group{{ $errors->has('course') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome do Curso') }}" type="text" name="name" value="{{$course->name}}" required>
                                </div>
                                @if ($errors->has('course'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('course') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select class="browser-default custom-select" name="department_id" required>
                                        <option>Selecione um Departamento</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{($course->department_id == $department->id) ? "selected" : ''}}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Editar Curso') }}</button>
                            </div>
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
