<!DOCTYPE html>
<html>
<head>
    <title>New blog added in website : {{$website->name}}</title>
</head>
<body>

<center>
    <h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
        <a href="{{$website->url}}">New blog added in website : {{$website->name}}</a>
    </h2>
</center>

<p>Hi, {{$subscriber->first_name}}</p>
<h3>{{$blog->title}}</h3>
<p>{{$blog->description}}</p>
</body>
</html>
