<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Traits\ManageFileUpload;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ManageFileUpload;


    public function getStatusSession($request){
        $status = $request->session()->get('status');
        Session::flash('status');

        return $status;
    }

    public function setStatusSession($status){
        Session::put('status', $status);
    }
}
