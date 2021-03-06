<?php 
    session_start();
    $db = new mysqli('localhost' , 'root' , '' , 'hackathon');
    if(mysqli_connect_errno()){
        echo 'no connection to database';
    }
    if(isset($_POST["uname"])){
        $query = "select * from hr_info where username = '".$_POST["uname"]."'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
              if($row["password"] == $_POST["psw"]) {
                  $_SESSION["uname"] = $_POST["uname"];
                    header('Location: http://localhost/Exalt-hackathon/index.php');
                }
        
        }
?>
<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h2>HR Intrview Scheduler</h2>
    <form method="post">
        <div class="imgcontainer">
            <img src="images/Capture.PNG" alt="Avatar" class="avatar" width="50px" height="100px">
        </div>

        <div class="container">
            <label for="usernameTextId"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required id="usernameTextId">

            <label for="passwordTextId"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required id="passwordTextId">
            <button type="submit">Login</button>
        </div>


    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<script src="JS/signInAction.js"></script>
</body>

</html>