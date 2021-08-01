@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
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
                                    <a href="{{ URL::to('users/create') }}" class="btn btn-sm btn-primary">Adicionar Usuário</a>
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
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Entrou em</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user):
                                <tr>
                                    <td>{{$user->first_name}} {{$user->last_name}} </td>
                                    <td>
                                        <a href="{{$user->email}}">{{$user->email}}</a>
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ URL::to('users/' . $user->id . '/edit') }}">Editar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
