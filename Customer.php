<?php

class Customer {
	
	public function setFirstName($firstName) {
		$this->firstName = $firstName;		
		return $this;
	}
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}
	
	public function getLastName() {
		return $this->lastName;
	}
	
	public function setEmail($email) {
		$this->email[] = $email;
		return $this;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function setPhone($phone) {
		 $this->phone[] = $phone;
		 return $this;
	}
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function setAddress($address) {
		$this->address[] = $address;
	}
	
	public function getAddress() {
		return $this->address;
	}
		
}
