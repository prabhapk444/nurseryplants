<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

    
      .video-container {
        position: relative;
        overflow: hidden;
        padding-bottom: 56.25%; 
        margin: 20px 0;
      }

      
      .card {
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            transform: translateY(-5px); 
        }

        .card-img-top {
            transition: transform 0.3s ease;
            max-width: 100%; 
            max-height: 300px;
        }

        .card:hover .card-img-top {
            transform: scale(1.1); 
        }
    
    </style>
</head>
<body>

 <?php include("header.php"); ?>

 <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/indoor-plants-studio.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/home-decor-indoor-plant-shelf.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/greenhouse-still-life.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><br><br>
<br><br>


<center>
    <h3>Deal of the day</h3>
</center>


<?php
    include("db.php");

    $selectQuery = "SELECT product_name, category, price, quantity,  description, image, product_id FROM products WHERE category ='air' ORDER BY RAND() LIMIT 2";
    $result = $conn->query($selectQuery);

    if ($result === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo '<div class="row justify-content-center">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-4 col-sm-8 mb-4">';
                echo '<div class="card h-100 shadow">';
                echo '<img src="./nursery/uploads/' . basename($row["image"]) . '" class="card-img-top" alt="' . $row["product_name"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title product-name">' . $row["product_name"] . '</h5>';
                echo '<p class="card-text"><strong>Category:</strong> ' . $row["category"] . '</p>';
                echo '<p class="card-text"><strong>Price:</strong> ' . $row["price"] . '</p>';
                echo '<p class="card-text"><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                echo '<p class="card-text"><strong>Description:</strong> ' . $row["description"] . '</p>';
                echo '<form method="post" action="add_to_cart.php" class="mt-3">';
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                echo '<div class="input-group">';
                echo '<span class="input-group-text">Quantity</span>';
                echo '<input type="number" class="form-control" name="quantity" value="1" min="1">';
                echo '</div>';
                echo '<button type="submit" class="btn btn-success mt-3" name="add_to_cart">Add to Cart</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No records found in the products table.";
        }
    }

    $conn->close();
?>

  


    <center>
        <h1>Indoor Plants</h1>
    </center><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="./images/spider.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chlorophytum, Spider Plant - Plant</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="./images/peace.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Peace Lily, Spathiphyllum - Plant</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="./images/elephant.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> Jade plant (Green) - Succulent Plant</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <center>
        <h1>Outdoor Plants</h1>
    </center><br>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="card" style="width: 18rem;">
                    <img src="./images/jasmine.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jasminum sambac, Mogra, Arabian Jasmine - Plant</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
                    <img src="./images/panjrat.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Night Flowering Jasmine - Plant</h5>
                        <a href="indoor.php" class="btn btn-success" >Buy</a>
                    </div>
                </div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
                    <img src="./images/rose.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Miniature Rose, Button Rose (Any Color) - Plant</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
    </div>
  </div>
</div><br><br>


<center>
        <h1>Water Plants</h1>
    </center><br>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="card" style="width: 18rem;">
                    <img src="./images/water1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lucky Bamboo</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
                    <img src="./images/water2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Money Plant</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
                    <img src="./images/lotus.png" class="card-img-top" alt="..." height="240">
                    <div class="card-body">
                        <h5 class="card-title">Lotus (Water Lillies)</h5>
                        <a href="indoor.php" class="btn btn-success">Buy</a>
                    </div>
                </div>
    </div>
  </div>
</div><br><br>

   

    <?php include("footer.php"); ?>
    </body>
</html>
