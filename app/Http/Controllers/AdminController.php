<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Notifications\VendorApproved;
use App\Notifications\VendorRejected;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function vendors()
    {
        $vendors = Vendor::whereNull('approved_at')
            ->get();

        return view('admin.vendors', compact('vendors'));
    }

    public function approve($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->update(['approved_at' => now()]);

        if ($vendor) {
            $vendor->notify(new VendorApproved($vendor));
        }

        return redirect()->route('admin.vendors.index')->withMessage('Vendor has been approved successfully.');
    }

    public function reject($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        if ($vendor) {
            $vendor->notify(new VendorRejected($vendor));
        }

        return redirect()->route('admin.bookings.index')->withMessage('Vendor has been rejected.');
    }
}
