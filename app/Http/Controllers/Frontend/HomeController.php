<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Student;
class HomeController extends Controller
{
	public function register(Request $request)
    {
        $data = $request->all();
        try {
            Student::create($data);
            return redirect(url('/success'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

}
