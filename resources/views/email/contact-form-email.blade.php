<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Notification Email</title>
</head>
<body>
    <h1>Subject :  {{ $mailData['subject'] }}</h1>

    <p>Name: {{ $mailData['name'] }}</p>

    <p>Phone: {{ $mailData['phone']}}</p>
    <p>Email: {{ $mailData['email']}}</p>
    <p>Message: {{ $mailData['message']}}</p>

</body>
</html>
