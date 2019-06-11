@extends('layouts.dashboard')

@section('title', 'My Vendors | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>My Vendors</h3>
                <div class="table-responsive">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Vendor Type</th>
                            <th>Price Range</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse ($lists as $list)
                            <tr>
                                <td>{{ $list->first_name }} {{ $list->last_name }}</td>
                                <td>{{ $list->company_name }}</td>
                                <td>{{ $list->vendor_type }}</td>
                                <td>{{ $list->price_range }}</td>
                                <td><a href="{{ route('auth.view', $list->id) }}"
                                       class="btn btn-primary btn-sm">View Profile</a></td>
                                <td><a href="{{ route('auth.vendors.remove', $list->id) }}"
                                       class="btn btn-danger btn-sm">Remove</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No saved vendors found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection