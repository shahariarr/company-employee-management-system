<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'employee_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'contact_number',
        'email_address',
        'job_title',
        'current_company_name',
        'department',
        'manager_supervisor',
        'employment_start_date',
        'employment_type',
        'office_location',
    ];

    /**
     * Get the user that owns the employee profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Add other relationships and methods as necessary
}
