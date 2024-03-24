<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
        }

        body {
            background-color: #fffffe;
            margin: 0;
            padding: 0;
        }

        h3 {
            text-align: center;
            color: #272343;
            margin-top: 20px; 
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center; 
            margin-top: 20px; 
        }

        .form {
            max-width: 540px;
            width: 100%;
            padding: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            transition: background-color 0.5s ease-in-out, border 0.5s ease-in-out;
            border: 2px solid white;
        }

        .label {
            color: #2b2c34;
            margin-bottom: 4px;
            font-weight: bold;
            text-align: left;
            display: block; 
        }

        .input {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
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


        .form p {
            color: #2b2c34;
            margin-top: 10px;
            font-weight: bold;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column; 
                align-items: center; 
            }

            .form {
                max-width: 90%; 
            }
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>

    <h3>Fill the Form To Confirm Your Order</h3><br>

    <div class="container">
        <form class="form" method="post" action="" id="orderForm">
            <label for="username" class="label">Username</label>
            <input type="text" id="username" name="username" required class="input">

            <label for="product" class="label">You Ordered Product</label>
            <?php  
            $productName = isset($_POST["productName"]) ? $_POST["productName"] : "No Product Selected";
            echo '<input type="text" readonly value="' . $productName . '" class="input" name="product">';

            $deliveryDate = date('Y-m-d', strtotime('+6 days')); 
            $deliveryTime = date('H:i A', strtotime('+2 days'));
            ?>

            <label for="email" class="label">Email</label>
            <input type="email" id="email" name="email" required class="input">

            <label for="number" class="label">Mobile Number</label>
            <input type="number" name="number" id="number" required class="input">

            <label for="city" class="label">City</label>
            <input type="text" name="city" id="city" required class="input">

            <label for="address" class="label">Address</label>
            <input type="text" name="address" id="address" required class="input">

            <label for="confirmaddress" class="label">Confirm Address</label>
            <input type="text" name="confirmaddress" id="confirmaddress" required class="input">

            <label for="pincode" class="label">Pincode</label>
            <input type="number" id="pincode" name="pincode" required class="input">

            <label for="delivery" class="label">Delivery Date and Time</label>
<input type="text" id="delivery" name="delivery" readonly value="<?php echo $deliveryDate . ' at ' . $deliveryTime; ?>" class="input">

<p><strong>Total Amount:</strong> ₹<?php echo $_POST['totalAmount']; ?></p>
<input type="hidden" name="totalAmount" value="<?php echo $_POST['totalAmount']; ?>">

            <label for="payment">Payment Method</label>
            <select name="payment" id="">
                <option value=""></option>
                <option value="cash">Cash On Delivery</option>
            </select><br><br>

            <input type="submit" class="btn btn-success" value="Confirm Order">
        </form>
    </div><br>
    <script>
    $('#orderForm').submit(function(event) {
        event.preventDefault(); 
        let formData = new FormData(this);
        $.ajax({
            url: 'process_order.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
               
                Swal.fire({
                    icon: 'success',
                    title: 'Payment Successful',
                    text: 'Your order has been placed successfully!',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed || result.isDismissed) {
                        window.location.href = 'home.php';
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
</script>

    <?php include("footer.php"); ?>
</body>
</html>
