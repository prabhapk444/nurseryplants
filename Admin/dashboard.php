<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location:adminlogin.php");
    exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="css/styles.css" rel="stylesheet" />
        <style>
             marquee{
            color:#272343;
            font-size:30px;
            font-weight:bold;

        }
        *{
            font-family: 'Roboto', sans-serif;
        }
            .col{
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .col a{
                text-decoration:none;
            }
        .color-change {
            animation: changeColor 20s infinite;
            font-size:25px;
            font-weight:bold;
            margin-top:60px;
        }

        @keyframes changeColor {
            0%, 10% {
                color: red;
            }
            20%, 30% {
                color: orange;
            }
            40%, 50% {
                color: yellow;
            }
            60%, 70% {
                color: green;
            }
            80%, 90% {
                color: blue;
            }
            100% {
                color: purple;
            }
        }
    </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Admin Dashboard</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#users">Users</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#products">Products</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#reviews">Reviews</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#sales">Sales</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#pay">Payments</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#orders">Orders</a>
                  
                </div>
            </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"> Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item"><a class="nav-link" href="./adminlogin.php">Logout</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Edit Profile</a>
                                        <a class="dropdown-item" href="#!"></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="./adminlogin.php">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
               <marquee behavior="scroll" direction="left" class="color-change">Users Information</marquee>

                <section id="users">
                <?php
include("db.php");

$query = "SELECT * FROM register";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<div class='container'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'><tr><th>S.No</th><th>Username</th><th>Email</th><th>Address</th><th>Action</th></tr></thead><tbody>";


    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["Username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>
                <button class='btn btn-danger btn-sm' onclick='deleteUser(" . $row["id"] . ")'>Delete</button>
              </td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "</div>";
} else {
    $query = "SELECT * FROM register";
    $result = $conn->query($query);
    
    echo "<div class='container'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'><tr><th>S.No</th><th>Username</th><th>Email</th><th>Address</th><th>Action</th></tr></thead><tbody>";
    
    
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id']. "</td>";
            echo "<td>" . $row["Username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>
                    <button class='btn btn-danger btn-sm' onclick='deleteUser(" . $row["id"] . ")'>Delete</button>
                  </td>";
            echo "</tr>";
    
        
        }
    } else {
        echo "<tr><td colspan='5'>No users available</td></tr>";
    }
    
    echo "</tbody></table>";
    echo "</div>";
    
    $conn->close();
}

?>
                </section>


                <marquee behavior="scroll" direction="left" class="color-change">Products</marquee>



                <section id="products">
                   <?php
                   include("db.php");
                   ?>
                   <?php
   include("viewproducts.php");
  ?>
                    <div class="container">
                    <div class="row">
    <div class="col">
        <a href="addproducts.php"><i class="fas fa-plus-circle"></i> 
        Add</a>
    </div>
    <div class="col">
        <a href="deleteproducts.php"><i class="fas fa-trash-alt"></i>
        Delete</a>
    </div>
    <div class="col">
       <a href="updateproduct.php"><i class="fas fa-edit"></i>
        Update</a> 
    </div>
    <div class="col">
       <a href="view.php"><i class="fas fa-eye"></i>
        View</a> 
    </div>
</div>

                </section>


  <marquee behavior="scroll" direction="left" class="color-change">Reviews</marquee>

  <section id="reviews">
    <?php
     include("viewreviews.php");
    ?>
  </section>



  <marquee behavior="scroll" direction="left" class="color-change">Sales</marquee>
  <section id="sales">
    <?php
     include("sales.php");
    ?>
  </section>


  <marquee behavior="scroll" direction="left" class="color-change">Payments</marquee>
  <section id="pay">
    <?php
     include("viewpay.php");
    ?>
  </section>
  

  <marquee behavior="scroll" direction="left" class="color-change">Orders</marquee>
<section  id="orders">
<?php
include("orders.php");
?>
</section><br><br>


            </div>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js">
        </script>
        <script>
    function deleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "delete.php?delete_user=" + userId;
        }
    }
</script>

        
    </body>
</html>
