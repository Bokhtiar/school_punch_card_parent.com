<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body class="">

    <div class="my-2 d-flex justify-content-between align-items-center shadow bg-white p-3 rounded">
        <h4><i class="bi bi-person-lines-fill"></i> Punch Card Monitor</h4>
        <a class="btn btn-primary" href="@route('/')"> <i class="ri-file-list-2-line"></i> Back to dashboard</a>
    </div>

    <div id="punch-card-info" class="mx-2 my-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="guardian-section" class="rounded" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
                    <h5>Guardian Information</h5>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div id="guardian-photo" style="margin-bottom: 10px;">
                                <img id="guardian-image" src="" alt="Guardian Photo"
                                    style="width: 200px; height: 200px; border-radius: 50%;">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8 my-auto">
                            <p id="guardian-name"></p>
                            <p id="guardian-email"></p>
                            <p id="guardian-phone"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div id="student-section" class="rounded" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
                    <h5>Student Information</h5>

                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div id="student-photo" style="margin-bottom: 10px;">
                                <img id="student-image" src="" alt="Student Photo"
                                    style="width: 200px; height: 200px; border-radius: 50%;">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8 my-auto">
                            <p id="student-name"></p>
                            <p id="student-class"></p>
                            <p id="student-roll-no"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Punch Information Section -->
        <div class="row">
            <div class="col-md-12 col-md-2">
                <div id="punch-section" class="rounded" style="border: 1px solid #ccc; padding: 10px;">
                    <h5>Punch Information</h5>
                    <p id="punch-time"></p>
                </div>
            </div>
        </div>
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

            // Update Guardian Info with fallback to a default image
            const guardianPhoto = data.guardian.profile_pic ? data.guardian.profile_pic :
                '/images/default_guardian.png'; // Provide default image if null
            document.getElementById('guardian-image').src = guardianPhoto;
            document.getElementById('guardian-name').innerHTML = '<strong>Guardian:</strong> ' + data.guardian.name;
            document.getElementById('guardian-email').innerHTML = '<strong>Email:</strong> ' + data.guardian.email;
            document.getElementById('guardian-phone').innerHTML = '<strong>Phone:</strong> ' + data.guardian.phone;

            // Update Student Info with fallback to a default image
            const studentPhoto = data.student.profile_pic ? data.student.profile_pic :
            '/images/default_student.png'; // Provide default image if null
            document.getElementById('student-image').src = studentPhoto;
            document.getElementById('student-name').innerHTML = '<strong>Student:</strong> ' + data.student.name;
            document.getElementById('student-class').innerHTML = '<strong>Class:</strong> ' + data.student.class;
            document.getElementById('student-roll-no').innerHTML = '<strong>Roll No:</strong> ' + data.student
                .roll_no;

            // Update Punch Info
            document.getElementById('punch-time').innerHTML = '<strong>Punch Time:</strong> ' + data.punch
                .punch_time;

        });
    </script>

</body>

</html>
