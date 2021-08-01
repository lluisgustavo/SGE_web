@extends('layouts.app')

@section('content')

@include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-4">
            <div class="row justify-content-center">
            </div>
        </div>
    </div>
</div>

        @include('layouts.footers.auth')
    @endsection
    </div>

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
