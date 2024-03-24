<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }
        .container {
    display: flex;
    justify-content: center;
  
    
}


        body {
            background-color:#fffffe;
            
        }

        .form {
         
            max-width: 320px;
            width: 100%;
            height:230px;
            padding: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            text-align: center;
            align-self:center;
            transition: background-color 0.5s ease-in-out, border 0.5s ease-in-out;
            border: 2px solid white;
        }

       

        .label {
            color: #2b2c34;
            margin-bottom: 4px;
            text-align:left;
            font-weight:bold;
        }

        .input {
            padding: 10px;
            margin-bottom: 20px;
            width: 90%;
            font-size: 1rem;
            color: #4a5568;
            outline: none;
            border: 1px solid transparent;
            border-radius: 4px;
            transition: all 0.2s ease-in-out;
        }

        .input:valid {
            border: 1px solid green;
        }

        .input:invalid {
            border: 1px solid rgba(14, 14, 14, 0.205);
        }

        .submit {
            background-color:#f9bc60;
            color: #001e1d;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }
        .form p {
            color:#2b2c34; 
            margin-top: 10px; 
            font-weight:bold;
        }
        h1 {
 
    text-align:center;
}
@media screen and (max-width: 992px) {
  .container {
    display:flex;
    flex-direction:column;
    margin-left:20px;
    width:80%;
  }
     img{
        width:100%;
          
     }
     .form{
        align-self:center;
        
     }
}
    </style>
</head>
<body>
     <h1>Admin Login page</h1>
    <div class="container">
    <img src="./../images/Admin.gif" alt="i" class="image"> 
 <form class="form" method="post" action="" autocomplete="off">
     <label for="username" class="label">Username</label>
     <input type="text" id="username" name="username" required class="input">
     <label for="password" class="label">Password</label>
     <input type="password" id="password" name="password" required class="input">
     <input type="submit" class="submit">
 </form>
    </div>
    <?php
    session_start();
    include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        echo "<script>alert('sucess');</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>";
        exit;
    } else {
      
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
</body>
<script>
        setInterval(function() {
            document.querySelectorAll('.form').forEach(function(form) {
                form.style.borderColor = getRandomColor();
            });
        }, 2000);

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>

</body>
</html>
