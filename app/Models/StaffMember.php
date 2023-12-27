<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class StaffMember extends Model implements Authenticatable
{
    use AuthenticatableTrait;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staff_members';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'email';
     /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $fillable = [
        'staff_id',
        'username',
        'full_name',
        'gender',
        'job_title',
        'department',
        'address',
        'phone_number',
        'email',
        'password',
        'status',
        'register_date',
        'hospital_id',
    ];

    protected $casts = [
        'staff_id' => 'integer', 
        'username' => 'string',      
        'full_name' => 'string',    
        'gender' => 'string',       
        'job_title' => 'string',     
        'department' => 'string',    
        'address' => 'string',      
        'phone_number' => 'string',  
        'email' => 'string',        
        'password' => 'string',     
        'status' => 'string',
        ' register_date' => 'timestamp',        
        'hospital_id' => 'integer',
    ];
     
public $timestamps = false;

public static  $rules =[
    'name' => 'required',
    'username' => 'required|unique:staff_members,username',
    'email' => 'required|email|unique:staff_members,email',
    'address' => 'required',
    'phone' => 'required',
    'jobTitle' => 'required',
    'password' => 'required|confirmed',
    'password_confirmation' => 'required',
    'gender' => 'required',
    'department' => 'required',
    'hospital' => 'required'
];


}
