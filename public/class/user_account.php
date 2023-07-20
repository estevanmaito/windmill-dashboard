<?php
class user_account
{
    private $id;
    private $name;
    private $password;
    private $location_id;
    private $location_details;
    private $phone;
    private $mobile;
    private $email;
    private $registration_time;



    // Getters
    public function getUserId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUserLocationId()
    {
        return $this->location_id;
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

    public function setUsername($name)
    {
        $this->name = $name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setUserLocationId($location_id)
    {
        $this->location_id = $location_id;
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