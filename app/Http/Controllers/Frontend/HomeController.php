<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Student;
use App\Mail\PrincipalMail;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
	public function register(Request $request)
    {
        $data = $request->all();
        try {
            Student::create($data);
            //send email to principal
            $mail_data = array(
                'name' => $data['name'],
                'dob' => $data['dob'],
                'std_id' => $data['std_id'],
                'parent_name' => $data['parent_name'],
                'parent_contact' => $data['parent_contact'],
                'parent_email' => $data['parent_email'],
                'parent_relationship' => $data['parent_relationship']
            );
            Mail::to($mail_data['parent_email'])->send(new PrincipalMail($mail_data));
            return redirect(url('/success'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

}
