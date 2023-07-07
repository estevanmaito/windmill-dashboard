<?php
class charge
{
    private $id;
    private $unit_id;
    private $user_id;
    private $description;
    private $date;
    private $statut;
    private $montant;

    function charge($_id, $_unit_id, $_user_id, $_description, $_date, $_statut, $_montant)
    {
        $this->id = $_id;
        $this->unit_id = $_unit_id;
        $this->user_id = $_user_id;
        $this->description = $_description;
        $this->date = $_date;
        $this->statut = $_statut;
        $this->montant = $_montant;
    }

    // Getters
    public function getChargeId()
    {
        return $this->id;
    }

    public function getChargeUnitId()
    {
        return $this->unit_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getChargeDescription()
    {
        return $this->description;
    }

    public function getChargeDate()
    {
        return $this->date;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    // Setters
    public function setChargeId($id)
    {
        $this->id = $id;
    }

    public function setChargeUnitId($unit_id)
    {
        $this->unit_id = $unit_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setChargeDescription($description)
    {
        $this->description = $description;
    }

    public function setChargeDate($date)
    {
        $this->date = $date;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
}
?>