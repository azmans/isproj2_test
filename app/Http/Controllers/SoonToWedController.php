<?php

namespace App\Http\Controllers;

use App\BudgetItem;
use DB;
use PDF;
use App\Budget;
use App\CouplePage;
use App\Guest;
use App\MealType;
use App\User;
use App\Vendor;
use App\Notifications\ReportVendor;
use App\Notifications\NewBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SoonToWedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:web','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $profiles = DB::table('soon_to_weds')
            ->select('bride_first_name', 'bride_last_name', 'wedding_date', 'groom_first_name', 'groom_last_name',
                'profile_picture')
            ->where('id', Auth::id())
            ->get();

        return view('dashboard')->with('profiles', $profiles);
    }

    public function edit_profile($id) {
        $profile = User::find($id);

        return view('auth.edit')->with(['profile' => $profile]);
    }

    public function update_profile(Request $request, $id) {
        $profile = User::find($id);

        $profile->bride_first_name = $request->bride_first_name;
        $profile->bride_last_name = $request->bride_last_name;
        $profile->groom_first_name = $request->groom_first_name;
        $profile->groom_last_name = $request->groom_last_name;
        $profile->wedding_date = $request->wedding_date;

        $profile->update(['bride_first_name' => $request->bride_first_name,
                            'bride_last_name' => $request->bride_last_name,
                            'groom_first_name' => $request->groom_first_name,
                            'groom_last_name' => $request->groom_last_name,
                            'wedding_date' => $request->wedding_date,
                        ]);
        return redirect('/dashboard')->withMessage('Your profile has been successfully saved.');
    }

    public function update_profile_picture(Request $request, $id)
    {
        $profile = User::find($id);

        if ($request->hasFile('profile_picture'))
        {
            $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $image_name = $profile->id.'_profile_picture'.time().'.'.request()->profile_picture->getClientOriginalExtension();

            $request->profile_picture->storeAs('images',$image_name);

            $profile->profile_picture = $image_name;

            $profile->update(['profile_picture' => $image_name]);

            return back()->withMessage('You have successfully updated your profile picture.');
        }
    }

    public function request($id)
    {
        $profile = Vendor::find($id);

        return view('auth.request')->with(['profile' => $profile]);
    }

    public function view_profile($id)
    {
        $profile = Vendor::find($id);

        return view('auth.view')->with(['profile' => $profile]);
    }

    public function save_vendor($id)
    {
        $vendor = Vendor::find($id);

        $vendor->soon_to_weds()->attach(Auth::id());

        return back()->withMessage('You have successfully saved this vendor.');
    }

    public function remove_vendor($id)
    {
        $vendor = Vendor::find($id);
        $vendor->soon_to_weds()->detach(Auth::id());

        return redirect()->route('auth.vendors')->withMessage('This vendor has been removed successfully.');
    }

    public function my_vendors()
    {
        $lists = DB::table('soon_to_wed_vendor')
            ->select(['soon_to_wed_vendor.id', 'vendors.id', 'vendors.company_name', 'vendors.price_range',
                'vendors.first_name', 'vendors.last_name', 'vendors.vendor_type'])
            ->join('vendors', 'vendors.id', '=', 'soon_to_wed_vendor.id')
            ->where('soon_to_wed_vendor.soon_to_wed_id', Auth::id())
            ->get();

        return view('auth.vendors')->with('lists', $lists);
    }

    public function book(Request $request, $id)
    {
        $vendor = Vendor::find($id);

        $vendor->soon_to_wed_bookings()->attach(Auth::id(), [
            'date' => $request['date'],
            'time' => $request['time'],
            'details' => $request['notes'],
            'cancel_date' => $request['cancel_date'],
            'status' => 'Pending'
        ]);


        $vendor->notify(new NewBooking());

        return back()->withMessage('You have successfully booked an appointment with this vendor.');
    }

    public function booking_list()
    {
        $lists = DB::table('bookings')
            ->select(['bookings.id', 'vendors.id', 'vendors.first_name', 'vendors.last_name', 'vendors.company_name',
                'vendors.mobile', 'vendors.vendor_type', 'bookings.date', 'bookings.time', 'bookings.details', 'bookings.status',
                'bookings.created_at'])
            ->join('vendors', 'vendors.id', '=', 'bookings.vendor_id')
            ->where('bookings.soon_to_wed_id', Auth::id())
            ->get();

        return view('auth.booking-requests')->with('lists', $lists);
    }

    public function report_vendor($id)
    {
        $profile = Vendor::find($id);

        return view('auth.report')->with(['profile' => $profile]);
    }

    public function submit_report(Request $request, $id)
    {
        $vendor = Vendor::find($id);

        $vendor->soon_to_wed_reports()->attach(Auth::id(), [
            'subject' => $request['subject'],
            'report_type' => $request['report_type'],
            'report' => $request['report'],
            'status' => 'Unresolved'
        ]);

        $vendor->notify(new ReportVendor());

        return redirect('auth.report')->withMessage('You have successfully submitted a report.');
    }

    public function budget_tracker()
    {
        $budgets = DB::table('soon_to_weds')
            ->select(['soon_to_weds.id', 'budgets.budget', 'budgets.spent', 'budgets.balance'])
            ->where('soon_to_weds.id', Auth::id())
            ->join('budgets', 'budgets.soon_to_wed_id', '=', 'soon_to_weds.id')
            ->get();

        $items = DB::table('budget_items')
            ->select(['budget_items.vendor_name', 'budget_items.vendor_type', 'budget_items.cost',
                'budget_items.is_paid', 'budget_items.budget_item', 'budget_items.notes'])
            ->join('budgets', 'budgets.id', '=', 'budget_items.budget_id')
            ->get();

        return view('auth.budget-tracker')->with(['budgets' => $budgets])->with(['items' => $items]);
    }

    public function add_budget($id)
    {
        $profiles = User::find($id);

        return view('auth.add-budget')->with(['profiles' => $profiles]);
    }

    public function edit_budget($id)
    {
        $profiles = User::find($id);

        return view('auth.edit-budget')->with(['profiles' => $profiles]);
    }

    public function update_budget(Request $request, $id) {
        $profile = User::find($id);

        $profile->budget = $request->budget;

        $profile->budgets()->update(['budget' => $request->budget]);
        return back()->withMessage('The new budget amount you inputted has been saved successfully.');
    }

    public function save_budget(Request $request, $id) {
        $profile = User::find($id);

        $budget = new Budget;
        $budget->budget = $request->budget;

        $profile->budgets()->save($budget);
        return back()->withMessage('The new budget amount you inputted has been saved successfully.');
    }

    public function add_item($id)
    {
        $profile = User::find($id);

        return view('auth.add-item')->with(['profile' => $profile]);
    }

    public function save_item(Request $request, $id)
    {
        $profile = User::find($id);

        $item = new BudgetItem();
        $item->budget_item = $request->budget_item;
        $item->vendor_name = $request->vendor_name;
        $item->vendor_type = $request->vendor_type;
        $item->cost = $request->cost;
        $item->is_paid = $request->input('is_paid')=='on' ? 1:0;
        $item->notes = $request->notes;

        $profile->budget_items()->save($item);
        return back()->withMessage('You have successfully added an item.');
    }

    public function edit_item($id)
    {
        $item = BudgetItem::find($id);

        return view('auth.edit-item')->with(['item' => $item]);
    }

    public function update_item(Request $request, $id)
    {
        $item = BudgetItem::find($id);

        $item->request = $request->budget_item;
        $item->request = $request->vendor_name;
        $item->request = $request->vendor_type;
        $item->request = $request->cost;
        $item->request = $request->is_paid;
        $item->request = $request->notes;

        $item->budgets_items()->update(['budget_item' => $request->budget_item,
                                        'vendor_name' => $request->vendor_name,
                                        'vendor_type' => $request->cost,
                                        'is_paid' => $request->input('is_paid')=='on' ? 1:0,
                                        'notes' => $request->notes]);
        return view('auth.budget-tracker')->withMessage('You have successfully edited this item.');
    }

    public function guestlist()
    {
        $details = DB::table('soon_to_weds')
            ->select(['soon_to_weds.id', 'guests.response_date', 'guests.first_name', 'guests.last_name',
                'guests.email', 'guests.plus_one', 'guests.allergy', 'guests.is_attending'])
            ->where('soon_to_weds.id', Auth::id())
            ->join('guests', 'guests.soon_to_wed_id', '=', 'soon_to_weds.id')
            ->get();

        return view('auth.guestlist')->with(['details' => $details]);
    }

    public function set_response_date($id)
    {
        $profiles = User::find($id);

        return view('auth.add-date')->with(['profiles' => $profiles]);
    }

    public function add_response_date(Request $request, $id)
    {
        $profile = User::find($id);

        $date = new Guest;
        $date->response_date = $request->response_date;

        $profile->guests()->save($date);
        return back()->withMessage('Your response date has been added successfully.');
    }

    public function edit_response_date($id)
    {
        $profiles = User::find($id);

        return view('auth.edit-date')->with(['profiles' => $profiles]);
    }

    public function update_response_date(Request $request, $id)
    {
        $profile = User::find($id);

        $profile->response_date = $request->response_date;

        $profile->guests()->update(['response_date' => $request->response_date]);
        return back()->withMessage('The new response date you inputted has been saved successfully.');
    }

    public function set_meal($id)
    {
        $profiles = User::find($id);

        return view('auth.add-meal')->with(['profiles' => $profiles]);
    }

    public function add_meal(Request $request, $id)
    {
        $profile = User::find($id);

        $meal = new MealType;
        $meal->meal_type = $request->meal_type;

        $profile->meal_types()->save($meal);
        return back()->withMessage('The new response date you inputted has been saved successfully.');
    }

    public function create_couple_page()
    {
        return view('auth.create-page');
    }

    public function save_couple_page(Request $request, $id)
    {
        $profile = User::find($id);

        $couple_page = new CouplePage;
        $couple_page->couple_page = $request->input('couple_page');

        $profile->couple_pages()->save($couple_page);

        //$pdf = PDF::loadView('auth.create-page', $couple_page);
        //return $pdf->download('couple-page.pdf')->withMessage('You have successfully created your couple page.');

        return back()->withMessage('Creation successful.');
    }

    public function paypal()
    {
        return view('auth.paypal');
    }
}
