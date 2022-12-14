<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends BaseModel
{
    protected $primaryKey = "inv_id";

    protected $dates = ['created_at', 'updated_at','deleted_at','inv_date'];

    public function currency(){
        return $this->belongsTo('App\Models\Currency','inv_currency')->withDefault();
    }

    public function status(){
        return $this->belongsTo('App\Models\Option','inv_status')->withDefault();
    }

    public function paymentMethod(){
        return $this->belongsTo('App\Models\Option','inv_payment_method')->withDefault();
    }

    public function getInvoiceNumberAttribute(){
        return $this->inv_number;
    }

    public function getInvoiceDateAttribute(){
        return $this->inv_date->format("Y-m-d");
    }


}
