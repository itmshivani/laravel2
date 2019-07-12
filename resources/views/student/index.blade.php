@extends("student.layout.master")

@section("title","student application | listing")

@section("body")

<div class=" panel panel-default">
<div class="panel-heading">
student list
<a href="{{url('student/create')}} " class="btn btn-success pull-right b">
+add student
</a>
</div>
<div class="panel-body">
<table class="table">
<thead>
<tr>
<th>Sr No</th>
<th>Name</th>
<th>email</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1;?>
@foreach($students as $student)
<tr>
<td>{{ $i++ }}</td>
<td>{{ $student->name }}</td>
   <td>{{ $student->email }}</td>
                 
                    <td>
                    <a href="{{url('student/'.$student->id.'/edit')}}" class="btn btn-info">Edit</a>
                    <form action="/student/{{$student->id}}" method="post" class="pull-right">
                    {{csrf_field()}}
                    {{method_field("DELETE")}}
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
</tr>
@endforeach
@endsection

</tbody>
</table>
</div>
</div>

