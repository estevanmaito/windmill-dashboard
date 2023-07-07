<?php
class user_account
{
    private $id;
    private $username;
    private $password;
    private $location_id;
    private $location_details;
    private $phone;
    private $mobile;
    private $email;
    private $registration_time;

    public function __construct($id_ = NULL, $username_ = NULL, $password_ = NULL, $location_id_ = NULL, $location_details_ = NULL, $phone_ = NULL, $mobile_ = NULL, $email_ = NULL , $registration_time_ = NULL)
    {
        $this->id = $id_;
        $this->username = $username_;
        $this->password = $password_;
        $this->location_id = $location_id_;
        $this->location_details = $location_details_;
        $this->phone = $phone_;
        $this->mobile = $mobile_;
        $this->email = $email_;
        $this->registration_time = $registration_time_;
    }

    // Getters
    public function getUserId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUserLocationId()
    {
        return $this->location_id;
    }

    public function getLocationDetails()
    {
        return $this->location_details;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function getUserEmail()
    {
        return $this->email;
    }

    public function getRegistrationTime()
    {
        return $this->registration_time;
    }

    // Setters
    public function setUserId($id)
    {
        $this->id = $id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setUserLocationId($location_id)
    {
        $this->location_id = $location_id;
    }

    public function setLocationDetails($location_details)
    {
        $this->location_details = $location_details;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function setUserEmail($email)
    {
        $this->email = $email;
    }

    public function setRegistrationTime($registration_time)
    {
        $this->registration_time = $registration_time;
    }
}

?>