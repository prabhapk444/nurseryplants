<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faqs</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .contain{
            display:flex;
            align-items:center;
            justify-content:center;
        
        }
        img{
            max-width:100%;
            height:auto;
        }
        .accordion-item {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
      transition: box-shadow 0.7s ease; 
    }
    </style>
</head>
<body>
    <?php
     include("header.php");
    ?>

<div class="contain">
<img src="./images/FAQs.gif" alt="" srcset="">
</div>

<center><h2>Faq Questions</h2></center>

<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
       
 Cashback Voucher/Cashback Coupon

      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body" style="text-align:justiy;">Your Cashback Voucher/Cashback Coupon will be redeemed as n-cash in your nurserylive wallet.
Also, you will be notified via email for the same.</div>
    </div>
  </div><br>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">

      Cash on Delivery?

      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body" style="text-align:justify;">We currently do not support cash on delivery. However, we do support a variety of payment options including wallet, credit, and debit cards.</div>
    </div>
  </div><br>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      How to redeem Our n-cash?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body" style="text-align:justify;">
    * Visit www.plantnursery.com  <br>
    * Click the reward icon on the bottom left of the screen <br>
    * Login with nurserylive credentials  <br>
    * After login, you will be displayed with your account balance, ways to redeem and ways to earn, and more.</div>
    </div>
  </div>
</div><br>
</body>
<?php
include("footer.php");
?>
</html>