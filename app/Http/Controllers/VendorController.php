<?php

namespace App\Http\Controllers;

use App\Notifications\BookingAccepted;
use DB;
use App\MyClients;
use App\User;
use App\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function approval()
    {
        return view('approval');
    }

    public function profile($id)
    {
        $profile = User::find($id);

        return view('vendor.view')->with(['profile' => $profile]);
    }

    public function index()
    {
        $profiles = DB::table('vendors')
            ->select('id', 'first_name', 'last_name', 'email', 'mobile', 'company_name',
                'vendor_type', 'city', 'price_range', 'tin', 'sec_dti_number',
                'mayors_permit', 'profile_picture')
            ->where('id', Auth::guard('vendor')->user()->id)
            ->get();

        return view('vendor.dashboard')->with('profiles', $profiles);
    }

    public function edit_profile($id) {
        $profile = Vendor::find($id);

        return view('vendor.edit')->with(['profile' => $profile]);
    }

    public function update(Request $request, $id) {
        $profile = Vendor::find($id);

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        $profile->mobile = $request->mobile;
        $profile->company_name = $request->company_name;
        $profile->vendor_type = $request->vendor_type;
        $profile->city = $request->city;
        $profile->price_range = $request->price_range;
        $profile->tin = $request->tin;
        $profile->sec_dti_number = $request->sec_dti_number;
        $profile->mayors_permit = $request->mayors_permit;

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image_name = $profile->id.'_profile_picture'.time().'.'.request()->profile_picture->getClientOriginalExtension();

        $request->profile_picture->storeAs('images',$image_name);

        $profile->profile_picture = $image_name;
        $profile->save();
        $request->session()->flash('message', 'Your profile has been successfully saved.');
        return redirect('/vendor/dashboard');
    }

    public function requests()
    {
        $lists = DB::table('bookings')
            ->select(['bookings.id', 'soon_to_weds.id', 'soon_to_weds.bride_first_name',
                'soon_to_weds.bride_last_name', 'soon_to_weds.groom_first_name', 'soon_to_weds.groom_last_name',
                'bookings.date', 'bookings.time', 'bookings.status',
                'bookings.details', 'bookings.created_at'])
            ->join('soon_to_weds', 'soon_to_weds.id', '=', 'bookings.soon_to_wed_id')
            ->where('bookings.status', 'Pending')
            ->where('bookings.vendor_id', auth()->guard('vendor')->user()->id)
            ->get();

        return view('vendor.bookings')->with('lists', $lists);
    }

    public function accept(Request $request, $id)
    {
        $soon_to_wed = User::findOrFail($id);

        $soon_to_wed->vendor_bookings()->updateExistingPivot(auth()->guard('vendor')->user()->id,
            ['status' => 'Accepted']);

        $soon_to_wed->vendor_clients()->attach(auth()->guard('vendor')->user()->id, [
            'notes' => $request['notes'],
            'fully_paid' => $request['fully_paid'],
            'deposit_paid' => $request['deposit_paid']
        ]);

        //$soon_to_wed->notify(new BookingRejected());

        return redirect()->route('vendor.bookings')->withMessage('You have successfully accepted this booking request.');
    }

    public function reject($id)
    {
        $soon_to_wed = User::findOrFail($id);

        $soon_to_wed->vendor_bookings()->updateExistingPivot(auth()->guard('vendor')->user()->id,
            ['status' => 'Rejected']);

        //$soon_to_wed->notify(new BookingAccepted());

        return redirect()->route('vendor.bookings')->withMessage('You have just rejected this booking request.');
    }

    public function clients()
    {
        $lists = DB::table('bookings')
            ->select(['soon_to_weds.id', 'soon_to_weds.bride_first_name', 'soon_to_weds.bride_last_name',
                'groom_first_name', 'groom_last_name', 'soon_to_weds.wedding_date', 'bookings.date', 'bookings.time',
                'my_clients.notes', 'my_clients.fully_paid', 'my_clients.deposit_paid'])
            ->join('soon_to_weds', 'soon_to_weds.id', '=', 'bookings.soon_to_wed_id')
            ->join('my_clients', 'my_clients.vendor_id', '=', 'bookings.vendor_id')
            ->where('bookings.status', 'Accepted')
            ->get();

        return view('vendor.clients')->with('lists', $lists);
    }

    public function edit_client($id)
    {
        $client = User::find($id);

        return view('vendor.edit-client')->with(['client' => $client]);
    }

    public function update_client(Request $request, $id)
    {
        $client = User::find($id);

        $client->vendor_clients()->updateExistingPivot(auth()->guard('vendor')->user()->id, [
            'notes' => $request->notes,
            'fully_paid' => $request->$request->input('fully_paid')=='on' ? 1:0,
            'deposit_paid' => $request->$request->input('deposit_paid')=='on' ? 1:0
        ]);

        return back()->withMessage('You have successfully added notes to this client.');
    }

    public function report($id)
    {
        $profile = User::find($id);

        return view('vendor.report')->with(['profile' => $profile]);
    }

    public function submit_report(Request $request, $id)
    {
        $id = User::find($id);

        $id->vendor_reports()->attach(auth()->guard('vendor')->user()->id, [
            'subject' => $request['subject'],
            'report_type' => $request['report_type'],
            'report' => $request['report'],
            'status' => 'Unresolved'
        ]);

        return redirect('vendor.report')->withMessage('You have successfully submitted a report.');
    }

    public function view_profile($id)
    {
        $profile = User::find($id);

        return view('vendor.view')->with(['profile' => $profile]);
    }

}
