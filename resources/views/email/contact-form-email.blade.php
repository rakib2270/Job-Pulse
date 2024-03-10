<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website Emails</title>
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
            background-color: #495057;
            padding: 20px;
            border: 5px solid greenyellow;
            border-radius: 10px;
        }


        h2 {
            color: greenyellow;
        }

        h4 {
            color: greenyellow;
        }

        .email {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        .email p {
            color: whitesmoke;
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
        .email .link {
            color: #0ed300;
        }
        .img {
            width: 100%;
            height: 150px;
            border: 2px solid greenyellow;
            align-items: center;
        }
        .img image{
            width: 140px;
            height: 140px;
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


  <div class="container">
        <div class="img">

            <img class="image" src="{{ public_path('assets/images/jobpulse.png') }}" alt="Job Pulse">
        </div>
        <div class="email">
            <h2>From : Job Pulse Contact Form</h2>
            <p>Date : {{$currentDate}} At: {{$currentTime}}</p>
            <h4>Subject : {{ $mailData['subject'] }}</h4>
            <p>Name: {{ $mailData['name'] }}</p>

            <p>Phone : {{ $mailData['phone']}}</p>
            <p class="link" >Email : {{ $mailData['email']}}</p>
            <p>Message : {{ $mailData['message']}}</p>
        </div>
  </div>

</body>
</html>
