<?php

namespace App\Http\Controllers;

use App\Announcement;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller {
	public function index()
    {        
    	return view('contents-admin.index');
    }

    public function emailconfiguration()
    {        
    	return view('contents-admin.emailconfiguration');
    }

    public function emailtemplate()
    {        
    	return view('contents-admin.emailtemplate');
    }

    public function emailtemplatedetail()
    {        
    	return view('contents-admin.emailtemplatedetail');
    }
}