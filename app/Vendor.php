<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    protected $table = 'vendors';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type', 'first_name', 'last_name', 'email', 'password', 'mobile', 'company_name', 'vendor_type', 'price_range',
        'tin', 'sec_dti_number', 'mayors_permit', 'city', 'profile_picture', 'approved_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_type', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function soon_to_weds()
    {
        return $this->belongsToMany('App\User', 'soon_to_wed_vendor',
            'vendor_id', 'soon_to_wed_id')
            ->withTimestamps();
    }

    public function soon_to_wed_bookings()
    {
        return $this->belongsToMany('App\User', 'bookings',
            'vendor_id', 'soon_to_wed_id')->withPivot('date', 'time', 'details',
                'cancel_date', 'status')
            ->withTimestamps();
    }

    public function soon_to_wed_clients()
    {
        return $this->belongsToMany('App\User', 'my_clients', 'vendor_id',
            'soon_to_wed_id')->withPivot('notes', 'fully_paid', 'deposit_paid')
            ->withTimestamps();
    }

    public function soon_to_wed_reports()
    {
        return $this->belongsToMany('App\User', 'reports', 'vendor_id',
            'soon_to_wed_id')->withPivot('subject', 'report_type', 'report', 'status')
            ->withTimestamps();
    }

    public function soon_to_wed_budget_items()
    {
        return $this->belongsToMany('App\User', 'budget_items', 'soon_to_wed_id',
            'vendor_id')->withPivot('budget_item', 'cost', 'is_paid', 'notes')
            ->withTimestamps();
    }
}
