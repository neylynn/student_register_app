<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Flash;
use App\Mail\ContactMail;
use App\Model\Student;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
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
        $students = Student::orderBy('id', 'DESC')->where('status', 0)->paginate(15);
        return view('admin.student.index', compact('students'));
    }

    public function create()
    {
        $students = Student::orderBy('id', 'DESC')->where('status', 1)->paginate(15);
        return view('admin.student.create', compact('students'));
    }

    public function download()
    {
        $students = Student::where('status', 1)->get();
        $result_array = [];
        foreach($students as $student){
            $name = $student->name;
            $dob = $student->dob;
            $std_id = $student->std_id;
            $parent_name = $student->parent_name;
            $parent_contact = $student->parent_contact;
            $parent_email = $student->parent_email;
            $parent_relationship = $student->parent_relationship;
            $status = $student->status == '1' ? 'Approved' : 'Pending';

            $data = [
                $name,
                $dob,
                $std_id,
                $parent_name,
                $parent_contact,
                $parent_email,
                $parent_relationship,
                $status
            ];
            array_push($result_array, $data);
        }
        
        return Excel::download(new \App\Exports\DataExport(json_decode(json_encode($result_array), true)), 'main_student_report.xlsx');
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

    public function update($id)
    {
        $student = Student::find($id);
        if (empty($student)) {
            Flash::error('Student not found!');
            return redirect(route('student.index'));
        }
        $student->status = '1';
        $student->save();

        //send email to parent
        $mail_data = array(
            'name' => $student['name'],
            'dob' => $student['dob'],
            'std_id' => $student['std_id'],
            'parent_name' => $student['parent_name'],
            'parent_contact' => $student['parent_contact'],
            'parent_email' => $student['parent_email'],
            'parent_relationship' => $student['parent_relationship'],
            'status' => $student['status']
        );
        Mail::to($mail_data['parent_email'])->send(new ContactMail($mail_data));
        Flash::success('Successfully approved student and information will send to registered email address');
        return redirect(route('student.index'));
    }
}
