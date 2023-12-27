<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class BloodDonor extends Model implements Authenticatable
{
    use AuthenticatableTrait;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blood_donor_users';
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
    protected $fillable  = [
        'donor_id', 
        'username',      
        'full_name',    
        'gender',       
        'blood_type',     
        'address',    
        'phone_number',      
        'birthdate',  
        'email',        
        'password',     
        'status',        
        'register_date', 
    ];

    protected $casts  = [
        'donor_id' => 'integer', 
        'username' => 'string',      
        'full_name' => 'string',    
        'gender' => 'string',       
        'blood_type' => 'string',     
        'address' => 'string',    
        'phone_number' => 'string',      
        'birthdate' => 'string',  
        'email' => 'string',        
        'password' => 'string',     
        'status' => 'string',        
        'register_date' => 'timestamp', 
    ];

    public $timestamps = false;
}
