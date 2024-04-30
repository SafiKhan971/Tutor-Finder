<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tution Notification Email</title>
</head>
<body>

dd($mailData);
    

<h1> Hello {{ $mailData['tutor']->name}}</h1>
<p>Tution Title: {{ $mailData['tution']->title}}</p>
<p>Tutor Details: </p>

<p>Name: {{$mailData['user']->name}}</p>
<p>Email: {{ $mailData['user']->email}}</p>
<p>Mobile No: {{ $mailData['user']->mobile}}</p>
    
</body>
</html>