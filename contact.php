<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }
        .container {
    display: flex;
    justify-content: center;
    gap:90px;
  
    
}


        body {
            background-color:#fffffe;
            
        }

        .form {
         
            max-width: 320px;
            width: 100%;
            height:500px;
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
            background-color:#f9bc60 ;
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
<?php

  require_once("header.php")
?><br><br><br><br><br>
     <h1>Contact us</h1>
    <div class="container">
    <img src="./images/Contact us (2).gif" alt="" class="image"> 
 <form class="form" method="post" action="home.php" autocomplete="off" onsubmit="submitForm(event)">
     <label for="username" class="label">Fullname</label>
     <input type="text" id="username" name="username" required class="input">
     <label for="email" class="label">email</label>
     <input type="email" id="email" name="email" required class="input">
     <label for="number" class="label">Number</label>
     <input type="number" id="number" name="number" required class="input">
     <label for="address" class="label">address</label>
     <input type="text" id="address" name="address" required class="input">
     <label for="message" class="label">Message</label>
     <textarea name="message" id="message" cols="30" rows="10"></textarea><br>
     <input type="submit" class="submit">
 </form>
    </div><br>
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

        function submitForm(event) {
        event.preventDefault();

       
        var fullname = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var address = document.getElementById('address').value;

        if (fullname && email && address) {
           
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Thanks for your support!',
            });

           
        } else {
            
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all fields!',
            });
           
        }
        

    }

    </script>

</body>
<?php
 include("footer.php");
?>
</html>
