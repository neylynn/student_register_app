<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Model\Doctor;
use App\Model\Qualify;
use App\Http\Requests\Admin\DoctorRequest;
use Flash;
use App\Http\Traits\QualifyTrait;
use App\Model\Student;
use Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    use QualifyTrait; //using trait

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->paginate(25);
        return view('admin.student.index', compact('students'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if(empty($student)){
            Flash::error('Student not found');
            return redirect(route('student.index'));
        }
        return view('admin.student.edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (empty($student)) {
            Flash::error('Student not found!');
            return redirect(route('student.index'));
        }
        $student->status = '1';
        $student->save();

        //send mail 
        $data = [
            'title' => 'Hello from Laravel',
            'content' => 'This is a test email sent from Laravel using Gmail.'
        ];
    
        Mail::send('email', $data, function($message) {
            $message->to('naylinnofficial@gmail.com', 'Recipient Name')
                    ->subject('Test Email');
        });

    	// $data = array(
    	// 	'email' => $student['parent_email'],
        //    	'name' => $student['name'],
        //     'inquiry_category' => $student['parent_contact'],
        //    	'message' => $student['parent_relationship']
       	// );

        // dd($student->parent_email);

        // Mail::to('EMAIL')->send(new ContactMail($data));
        // $response = [];
        // $response['status'] = TRUE;
        // return json_encode($response);
        Flash::success('Successfully approved student and information will sent to registered email address');
        return redirect(route('student.index'));
    }
}
