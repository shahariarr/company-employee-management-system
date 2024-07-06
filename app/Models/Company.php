<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'company_name',
        'logo',
        'tagline',
        'about',
        'industry',
        'founded_date',
        'headquarters_location',
        'number_of_employees',
        'website_url',
        'email_address',
        'phone_number',
        'address',
        'linkedin',
        'twitter',
        'facebook',
        'overview',
        'history',
        'core_values',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'company_id');
    }
}
