<?php
class item_leased
{
    private $id;
    private $item_id;
    private $renter_id;
    private $time_from;
    private $time_to;
    private $unit_id;
    private $price_per_unit;
    private $discount;
    private $fee;
    private $price_total;
    private $rentier_grade_description;

    public function __construct($id_, $item_id_, $renter_id_, $time_from_, $time_to_, $unit_id_, $price_per_unit_, $discount_, $fee_, $price_total_, $rentier_grade_description_)
    {
        $this->id = $id_;
        $this->item_id = $item_id_;
        $this->renter_id = $renter_id_;
        $this->time_from = $time_from_;
        $this->time_to = $time_to_;
        $this->unit_id = $unit_id_;
        $this->price_per_unit = $price_per_unit_;
        $this->discount = $discount_;
        $this->fee = $fee_;
        $this->price_total = $price_total_;
        $this->rentier_grade_description = $rentier_grade_description_;
    }

    // Getters
    public function getItemLeasedId()
    {
        return $this->id;
    }

    public function getItemId()
    {
        return $this->item_id;
    }

    public function getRenterId()
    {
        return $this->renter_id;
    }

    public function getTimeFrom()
    {
        return $this->time_from;
    }

    public function getTimeTo()
    {
        return $this->time_to;
    }

    public function getItemLeasedUnitId()
    {
        return $this->unit_id;
    }

    public function getPricePerUnit()
    {
        return $this->price_per_unit;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function getPriceTotal()
    {
        return $this->price_total;
    }

    public function getRentierGradeDescription()
    {
        return $this->rentier_grade_description;
    }

    // Setters
    public function setItemLeasedId($id)
    {
        $this->id = $id;
    }

    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }

    public function setRenterId($renter_id)
    {
        $this->renter_id = $renter_id;
    }

    public function setTimeFrom($time_from)
    {
        $this->time_from = $time_from;
    }

    public function setTimeTo($time_to)
    {
        $this->time_to = $time_to;
    }

    public function setItemLeasedUnitId($unit_id)
    {
        $this->unit_id = $unit_id;
    }

    public function setPricePerUnit($price_per_unit)
    {
        $this->price_per_unit = $price_per_unit;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    public function setPriceTotal($price_total)
    {
        $this->price_total = $price_total;
    }

    public function setRentierGradeDescription($rentier_grade_description)
    {
        $this->rentier_grade_description = $rentier_grade_description;
    }
}

?>