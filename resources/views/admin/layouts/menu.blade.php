@if(Auth::user()->role == 'principal')
<li class="{{ Request::is('student*') ? 'active' : '' }}">
    <a href="{{ route('student.index') }}"><i class="fa fa-edit"></i><span>Pending Students</span></a>
</li>
@endif

<li class="{{ Request::is('student*') ? 'active' : '' }}">
    <a href="{{ route('student.create') }}"><i class="fa fa-edit"></i><span>Main Students</span></a>
</li>
