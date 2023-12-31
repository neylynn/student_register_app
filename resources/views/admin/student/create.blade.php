@extends('admin.layouts.app')

@section('content')
    <form  method="post" class="form-inline" action="{{ url('admin/student/download') }}">
    {{ csrf_field() }}
    <section class="content-header">
        <h1>
            Main Students
        </h1>
        <span class="breadcrumb">
            <input type="submit" class="btn btn-sm btn-primary" value="Export Student Records">
        </span>                 
    </section>
    </form>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        @include('flash::message') 
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($students->isEmpty())
                    <div class="well text-center">No records were found.</div>
                @else
                    <table class="table table-striped table-hover tbl_repeat" id="sortable">
                        <thead>
                            <th>No.</th>
                            <th>Name of Child</th>
                            <th>Birthday</th>
                            <th>LRN or Student ID</th>
                            <th>Parent Name</th>
                            <th>Parent Contact</th>
                            <th>Parent Email address</th>
                            <th>Parent Relationship</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                        <?php $index = 1; ?>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->dob }}</td>
                                <td>{{ $student->std_id }}</td>
                                <td>{{ $student->parent_name }}</td>
                                <td>{{ $student->parent_contact }}</td>
                                <td>{{ $student->parent_email }}</td>
                                <td>{{ $student->parent_relationship }}</td>
                                <td>{{ $student->status == '0' ? 'Pending' : 'Approved' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $students->appends($_GET)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection