@extends('layouts.app')

@section('content')
    @include('layouts.headers.normal')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Cursos</h3>
                            </div>

                            @if(Auth::user()->role_id === 1)
                                <div class="col-4 text-right">
                                    <a href="{{ route('courses.create')  }}" class="btn btn-sm btn-primary">Adicionar Curso</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Carga Horária</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->id}} </td>
                                    <td>{{$course->name}} </td>
                                    <td>{{($course->hourly_load ? $course->hourly_load . 'h' : '00h')}} </td>
                                    <td>{{$course->department_name}} </td>
                                    <td class="text-right">
                                        <a class="" href="{{ route('courses.edit', $course->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="" href="{{ route('courses.destroy', $course->id) }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">{{ $courses->links() }}</div>
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
