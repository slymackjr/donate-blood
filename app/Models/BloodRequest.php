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
        'requester_name',
        'requester_contact',
        'blood_type',
        'units_requested',
        'request_status',
        'request_date',
        'staff_email',
        'donor_email',
    ];

    protected $casts = [
        'requester_name' => 'string',
        'requester_contact' => 'string',
        'blood_type' => 'string',
        'units_requested' => 'integer',
        'request_status' => 'string',
        'request_date' => 'string',
        'staff_email' => 'string',
        'donor_email' => 'string',
    ];
     
public $timestamps = false;
}
