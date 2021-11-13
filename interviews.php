<?php
session_start();
if(!(isset($_SESSION["uname"]))){
    header('Location: http://localhost/Exalt-hackathon/signIn.php');
}
?>



<!Doctype html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>HR Interviews Scheduler</title>

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
                    <img src ='https://www.exalt-tech.com/asset/img/logo.svg' width="100px">
                </a>
                <a class="nav-link col-4 text-center" href="./index.php">Add an interview</a>
                <a class="nav-link col-4 text-center active" href="./interviews.php">Scheduled Interviews</a>
                <a class="nav-link col-4 text-center" href="./signOut.php">Sign out</a>
            </div>
        </div>
    </div>
</nav>


<div class="container" style="margin-top: 70px">


    <form method="post">
    
    <div class="input-group mb-3">
        <table class="table">
            <tbody>
                <tr>
                    <td>
                    <label for="date" value="Select a date">Select a date</label> 
                    </td>
                    <td>
                    <input type="date" name= "date" id= "date">
                    </td>
                    <td>
                    <input class="btn btn-dark" type="submit" name="submit">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    </form>      
          <table class="table">
                <thead class="text-center">
                <tr>
                    <th>Interviewer name</th>
                    <th>Interviewee name</th>
                    <th> Phone No. </th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Position</th>
                    <th>Room ID</th>
                    <th> Branch </th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($_POST["submit"])){
                        $db = new mysqli('localhost' , 'root' , '' , 'hackathon');
                        if(mysqli_connect_errno()){
                            echo 'no connection to database';
                        }    
                        $date = $_POST["date"];
                        $query = "select * from interview where int_date = '$date'";
                        $result = $db->query($query);
                        while($row = $result ->fetch_assoc()){ 
                            echo "<tr>";
                                 echo "<td>".$row["interviewer_name"]."</td>"; 
                                 echo "<td>".$row["interviewee"]."</td>"; 
                                 echo "<td>".$row["phonenumber"]."</td>"; 
                                 echo "<td>".$row["int_date"]."</td>"; 
                                 echo "<td>".$row["int_time"]."</td>"; 
                                 echo "<td>".$row["position"]."</td>"; 
                                 echo "<td>".$row["roomid"]."</td>"; 
                                 echo "<td>".$row["branch"]."</td></tr>"; 
                        }
                        
                    }
                    ?>
                </tbody>
            </table>
  

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>
