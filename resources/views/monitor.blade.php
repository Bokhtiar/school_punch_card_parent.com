<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian Information</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body>
    <h1>Punch Card Monitor
    </h1>
    <a href="@route('/')">Back to dashboard</a>


    {{-- <section>
        <div id="guardian-info"></div>
        <div id="student-info"></div>
        <div id="punch-time"></div>
    </section> --}}

    <div id="punch-card-info">
        <!-- Guardian Information Section -->
        <div id="guardian-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
            <h3>Guardian Information</h3>
            <div id="guardian-photo" style="margin-bottom: 10px;">
                <img id="guardian-image" src="" alt="Guardian Photo"
                    style="width: 100px; height: 100px; border-radius: 50%;">
            </div>
            <p id="guardian-name"></p>
            <p id="guardian-relation"></p>
        </div>

        <!-- Student Information Section -->
        <div id="student-section" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
            <h3>Student Information</h3>
            <div id="student-photo" style="margin-bottom: 10px;">
                <img id="student-image" src="" alt="Student Photo"
                    style="width: 100px; height: 100px; border-radius: 50%;">
            </div>
            <p id="student-name"></p>
            <p id="student-class"></p>
            <p id="student-roll-no"></p>
        </div>

        <!-- Punch Information Section -->
        <div id="punch-section" style="border: 1px solid #ccc; padding: 10px;">
            <h3>Punch Information</h3>
            <p id="punch-time"></p>
        </div>
    </div>


    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('532ab25d1a0498eebaf4', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('card-punches');
        channel.bind('card.punched', function(data) {
            console.log("Data received:", data);
            // document.getElementById('guardian-info').innerHTML = 'Guardian: ' + data.guardian.name;
            // document.getElementById('student-info').innerHTML = 'Student: ' + data.student.name;
            // document.getElementById('punch-time').innerHTML = 'Punch Time: ' + data.punch.punch_time;


            // Check and log student photo URL
    console.log("Student Photo URL:", data.student.profile_pic);

    // Update Guardian Info
    document.getElementById('guardian-image').src = data.guardian.profile_pic; // Assuming you have guardian's photo URL
    document.getElementById('guardian-name').innerHTML = 'Guardian: ' + data.guardian.name;
    document.getElementById('guardian-relation').innerHTML = 'Relation: ' + data.guardian.relation;

    // Update Student Info with fallback to default image
    const studentPhoto = data.student.profile_pic ? data.student.profile_pic : '/images/default_student.png'; // Provide default image
    document.getElementById('student-image').src = studentPhoto;
    document.getElementById('student-name').innerHTML = 'Student: ' + data.student.name;
    document.getElementById('student-class').innerHTML = 'Class: ' + data.student.class;
    document.getElementById('student-roll-no').innerHTML = 'Roll No: ' + data.student.roll_no;

    // Update Punch Info
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
