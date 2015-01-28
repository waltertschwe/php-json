<?php

    require_once('Customer.php');
	
	$customer = new Customer();
	
	$customer->setFirstName("Jonathon");
	$customer->setLastName("Doe");
	
	$emailOne = array("id" => "2311", "type" => "work", "address" => "jdoe@somewhere.org", "default" => true);
	$emailTwo = array("id" => "7775", "type" => "personal", "email" => "johnathon.doe@gmail.com");
 	
	$customer->setEmail($emailOne);
	$customer->setEmail($emailTwo);
	
	$phoneOne = array("id" => "7673", "type" => "work", "number" => "2124583322", "extention" => "223", "default" => true);
	$phoneTwo = array("id" => "24332", "type" => "cell", "number" => "9173348484");
	
	$customer->setPhone($phoneOne);
	$customer->setPhone($phoneTwo);
	
	$addressOne = array("id" => "232", "label" => "Home", "type" => "shipping", "street" => array("4854 Embassy Drive", "Building 8"),
					    "city" => "Arlington", "state" => "VA", "zip" => "20184");
						
	$addressTwo = array("id" => "233", "label" => "Work", "type" => "shipping", "street" => array("4854 South 4th Street", "Suite 705"),
						"city" => "Newark", "state" => "NJ", "zip" => "10475-4392", "default" => true);
						
	$addressThree = array("id" => "252", "label" => "Parents", "type" => "billing", "street" => array("4854 South 4th Street", "Suite 705"),
						  "city" => "Newark", "state" => "NJ", "zip" => "10475-4392");
	
	$customer->setAddress($addressOne);
	$customer->setAddress($addressTwo);
	
	$result = json_encode($customer);
	echo $result;
