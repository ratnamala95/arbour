<?php

$counter = '';
$order_counter = '';
$aUsr = json_decode(json_encode($_SESSION['admin_user']),True);
$aRows = $this->Dbaction->getAllData('products');
// $aOrders = $this->Dbaction->getAllData('orders');

foreach($aRows as $aRow)
{
  $count = unserialize($aRow['counter']);
  if($count=='' || !in_array($aUsr['id'],$count))
  {
    $counter++;
  }
}

// foreach($aOrders as $order)
// {
//   $count = unserialize($order['counter']);
//   if($count=='' || !in_array($aUsr['id'],$count))
//   {
//     $order_counter++;
//   }
// }

$url = $this->uri->segment(2);
if($this->uri->segment(3))
{
 $url .= "/".$this->uri->segment(3);
}

$user_role = $this->session->userdata['admin_logged_role_id'];
?>
	<div class="sidebar" data-background-color="white" data-active-color="danger">
  	<div class="sidebar-wrapper">
    	<div class="logo">
      	<a href="<?php echo base_url(''); ?>" class="simple-text">
      	  <img src="<?= base_url('assets/images/logo.png'); ?>" style="width: 100%;">
      	</a>
    	</div>

    	<!-- <ul class="nav">
    	<?php if($user_role == ADMIN_ROLE) {

        $aOrders = $this->Dbaction->getAllData('orders');
        foreach($aOrders as $order)
        {
          $count = unserialize($order['counter']);
          if($count=='' || !in_array($aUsr['id'],$count))
          {
            $order_counter++;
          }
        }

        ?>
      	<li data-toggle="collapse" data-target="#options" class="collapsed <?php if($url == 'city' || $url == 'category'){ echo 'active'; }else{echo '';} ?>">
      	<a href="#"><p>Attirbutes	<span class="caret"></span></p></a>
      	</li>
      	<ul class="sub-menu collapse" id="options">
      	<li class="space"><a href="<?php echo base_url('city'); ?>" class="sub">City</a></li>
      	<li class="space"><a href="<?php echo base_url('category'); ?>" class="sub">Category</a></li>
      	<li class="space"><a href="<?php echo base_url('attribute/style'); ?>" class="sub">Style</a></li>
      	<li class="space"><a href="<?php echo base_url('attribute/size'); ?>" class="sub">Size</a></li>
      	</ul>
      	<li data-toggle="collapse" data-target="#prods" class="collapsed <?php if($url == 'product' || $url == 'order'){ echo 'active'; }else{echo '';} ?>">
      	<a href="#">
      	<p>Products	<span class="caret"></span></p></a>
      	</li>
      	<ul class="sub-menu collapse" id="prods">
      	<li class="space"><a href="<?php echo base_url('product'); ?>" class="sub">Products</a><span class="badge badge-success"><?php echo $counter; ?></span></li>
      	<li class="space"><a href="<?php echo base_url('order'); ?>" class="sub">Orders</a><span class="badge badge-success"><?php echo $order_counter; ?></span></li>
      	</ul>
       <li class="<?php echo $url == 'inventory' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('inventory'); ?>">
      	<p>Inventory</p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'warehouse' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('warehouse'); ?>">
      	<p>Warehouse</p>
      	</a>
      	</li>

      	<li class="<?php echo $url == 'distributor' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('distributor'); ?>">
      	<p>Distributor</p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'retailer' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('retailer'); ?>">
      	<p>Retailer</p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'inventory/resetTrans' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('inventory/resetTrans'); ?>">
      	<p>Transaction Trail</p>
      	</a>
      	</li>
      	<?php } ?>

      	<?php if($user_role == WAREHOUSE_ROLE) {

          $aOrders = $this->Dbaction->getAllData('orders','',array('wrehouse_id'=>$aUsr['id']));

          foreach($aOrders as $order)
          {
            $count = unserialize($order['counter']);
            if($count=='' || !in_array($aUsr['id'],$count))
            {
              $order_counter++;
            }
          }
          ?>
      	<li class="<?php echo $url == 'warehouse' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('warehouse/profile'); ?>">
      	<p>Profile</p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'product' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('product'); ?>">
      	<p>Products  <span class="badge badge-success"><?php echo $counter; ?></span></p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'distributor' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('distributor'); ?>">
      	<p>Distributor</p>
      	</a>
      	</li>

      	<li class="<?php echo $url == 'retailer' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('retailer'); ?>">
      	<p>Retailer</p>
      	</a>
      	</li>

      	<li class="<?php echo $url == 'inventory' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('inventory'); ?>">
      	<p>Inventory</p>
      	</a>
      	</li>

      	<li class="<?php echo $url == 'warehouse/requests' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('warehouse/requests'); ?>">
      	<p>Incomming Requests</p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'warehouse/sRequests' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('warehouse/sRequests'); ?>">
      	<p>My Requests</p>
      	</a>
      	</li>
        <li class="<?php echo $url == 'orders' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('order'); ?>">
      	<p>Orders  <span class="badge badge-success"><?php echo $order_counter; ?></span></p>
      	</a>
      	</li>
      	<?php } ?>

      	<?php if($user_role == DISTRIBUTOR_ROLE) {

          $aOrders = $this->Dbaction->getAllData('orders','',array('distributor_id'=>$aUsr['id']));

          foreach($aOrders as $order)
          {
            $count = unserialize($order['counter']);
            if($count=='' || !in_array($aUsr['id'],$count))
            {
              $order_counter++;
            }
          }

          ?>

      	<li class="<?php echo $url == 'distributor' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('distributor/profile'); ?>">
      	<p>Profile</p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'product' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('product'); ?>">
      	<p>Products  <span class="badge badge-success"><?php echo $counter; ?></span></p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'retailer' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('retailer'); ?>">
      	<p>Retailer</p>
      	</a>
      	</li>
      	<li class="<?php echo $url == 'orders' ? 'active' : ''; ?>">
      	<a href="<?php echo base_url('order'); ?>">
      	<p>Orders  <span class="badge badge-success"><?php echo $order_counter; ?></span></p>
      	</a>
      	</li>

        <li class="<?php echo $url == 'placeorder' ? 'active' : ''; ?>">
        <a href="<?php echo base_url('placeorder'); ?>">
        <p>Place Orders </p>
        </a>
        </li>

        <li class="<?php echo $url == 'review' ? 'active' : ''; ?>">
        <a href="<?php echo base_url('review'); ?>">
        <p>Review</p>
        </a>
        </li>

      	<?php } ?>
    	</ul> -->
  	</div>
	</div>
