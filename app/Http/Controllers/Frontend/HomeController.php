<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Blog;
use App\Model\Location;
use App\Model\Whyus;
use App\Model\Doctor;
use App\Model\Service;

class HomeController extends Controller
{
	public function success()
    {
        return view('frontend.success');
    }

}
