<?php
session_start();
include_once 'dbh-inc.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT * FROM evenimente WHERE id = '$id'";
$result = $conn->query($sql);
$eveniment = mysqli_fetch_assoc($result);
?>
<!--==Details==-->

<?php ob_start(); ?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title text-center" style="font-size: 30px; color: #ed6c3d;"><?= $eveniment['titlu']; ?></h4>
			<button class="close" type="button" onclick="closeModal()" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<span id="modal_errors" class="bg_danger"></span>
					<div class="col-sm-6">
						<div class="center-block">
							<img src="<?= $eveniment['imagine'];?>" alt="<?= $eveniment['titlu']; ?>" class="details img-responsive">
						</div>
					</div>
					<div class="col-sm-6">
						<h4><b>Details</b></h4>
						<p><?= $eveniment['descriere']; ?></p>
						<hr>
						<p><b>Price:</b> <?= $eveniment['pret']; ?> RON</p>
						<p><b>Category:</b>  <?= $eveniment['categorie']; ?></p>
						<p><b>Available:</b> <?= $eveniment['cantitate']; ?> tickets</p>
						<form action="add_cart.php" method="post" id="add_product_form">
							<input type="hidden" name="available" id="available" value="<?= $eveniment['cantitate']; ?>">
							<input type="hidden" name="eveniment_id" value="<?=$id;?>">
							<div class="form-group">

								<div class="col-xs-3">
									<?php
          								if(isset($_SESSION['u_id'])){
           									 echo '<label for="quantity"><b>Quantity:</b></label>
													<input type="text" class="form-control" id="quantity" name="quantity" placeholder="How many tickets do you want ?">';
										}
									?>
								</div>

							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="modal-footer">
			<?php
          if(isset($_SESSION['u_id'])){
            echo '<button class="button-login" onclick="add_to_cart();closeModal();"><span class="glyphicon glyphicon-shopping-cart"></span>Add to cart</button>';
            }     
            else echo 'You must be logged in to buy tickets! &nbsp';
        ?>
        <button class="btn btn-default" onclick="closeModal()">Close</button>
		</div>
	</div>
	</div>
</div>
<script> 


	function closeModal(){
		jQuery('#details-modal').modal('hide');
		setTimeout(function(){
			jQuery('#details-modal').remove();
			jQuery('.modal-backdrop').remove();
		},500);
	}
</script>
<?php echo ob_get_clean(); ?>