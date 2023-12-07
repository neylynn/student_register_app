@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Approve Student
        </h1>
        <span class="breadcrumb"><a href='{{ route("student.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To student</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                {!! Form::model($student, ['route' => ['student.update', $student->id], 'method' => 'patch']) !!}
                <div class="container">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Name of Child</th>
                            <th>Birthday</th>
                            <th>LRN or Student ID</th>
                            <th>Parent Name</th>
                            <th>Parent Contact</th>
                            <th>Parent Email address</th>
                            <th>Parent Relationship</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{!! $student->name !!}</td>
                            <td>{!! $student->dob !!}</td>
                            <td>{!! $student->std_id !!}</td>
                            <td>{!! $student->parent_name !!}</td>
                            <td>{!! $student->parent_contact !!}</td>
                            <td>{!! $student->parent_email !!}</td>
                            <td>{!! $student->parent_relationship !!}</td>
                            <td>{!! $student->status == '0' ? 'Pending' : 'Approved' !!}</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="{!! route('student.index') !!}" class="btn btn-danger">Cancel</a>
                    {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
               </div>
           </div>
       </div>
   </div>  
@endsection