<?php include 'include/header.php'; ?>

<?php $upcommingproducts = $upcommingproducts[0]; ?>
<?= link_tag('assets/frontend/css/product-details.css'); ?>

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="col-md-3">
				<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
					<li><a href="<?= base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li class="active">Product Details</li>
				</ol>
			</div>
		</div>
	</div>
<!-- //breadcrumbs -->


<form method="post" id="cartform">

  	<input type="hidden" name="cart_pro_id" id="cart_pro_id" value="<?= $upcommingproducts['id']; ?>">
    <input type="hidden" name="cart_pro_name" value="<?= $upcommingproducts['name']; ?>">
    <input type="hidden" name="cart_pro_slug" value="<?= $upcommingproducts['slug']; ?>">
    <input type="hidden" name="cart_pro_code" value="<?= $upcommingproducts['code']; ?>">
    <input type="hidden" name="cart_pro_image" value="<?= $upcommingproducts['image']; ?>">

<div class="container">
	<div class="card">
		<div class="container-fliud">
			<div class="wrapper row">

				<div class="preview col-md-4">

					<div class="preview-pic tab-content">
					  	<div class="tab-pane active" id="pic-1">
					  		<img class="product-image" src="<?php if($upcommingproducts['image']) { echo base_url('assets/uploads/').$upcommingproducts['image']; } else { echo base_url('assets/images/no_pic.png'); } ?>" />
					  	</div>
						<?php
							if (isset($aRowImage) && count($aRowImage)>0) {
								$count=1;
								foreach ($aRowImage as $resImage)
								{
									++$count;
						?>
							<div class="tab-pane" id="pic-<?php echo $count; ?>"><img src="<?php echo base_url('assets/uploads/'.$resImage['img_name']); ?>" /></div>
						<?php
								}
							}
						?>
					</div>
					<?php if (isset($aRowImage) && count($aRowImage)>0) { ?>
					<ul class="preview-thumbnail nav nav-tabs">
					  	<li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php if($upcommingproducts['image']) { echo base_url('assets/uploads/').$upcommi['image']; } else { echo base_url('assets/images/no_pic.png'); } ?>" /></a></li>
					  	<?php
							$count=1;
							foreach ($aRowImage as $resImage)
							{
								++$count;
						?>
							<li><a data-target="#pic-<?php echo $count; ?>" data-toggle="tab"><img src="<?php echo base_url('assets/uploads/'.$resImage['img_name']); ?>" /></a></li>
						<?php }	?>
					</ul>
					<?php } ?>
				</div>

				<div class="details col-md-8">
					<div class="row">
						<div class="col-md-6">

							<section class="product_title_box">
								<h3><?php echo $upcommingproducts['name']; ?></h3>
								<div></div>
								<span>Code : <?php echo $upcommingproducts['code']; ?></span><br>

							</section>
					</div>
				</div>

			</div>
		</div>

<?php if(isset($upcommingproducts['description']) && ''!=$upcommingproducts['description']) { ?>
  <div class="container-fluid">
        <div class="col-md-12">
    	    <div class="content-wrapper">
    			<div class="collpse tabs">
    				<!--<h3 class="w3ls-title">About this item</h3> -->
    				<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
    					<div class="panel panel-default">
    						<div class="panel-heading" role="tab" id="headingOne">
    							<h4 class="panel-title">
    								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false" aria-controls="collapseOne">
    									<i class="fa fa-file-text-o fa-icon" aria-hidden="true"></i> Description <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
    								</a>
    							</h4>
    						</div>
    						 <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
    							<div class="panel-body">
    								<?php echo $upcommingproducts['description']; ?>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
	</div>
<?php } ?>

	</div>
</div>
</form>
<!-- product details page -->

<div class="clearfix"></div>

</div>


<!-- added in cart script start -->


<?php include 'include/footer.php'; ?>
