<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Upcomming extends Frontend_Controller
{

	function __construct()
	{
		parent::__construct();
		//secho "hello";

	}


	public function index()
	{
		$productslug = $this->uri->segment(3);

    $data['upcommingproducts'] = $this->Dbaction->getAllData('products','',array('upcomming' => 1,'slug' => $productslug));

    $this->load->view('upcomming_products',$data);
		// pr($upcommingproducts);die;
	}




}


?>
