@extends('layouts.dashboard')

@section('title', 'Couple Page | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">Couple Page</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-6">
                        <br>
                        <a class="btn btn-lg button_1" role="button" href="/couple-page/{{ Auth::id() }}/create">Create Couple Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection