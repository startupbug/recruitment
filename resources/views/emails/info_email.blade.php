<!DOCTYPE>
<html>
<head>
    <title>Info Email</title>
</head>
 
<body>
<h2>Title<b></b></h2>
{{$stored_info->title}}
<br/>
<h3>Info</h3>
{{$stored_info->info_description}}
<br>
	By {{$user_data['name']}}
</body>
 
</html>