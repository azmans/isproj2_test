@extends('layouts.home')

@section('title', 'Add Meal | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">Add Meal</h3>
            <hr>
                <form method="POST">
                 @csrf

                    <div class="form-group">
                        <label for="meal_type">Meal</label>
                        <input class="form-control" type="text" id="meal_type" name="meal_type" placeholder="Eg. Lobster, Chicken, Pork" required>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a href="/guestlist" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn button_1">Add Meal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection