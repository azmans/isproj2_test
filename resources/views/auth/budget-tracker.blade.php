@extends('layouts.dashboard')

@section('title', 'Budget Tracker | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">My Budget</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-6">
                        <br>
                        @if(!$budgets->isEmpty())
                            @foreach($budgets as $budget)
                            <p>Budget: P{{ $budget->budget }}</p>
                            <p>Total Amount Spent: P{{ $budget->spent }}</p>
                            <p>Remaining Balance: P{{ $budget->balance }}</p>
                            <a class="btn button_1" href="/budget-tracker/{{ Auth::id() }}/budget/edit">Edit Budget</a>
                            @endforeach
                        @else
                            <p>You have not added a budget yet.</p>
                            <a class="btn button_1" href="/budget-tracker/{{ Auth::id() }}/budget/add">Add Budget</a>
                        @endif
                    </div>
                </div>
            <h4>List</h4>
            <a role="button" class="btn button_1 float-right" href="/budget-tracker/{{ Auth::id() }}/item">Add Item</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Vendor Name</th>
                        <th>Type</th>
                        <th>Cost</th>
                        <th>Paid</th>
                        <th>Notes</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$items->isEmpty())
                    <tr>
                        @foreach($items as $item)
                        <td>{{ $item->budget_item }}</td>
                        <td>{{ $item->vendor_name }}</td>
                        <td>{{ $item->vendor_type }}</td>
                        <td>P{{ $item->cost }}</td>
                        <td>
                            @if ($item->is_paid == 0)
                                No
                            @else
                                Yes
                            @endif
                        </td>
                        <td>{{ $item->notes }}</td>
                        <td><a href="/budget-tracker/{{ Auth::id() }}/item/edit" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                        @endforeach
                    </tr>
                    @else
                    <tr>
                        <td colspan="5">You have not added any items to your budget list yet.</td>
                    @endif
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection