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
                                <h3 class="mb-0">Disciplinas</h3>
                            </div>

                            @if(Auth::user()->role_id === 1)
                                <div class="col-4 text-right">
                                    <a href="{{ route('subjects.create')  }}" class="btn btn-sm btn-primary">Adicionar Disciplina</a>
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
                                    <th scope="col">Cursos</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->id}} </td>
                                    <td>{{$subject->name}} </td>
                                    <td>{{($subject->hourly_load ? $subject->hourly_load . 'h' : '00h')}} </td>
                                    <td class="text-right">
                                        <div class="row">
                                            <a class="" href="{{ route('subjects.edit', $subject->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0);" onclick="$(this).find('form').submit();" style="margin-left: 0.2em;">
                                                <i class="fas fa-trash"></i>
                                                <form style="display: none" action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">{{ $subjects->links() }}</div>
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
