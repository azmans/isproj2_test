@extends('layouts.home')

@section('title', 'Couple Page | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Create your Couple Page</h3>
            <hr>
                <form method="POST" enctype="multipart/form-data">
                 @csrf

                    <div class="form-group">
                        <textarea class="form-control" id="couple_page" name="couple_page" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm text-center">
                            <a href="dashboard" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm text-center">
                            <button type="submit" class="btn button_1">Create Page</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'couple_page' );
    </script>
@append