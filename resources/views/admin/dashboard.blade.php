@extends('layouts.admindash')

@section('content')
    <div class="row col-lg-offset-3">
        <div class="col-lg-12">
                    <h3 style="color: #E687E1">Admin Dashboard</h3>
                    <hr/>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as ADMIN!
        </div>
    </div>
@endsection
