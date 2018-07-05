<!DOCTYPE html>
<html>
<head>
    <title>Invitation Email</title>
</head>
 
<body>
<h2>Title<b></b></h2>
{{$user->host_test_id}}
<br/>
<h3>Description</h3>
{{$user->email}}
<br>
	This is invitation mail to {{$user->email}} from recruiter.
	Click on link to accept invitation <a href="{{route('my_test')}}">Click Here</a>
</body>
 
</html>