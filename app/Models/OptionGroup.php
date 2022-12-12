<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionGroup extends Model
{
    use HasFactory;

    protected $primaryKey = "opg_id";

    public function options(){
        return $this->hasMany('App\Models\Option','opt_group_id');
    }

    public function optionsInclude(){
        return $this->hasMany('App\Models\Option','opt_group_id')->wherein('opt_id', [1,2]);
    }

    public function optionsInclude1(){
        return $this->options()->wherein('opt_id', [1,2])->orderby('opt_name','desc');
    }

}
