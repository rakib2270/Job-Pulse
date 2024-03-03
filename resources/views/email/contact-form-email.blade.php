<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Emails</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .email {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        .email p {
            margin: 0;
            padding: 5px 0;
        }

        .email .subject {
            font-weight: bold;
            color: #333;
        }

        .email .date {
            color: #888;
            font-size: 12px;
        }
        .img {
            width: 50px;
            height: 50px;
        }
        .img image{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <?php

// Set the default timezone
    date_default_timezone_set('Asia/Dhaka');

// Get the current date and time in a specific format
    $currentDate = date('d/m/y ');
    $currentTime = date('h:i:s a');

    ?>

    <div class="img">
        <img src="{{public_path("/assets/images/jobpulse.png")}}" alt="Job Pulse" >
    </div>
    <div class="email">
        <h1>Email From Job Pulse Contact Form</h1>
        <p>Date: {{$currentDate}} At: {{$currentTime}}</p>
        <h5>Subject : {{ $mailData['subject'] }}</h5>
        <p>Name: {{ $mailData['name'] }}</p>

        <p>Phone: {{ $mailData['phone']}}</p>
        <p>Email: {{ $mailData['email']}}</p>
        <p>Message: {{ $mailData['message']}}</p>
    </div>

    <!-- Add more emails as needed -->

</div>

</body>
</html>
