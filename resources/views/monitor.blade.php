<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian Information</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
    <h1>Punch Card Monitor</h1>
    <div id="guardian-info"></div>
    <div id="student-info"></div>
    <div id="punch-time"></div>

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('532ab25d1a0498eebaf4', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('card-punches');
    channel.bind('card.punched', function(data) {
        console.log("Data received:", data);
        document.getElementById('guardian-info').innerHTML = 'Guardian: ' + data.guardian.name;
        document.getElementById('student-info').innerHTML = 'Student: ' + data.student.name;
        document.getElementById('punch-time').innerHTML = 'Punch Time: ' + data.punch.punch_time;
    });
</script>

{{-- <script>
    var pusher = new Pusher('532ab25d1a0498eebaf4', {
        cluster: 'ap2' 
    });

    var channel = pusher.subscribe('card-punches');
    channel.bind('card.punched', function(data) {
        console.log("Data received:", data);
        document.getElementById('guardian-info').innerHTML = 'Guardian: ' + data.guardian.name;
        document.getElementById('student-info').innerHTML = 'Student: ' + data.student.name;
        document.getElementById('punch-time').innerHTML = 'Punch Time: ' + data.punch.punch_time || 'No Punch Time Available';
    });
</script> --}}


</body>
</html>
