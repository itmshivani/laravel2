@extends("student.layout.master")

@section("title","student Application"  | 'Listing')

@section("body")

<div class="panel panel-primary">
<div class="panel-heading">
student
<a href="{{url ('student')}}"  class="btn btn-info pull-right b"> back</a>

</div>
<div class="panel-body">
<form action="/student" method="post" enctype="multipart/form-data">
{{csrf_field()}}
@section("editmethod")
@show
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" value="@yield('studentName')"
class="form-control" id="name">
</div>


<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" value="@yield('studentemail')"
class="form-control" id="email">

</div>
<div class="form-group">
<label for="image">Image Upload</label>
<input type="file" name="image" value="@yield('studentimage')"
class="form-control" id="image">

</div>

<button type="submit" class="btn btn-success">submit</button>
</form>
</div>
</div>

@endsection
