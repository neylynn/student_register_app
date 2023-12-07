<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Model\Doctor;
use App\Model\Qualify;
use App\Http\Requests\Admin\DoctorRequest;
use Flash;
use App\Http\Traits\QualifyTrait;
use App\Mail\ContactMail;
use App\Model\Student;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleEmail;
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

        // Mail::to('recipient@example.com')->send(new ContactMail());
        // Mail::to('kglay9533@example.com')->send(new ContactMail());
        // Mail::to($student['contact_email'])->send(new ContactMail($data));

        //send mail 
        // $student_info->verify_code = mt_rand(1000,9999);
        $data = array(
            'email' => $student['parent_email'],
            'parent_contact' => $student['parent_contact']
        );
        Mail::to($data['email'])->send(new ContactMail($data));
        // Session::put("verify_code", $student_info->verify_code);
        Flash::success('Successfully approved student and information will sent to registered email address');
        return redirect(route('student.index'));
    }
}
