<?php
session_start();
if(!(isset($_SESSION["uname"]))){
    header('Location: http://localhost/Exalt-hackathon/signIn.php');
}



//insert to database
if(isset($_POST["submit"])) {
    $db = new mysqli('localhost' , 'root' , '' , 'hackathon');
    if(mysqli_connect_errno()){
        echo 'no connection to database';
    }
    echo "hi";
    $interviewer = $_POST["InterName"];
    $interviewee = $_POST["CandName"];
    $int_date = $_POST["Date"];
    $phone = $_POST["Tel"];
    $position = $_POST["Position"];
    $roomid = $_POST["Room"];
    $branch = $_POST["Branch"];
    $interview_time = $_POST["InterviewTime"];
    $query = "insert into interview (interviewer_name,interviewee,int_date,phonenumber,position,roomid,branch,int_time) values('$interviewer','$interviewee',
    '$int_date','$phone','$position',$roomid,'$branch','$interview_time')";
    echo $query;
    $query = $db->query($query);
    
}
?>


<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>HR Interviews Scheduler</title>
    <link rel="stylesheet" href="indexSheet.css">
</head>

<!--https://www.exalt-tech.com/asset/img/logo.svg-->

<nav class="navbar navbar-static-top fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="row collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-center" href="./index.php">
                    <img src='https://www.exalt-tech.com/asset/img/logo.svg' width="100px">
                </a>
                <a class="nav-link col-4 text-center active" href="./index.php">Add an interview</a>
                <a class="nav-link col-4 text-center" href="./interviews.php">Scheduled Interviews</a>
                <a class="nav-link col-4 text-center" href="./signOut.php">Sign out</a>

            </div>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 70px">
    <form method="post">
        <div class="input-group mb-3">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th colspan="2">Add a new interview</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center col-6">
                        <label for="InterName">Interviewer Name</label>
                    </td>
                    <td class="text-center col-6">
                        <input type="text" id="InterName" name="InterName" style="width: 50%" required
                               class="form-control" placeholder="Name">
                    </td>
                </tr>
                <tr>
                    <td class="text-center col-6">
                        <label for="Date">Date</label>
                    </td>
                    <td class="text-center col-6">
                        <input type="date" id="Date" name="Date" style="width: 50%" required
                               class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="text-center col-6">
                        <label for="InterviewTime">Time</label>
                    </td>
                    <td class="text-center col-6">
                        <input type="time" id="InterviewTime" name="InterviewTime" style="width: 50%" required
                               class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="text-center col-6">
                        <label for="Position">Position</label>
                    </td>
                    <td class="text-center col-6">
                        <select name="Position" id="Position" style="width: 50%" required class="form-control">
                            <option value="Back-End">Back-End</option>
                            <option value="Front-End">Front-End</option>
                            <option value="Software Engineer">Software Engineer</option>
                            <option value="QA">QA</option>
                            <option value="Design Verification">Design Verification</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-center col-6">
                        <label for="CandName">Candidate Name</label>
                    </td>
                    <td class="text-center col-6">
                        <input type="text" id="CandName" name="CandName" style="width: 50%" required
                               class="form-control" placeholder="Name">
                    </td>
                </tr>
                <tr>
                    <td class="text-center col-6">
                        <label for="Tel">Phone Number</label>
                    </td>
                    <td class="text-center col-6">
                        <input type="tel" id="Tel" name="Tel" style="width: 50%" required class="form-control"
                               placeholder="Phone">
                    </td>
                </tr>
                <tr>
                    <td class="text-center col-6">
                        <label for="Branch">Branch</label>
                    </td>
                    <td class="text-center col-6">
                        <select name="Branch" id="Branch" style="width: 50%" required class="form-control">
                            <option value="Ramallah">Ramallah</option>
                            <option value="Nablus">Nablus</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-center col-6">
                        <label for="Room">Room Number</label>
                    </td>
                    <td class="text-center col-6">
                        <input type="number" id="Room" name="Room" style="width: 50%" required class="form-control"
                               placeholder="1" min="1" max="2">
                    </td>
                </tr>
                <div class="input-group-append">
                    <tr>
                        <td colspan="2" class="text-center col-6">
                            <input class="btn btn-dark" name = "submit" type="submit"  style="width: 20%" value="Schedule">
                        </td>
                    </tr>
                </div>
                </tbody>
            </table>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>
