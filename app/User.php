<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Http\Controllers\Controller as BaseController; 

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'dob',
        'profile_image',
        'address',
        'introduction',
        'country',
        'state',
        'city',
        'zip',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'status',
        'is_partner',
        'email_verified_at',
        'otp'
    ];

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function getFullAddressAttribute()
    {
        # code...
        $address[] = $this->city;
        $address[] = BaseController::getStates($this->country, $this->state)[$this->state];
        $address[] = BaseController::getCountry($this->country)[$this->country];
        return implode(', ', $address);
    }

    public function getCountryNameAttribute()
    {
        # code...
        if($this->country != '')
            $data = BaseController::getCountry($this->country)[$this->country];
        return ($data)??'';
    }

    public function getStateNameAttribute()
    {
        # code...
        if($this->country != '' && $this->state != '') {
            $data = BaseController::getStates($this->country, $this->state);
            $data = ($data)?$data[$this->state]:'';
        }
            
        return ($data)??'';
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getBusinessSlugAttribute()
    {
        if($this->business_id)
            return Business::where('id', $this->business_id)->first()->slug;
        else 
            return '';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function business()
    {
        return $this->hasOne(Business::class, 'user_id', 'id' );
    }

    public function getTotalProductAttribute()
    {
        # code...
        return Product::where('user_id', $this->id)->where('status', 1)->get()->count();
    }

    public function getImageAttribute($value)
    {
        # code...
        return isset($value)?asset('assets/users/'.$this->id.'/'.$value):asset('assets/users/demo.jpg');
    }

}
