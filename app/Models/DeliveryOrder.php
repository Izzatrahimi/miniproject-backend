<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courier;
use App\Models\User;
use App\Models\DeliveryOrderDetails;

class DeliveryOrder extends Model
{
    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'sales_order_no', 'user_id', 'status', 'confirmation', 'delivery_order_date', 'tracking_no', 'courier_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Courier model
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

    // Define the relationship with the DeliveryOrderDetails model
    public function deliveryOrderDetails()
    {
        return $this->hasMany(DeliveryOrderDetails::class, 'delivery_order_id');
    }
}
