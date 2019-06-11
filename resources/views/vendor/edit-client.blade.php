@extends('layouts.home')

@section('title', 'Edit Client | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">Edit Client</h3>
            <hr>
                <form method="POST">
                 @csrf

                    <div class="form-group">
                        <label class="form-check-label" for="paid">Full Payment</label>
                        <input class="form-check-input" style="margin-left: 10px" type="checkbox" id="fully_paid" name="fully_paid" value="{{ $client->fully_paid }}"/>
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="paid">Deposit</label>
                        <input class="form-check-input" style="margin-left: 10px" type="checkbox" id="deposit_paid" name="deposit_paid" value="{{ $client->deposit_paid }}"/>
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <br><textarea class="form-control" id="notes" name="notes" rows="3" value="{{ $client->notes }}"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a href="/vendor/clients" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn button_1">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection