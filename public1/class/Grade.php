<?php
class Grade {
    private $id;
    private $itemLeasedId;
    private $gradeCategoryId;
    private $userFrom;
    private $userTo;
    private $grade;
    private $description;

    public function __construct($id, $itemLeasedId, $gradeCategoryId, $userFrom, $userTo, $grade, $description) {
        $this->id = $id;
        $this->itemLeasedId = $itemLeasedId;
        $this->gradeCategoryId = $gradeCategoryId;
        $this->userFrom = $userFrom;
        $this->userTo = $userTo;
        $this->grade = $grade;
        $this->description = $description;
    }

    public function getGradeId() {
        return $this->id;
    }

    public function setGradeId($id) {
        $this->id = $id;
    }

    public function getItemLeasedId() {
        return $this->itemLeasedId;
    }

    public function setItemLeasedId($itemLeasedId) {
        $this->itemLeasedId = $itemLeasedId;
    }

    public function getGradeCategoryId() {
        return $this->gradeCategoryId;
    }

    public function setGradeCategoryId($gradeCategoryId) {
        $this->gradeCategoryId = $gradeCategoryId;
    }

    public function getUserFrom() {
        return $this->userFrom;
    }

    public function setUserFrom($userFrom) {
        $this->userFrom = $userFrom;
    }

    public function getUserTo() {
        return $this->userTo;
    }

    public function setUserTo($userTo) {
        $this->userTo = $userTo;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function setGrade($grade) {
        $this->grade = $grade;
    }

    public function getGradeDescription() {
        return $this->description;
    }

    public function setGradeDescription($description) {
        $this->description = $description;
    }
}
?>