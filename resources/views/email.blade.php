<p>This is confirmation message from School.</p>
<p>We have succesully approved to {{ $data['name'] }}.</p>
<p>Have a nice day!<b class="ms-3">{{ $data['name'] }} 's {{ $data['parent_relationship'] }}.</b></p><br>

<h3>This is registered student's information.</h3><br>
<p>Name of Child : {{ $data['name'] }}</p>
<p>Birthday : {{ $data['dob'] }}</p>
<p>LRN or Student ID : {{ $data['std_id'] }}</p>
<p>Parent Name : {{ $data['parent_name'] }}</p>
<p>Parent Contact : {{ $data['parent_contact'] }}</p>
<p>Parent Email address : {{ $data['parent_email'] }}</p>
<p>Parent Relationship : {{ $data['parent_relationship'] }}</p>
<p>Status : {{ $data['status'] == '1' ? 'Approved' : 'Pending' }}</p>
