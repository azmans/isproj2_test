@extends('layouts.dashboard')

@section('title', 'Edit Budget | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Edit Budget</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-6 text-center">
                        <form method="POST">
                            @csrf
                            <br>
                            <div class="form-group">
                                <h4>Budget:</h4>
                                <br>
                                <input type="number" class="form-control" step="0.01" min="0" id="budget" name="budget"
                                    value="{{ $profiles->budget }}" placeholder="0.00"/>
                            </div>

                            <div class="form-group">
                                <a class="btn button_1" role="button" href="/budget-tracker">Back</a>
                                <button type="submit" class="btn button_1">Update Budget</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection