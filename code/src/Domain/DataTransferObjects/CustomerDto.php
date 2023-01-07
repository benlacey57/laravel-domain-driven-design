<?php

namespace Domain\DataTransferObjects;

use Domain\Models\Customer;

// Generate a customer DTO object from a customer model
class CustomerDto
{
    public $id;
    public $title;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $postcode;
    public $country;
    public $gender;
    public $pronouns;
    public $status;
    public $notes;
    public $profileImage;
    public $createdAt;
    public $updatedAt;

    public function __construct(Customer $customer)
    {
        $this->id = $customer->id;
        $this->title = $customer->title;
        $this->firstName = $customer->first_name;
        $this->lastName = $customer->last_name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
        $this->city = $customer->city;
        $this->postcode = $customer->postcode;
        $this->country = $customer->country;
        $this->pronouns = $customer->pronouns;
        $this->gender = $customer->gender;
        $this->notes = $customer->notes;
        $this->status = $customer->status;
        $this->profileImage = $customer->profile_image;
        $this->createdAt = $customer->created_at;
        $this->updatedAt = $customer->updated_at;
    }
}
