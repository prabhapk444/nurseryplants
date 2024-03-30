<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        main {
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            margin: 20px auto;
            max-width: 600px;
            background-color: #fff;
            overflow: hidden;
        }

        h1 {
            color: #343a40;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
            color: #343a40;
            font-weight: bold;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .star-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 24px;
            color: #ddd;
            cursor: pointer;
            margin: 0 5px;
        }

        .star-rating input:checked ~ label,
        .star-rating input:checked ~ label ~ label {
            color: #ffcc00;
        }

        
        .video-container {
    position: relative;
    width: 100%;
    padding-top: 56.25%; 
    overflow: hidden;
    margin-top: 20px;
    border-radius: 10px; 

}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 10px; 
}

        
    </style>
</head>
<body>
    <?php
    require("header.php");
    ?>
    <?php
    require("db.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $command = mysqli_real_escape_string($conn, $_POST['command']);
        $rating = isset($_POST['rating']) ? intval($_POST['rating']) : null;

        $insertQuery = "INSERT INTO user_reviews (name, email, command, ratings) 
                        VALUES ('$name', '$email', '$command', '$rating')";

        if ($conn->query($insertQuery) === TRUE) {
          
            echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Review submitted successfully!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "home.php";
                    });
                 </script>';
        } else {
            echo "Error submitting review: " . $conn->error;
        }

        $conn->close();
    }
    ?>
    <h1> Review</h1><br>    
    <center>
        <h1> Nursery Plant</h1>
    </center><br>
    <div class="video-container">
        <iframe src="./images/nurserylive.mp4" frameborder="0" allowfullscreen></iframe>
    </div><br><br>

    <main>
        
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="command">Command:</label>
            <input type="text" id="command" name="command" required>

            <div class="star-rating">
                <label for="rating">Rating:</label>
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1">&#9733;</label>
            </div>

            <input type="submit" value="Submit Review" class="btn btn-success">
        </form>
    </main>

    <br><br><br>
   
    <?php
    require("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
