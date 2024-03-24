<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color:#fffffe;
           
        }
        .container {
    display: flex;
    align-items: center;
    align-self:middle;
    justify-content:center;
    
}

        .form {
            max-width: 340px;
            width: 100%;
            display: flex;
            flex-direction: column;
           
            padding: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            text-align: center;
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
            color: #272343;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration:none;
            transition: all 0.2s ease-in-out;
        }
      
        .form p {
            color: #2b2c34; 
            margin-top: 10px; 
            font-weight:bold;
        }
        
       
        h2 {
    margin-left: 60px;
    text-align:center;
    justify-content:center;
}

    </style>
</head>
<body>
    <h2>create an acccout to continue</h2>
    <div class="container">
    <form class="form" method="post" action="">
        <label for="username" class="label">Username</label>
        <input type="text" id="username" name="username" required class="input">
        <label for="password" class="label">Password</label>
        <input type="password" id="password" name="password" required class="input">
        <label for="password" class="label">Email</label>
        <input type="email" id="password" name="email" required class="input">
        <label for="password" class="label">Address</label>
        <textarea name="addresss" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" class="submit">
        <p>Already have an account? Click here</p>
        <a href="login.php" class="submit">Signup</a>
    </form>
    </div>
    <?php
require("db.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['addresss'];

    $check_query = "SELECT * FROM register WHERE Username='$name' OR email='$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $username_taken = false;
        $email_taken = false;

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Username'] === $name) {
                $username_taken = true;
            }
            if ($row['email'] === $email) {
                $email_taken = true;
            }
        }

        if ($username_taken && $email_taken) {
            echo "<script>
                    swal('Error', 'Username and Email are already taken', 'error').then(function() {
                        window.location = 'register.php';
                    });
                  </script>";
        } elseif ($username_taken) {
            echo "<script>
                    swal('Error', 'Username is already taken', 'error').then(function() {
                        window.location = 'register.php';
                    });
                  </script>";
        } elseif ($email_taken) {
            echo "<script>
                    swal('Error', 'Email is already taken', 'error').then(function() {
                        window.location = 'register.php';
                    });
                  </script>";
        }
    } else {
      
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO register (Username, password, email, address) VALUES ('$name', '$hashedPassword', '$email', '$address')";
        
        if (mysqli_query($conn, $query)) {
          
            header("Location: login.php");
            exit();
        } else {
            echo "Error in database query: " . mysqli_error($conn);
        }
    }
}
?>





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
