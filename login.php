<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            height:300px;
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

        .input:focus {
            background-color: #fff;
            box-shadow: 0 0 0 2px #cbd5e0;
        }

        .input:valid {
            border: 1px solid green;
        }

        .input:invalid {
            border: 1px solid rgba(14, 14, 14, 0.205);
        }

        .submit {
            background-color: #f9bc60;
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
<body>
<div data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
     <h1>Nursery Plant </h1>
</div>
    <div class="container">
    <img src="./images/Login (1).gif" alt="" class="image"> 
 <form class="form" method="post" action="" autocomplete="off">
     <label for="username" class="label">Username</label>
     <input type="text" id="username" name="username" required class="input">
     <label for="password" class="label">Password</label>
     <input type="password" id="password" name="password" required class="input">
     <input type="submit" class="submit">
     <p>Don't have an account? Click here</p>
     <a href="register.php" class="submit">Signup</a>
 </form>
    </div>
    <?php

require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM register WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $hashed_password = $user["password"];
            if (password_verify($password, $hashed_password)) {
                $_SESSION["username"]=$username;
                $_SESSION["user_id"] = $user["id"];
                header("Location: home.php");
                exit();
            } else {
                echo "<script>
                        swal({
                            title: 'Error!',
                            text: 'Invalid username or password.',
                            icon: 'error',
                            button: 'OK'
                        });
                      </script>";
            }
        } else {
            echo "<script>
                    swal({
                        title: 'Error!',
                        text: 'Invalid username or password.',
                        icon: 'error',
                        button: 'OK'
                    });
                  </script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
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


        AOS.init();
    </script>

</body>
</html>
