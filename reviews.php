<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }

        main {
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 20px auto;
            max-width: 600px;
            background-color: #fff;
            overflow: hidden;
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
            width: 100%;
            text-align: center;
        }

        input, textarea {
            width: 90%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        .star-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

       
        .star-rating label:hover,
        .star-rating input:checked ~ label,
        .star-rating input:checked ~ label ~ label {
            color: #ffcc00;
            transform: scale(1.2); 
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-top: 56.25%; 
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
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

        .btn {
            padding: 12px 25px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            main {
                padding: 15px;
            }

            .star-rating label {
                font-size: 24px;
            }

            input, textarea {
                padding: 10px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php require("header.php"); ?>
    <?php require("db.php"); ?>

    <?php
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

    <h1>Product Review</h1>

    <div class="video-container">
        <iframe src="./images/nurserylive.mp4" frameborder="0" allowfullscreen></iframe>
    </div>

    <main>
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="command">Command</label>
            <input type="text" id="command" name="command" required>

            <div class="star-rating">
                <label for="rating">Ratings</label>
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

            <input type="submit" value="Submit Review" class="btn">
        </form>
    </main>

    <?php require("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
