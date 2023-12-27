<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Hospital extends Model implements Authenticatable
{
    use AuthenticatableTrait;
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hospitals';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'hospital_id';
     /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospital_name',
        'hospital_address',
        'contact_number',
        'email',
        'registration_date',
    ];

    protected $casts = [
        'hospital_id' => 'integer',
        'hospital_name' => 'string',
        'hospital_address' => 'string',
        'contact_number' => 'string',
        'email' => 'string',
        'registration_date' => 'timestamp',
    ];
     
public $timestamps = false;
}
