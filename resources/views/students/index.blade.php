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
                                <h3 class="mb-0">Usuários</h3>
                            </div>

                            @if(Auth::user()->role_id === 1)
                                <div class="col-4 text-right">
                                    <a href="{{ route('students.create')  }}" class="btn btn-sm btn-primary">Adicionar Usuário</a>
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
                                    <th scope="col">Curso</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->student_id}} </td>
                                    <td>{{$student->first_name}} {{$student->last_name}} </td>
                                    <td>{{date("d/m/Y H:i:s", strtotime($student->created_at))}}</td>
                                    <td class="text-right">
                                        <a class="" href="{{ route('user.edit', $student->user_id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="" href="{{ route('users.destroy', $student->user_id) }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">{{ $students->links() }}</div>
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
