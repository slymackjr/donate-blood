<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class BloodRequest extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blood_requests';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'request_id';
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

    protected $fillable = [
        'staff_email',
        'donor_email',
        'request_status',
        'request_date', 
    ];

    protected $casts = [
        'staff_email' => 'string',
        'donor_email' => 'string',
        'request_status' => 'string',
        'request_date' => 'string',
        
    ];
     
public $timestamps = false;
}
