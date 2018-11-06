<?php

include 'includes/dbh-inc.php';

if($cart_id != ''){
  $cartQ=$conn->query("SELECT * FROM cos WHERE id = '{$cart_id}'");
  $result = mysqli_fetch_assoc($cartQ);
  $items = json_decode($result['items'],true); 
  $i = 1;
  $sub_total = 0;
  $item_count = 0;
  $nr = 0;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Global | About</title>

<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<link rel="icon" href="data:;base64,iVBORw0KGgo=">
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="main" style="border-top-width: 0px;">
  <!--==============================header=================================-->
  <header>
    <h1><a href="index.php"><img src="images/logoul.png" alt=""></a></h1>
    
    <div class="clear"></div>
    <nav class="box-shadow">
      <div>
        <ul class="menu">
          <li class="home-page"><a href="index.php"><span></span></a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Events</a></li>
          <li><a href="contacts.php">Contacts</a></li>
        <?php
          if(isset($_SESSION['u_id'])){
            echo ' <li class="current"><a href="mytickets.php">My tickets</a></li>';
            }     
            if($e_admin == 1){
            echo ' <li><a href="admin.php">Administration</a></li>';
            }
        ?>
        </ul>
          <div class="social-icons">

         <?php
          if(isset($_SESSION['u_id'])){
            echo '<form action="includes/logout-inc.php" method="POST">
          <button class="button-login1" type="submit" name="submit" style="height: 33px;padding-bottom: 8px;padding-top: 2px;"">Logout</button>
        </form>';
        }else{
          echo '<span>Log in:</span> <a href="login1.php" class="icon-1"></a>';
      }
        ?>

      </div>      
            <div class="clear"></div>
      </div>
    </nav>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="container_12">
      <div class="grid_12">
        <div class="wrap block-3 pad-2">

      </div>
      <div class="clear"></div>
    </div>
    <div class="aside">
      <div class="container_12">
        <div class="grid_12">
          <div class="pad-2 wrap">
            <div class="col-md-12">
                <div class="row">
                  <h2 class="text-center">My Tickets</h2><hr>
                  <?php 

                     foreach ($items as $item) {
                                if($_SESSION['u_id'] == $item['user']){
                                    $nr++;
                                }
                              }
                        if($nr == 0):

                    ?>
                    <div class="col-md-12">
                      <p class="text-center text-danger" style="font-size: 20px;">
                        Your shopping cart is empty !
                      </p>
                    </div>
                    <?php else: ?>
                        <table class="table table-bordered table-condensed table-striped">
                          <thead style="background-color: #ed6c3d;"><th>#</th><th>Item</th><th>Price</th><th>Quantity</th><th>Date</th><th>Subtotal</th></thead>
                          <tbody>
                            <?php

                              foreach ($items as $item) {
                                if($_SESSION['u_id'] == $item['user']){
                                $eveniment_id = $item['id'];
                                $evenimentQ = $conn->query("SELECT * FROM evenimente WHERE id='{$eveniment_id}'");
                                $eveniment = mysqli_fetch_assoc($evenimentQ);
                                $available= $eveniment['cantitate'];
                             ?>
                                <tr>
                                  <td><?=$i;?></td>
                                  <td><?=$eveniment['titlu']; ?></td>
                                  <td><?=money($eveniment['pret']); ?></td>
                                  <td>
                                    <?=$item['quantity']; ?>
                                    </td>
                                  <td><?=$eveniment['data']; ?></td>
                                  <td><?=money($item['quantity'] * $eveniment['pret']); ?></td>
                                </tr>
                                <?php 
                                $i++;
                                $item_count += $item['quantity'];
                                $sub_total += ($eveniment['pret'] * $item['quantity']);

                                }
                              } 
                                $tax = TAXRATE * $sub_total;
                                $tax = number_format($tax,2);
                                $grand_total = $tax + $sub_total;


                              ?>
                          </tbody>
                        </table>
                        <h2 style="font-size: 30px;margin-bottom: 1px;" align="center">Totals</h2>

                        <table class="table table-bordered table-condensed">
                          <thead style="background-color: #ed6c3d;"><th>Total Items</th><th>Sub Total</th>><th>Tax</th><th>Grand Total</th></thead>
                          <tbody>
                            <tr>
                              <td><?=$item_count; ?></td>
                               <td><?=money($sub_total); ?></td>
                                <td><?=money($tax); ?></td>
                                 <td style="background-color: #ccffcc;"><?=money($grand_total); ?></td>
                            </tr>
                          </tbody>
                        </table>


                        <!-- Check Out modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#checkoutModal">
 <span class="glyphicon glyphicon-shopping-cart"></span>Check Out >>
</button>

<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkoutModalLabel"><b>Payment</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Enter your address and card details here.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="alert('Thank you for buying !');closeModal();">Buy</button>
      </div>
    </div>
  </div>
</div>

                  <?php endif; ?>
                  </div>
                  <div class="row mt-3">
                  <h2 style="font-size: 30px;margin-bottom: 1px;" align="center">Ticket History</h2>
                        <table class="table table-bordered table-condensed">
                          <thead style="background-color: #ed6c3d;"><th>User ID</th><th>Item</th><th>Price</th><th>Quantity</th><th>Date</th></thead>
                          <tbody>
                            <?php

                            	$cartQ=$conn->query("SELECT * FROM cos");
  								while($result = mysqli_fetch_assoc($cartQ)){
  									 $items = json_decode($result['items'],true);
                              foreach ($items as $item) {
                              		if($e_admin == 0){
                                if($_SESSION['u_id'] == $item['user'] && $result['id']!=$cart_id){
                                $eveniment_id = $item['id'];
                                $evenimentQ = $conn->query("SELECT * FROM evenimente WHERE id='{$eveniment_id}'");
                                $eveniment = mysqli_fetch_assoc($evenimentQ);
                                $available= $eveniment['cantitate'];
                             ?>
                                <tr>
                                	<td></td>
                                  <td><?=$eveniment['titlu']; ?></td>
                                  <td><?=money($eveniment['pret']); ?></td>
                                  <td>
                                    <?=$item['quantity']; ?>
                                    </td>
                                  <td><?=$eveniment['data']; ?></td>
                                </tr>
                                <?php

                                }
                            	}
                            	else{
                                $eveniment_id = $item['id'];
                                $evenimentQ = $conn->query("SELECT * FROM evenimente WHERE id='{$eveniment_id}'");
                                $eveniment = mysqli_fetch_assoc($evenimentQ);
                                $available= $eveniment['cantitate'];
                                ?>
                                <tr>
                                	<td><?=$item['user']; ?></td>
                                  <td><?=$eveniment['titlu']; ?></td>
                                  <td><?=money($eveniment['pret']); ?></td>
                                  <td>
                                    <?=$item['quantity']; ?>
                                    </td>
                                  <td><?=$eveniment['data']; ?></td>
                                </tr>
                                <?php
                            	}
                          }
                      }

                              ?>
                          </tbody>
                        </table>
                </div>
              </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
    <div class="col-md-12 text-center" style="color: white">&copy; Copyright 2018-2019 Ticket Website</div>
  </footer>
  <?php include 'includes/footer.php'; ?>

  <script> 
	function closeModal(){
		jQuery('#checkoutModal').modal('hide');
		setTimeout(function(){
			jQuery('#details-modal').remove();
			jQuery('.modal-backdrop').remove();
		},500);
	}
</script>
