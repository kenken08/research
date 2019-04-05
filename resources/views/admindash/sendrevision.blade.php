<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <p>Central Mindanao University</p>
            <p>Research and Extension Office</p>
        </div>
        <h4>Hi {{$fullname}},</h4>
        @foreach($lahini as $lahi)
            <h3>Research Title: {{$lahi->title}}</h3>
        @endforeach
        <h5>We would like to update you that your Undergraduate Proposal <strong style="color:red;">NEEDS REVISION</strong></h5>
        <p><strong>Comment: {{$feed}}</strong></p>
        <p class="text-justify">Download this file: <a target="_blank" href="http://localhost:8000/guidelines/{{$filepath}}">Guidelines for Thesis</a></p>
    
        <p class="text-justify">The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</p>
    </div>
</body>
</html>