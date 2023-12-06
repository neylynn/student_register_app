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
                  <!-- {!! Form::model($student, ['route' => ['student.update', $student->id], 'method' => 'patch', 'files' => 'true']) !!}
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                    
                  <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('student.index') !!}" class="btn btn-default">Cancel</a>
                 </div>
                {!! Form::close() !!} -->
                {!! Form::model($student, ['route' => ['student.update', $student->id], 'method' => 'patch']) !!}
                <div class="container">
                    <!-- <h2>Small Table</h2> -->
                    <!-- <p>The .table-sm class makes the table smaller by cutting cell padding in half:</p> -->
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
                    

                <!-- <div class="form-group col-sm-12"> -->
                        
                        <a href="{!! route('student.index') !!}" class="btn btn-danger">Cancel</a>
                        {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}
                 <!-- </div> -->
                
                </div>
                {!! Form::close() !!}

               </div>
           </div>
       </div>
   </div>  
@endsection