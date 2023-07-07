<?php
class grade_category
{
    private $id;
    private $category_name;
    private $item_type_id;
    private $who_grades;

    public function __construct($id_, $category_name_, $item_type_id_, $who_grades_)
    {
        $this->id = $id_;
        $this->category_name = $category_name_;
        $this->item_type_id = $item_type_id_;
        $this->who_grades = $who_grades_;
    }

    // Getters
    public function getGradeCategId()
    {
        return $this->id;
    }

    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function getGradeCategItemTypeId()
    {
        return $this->item_type_id;
    }

    public function getWhoGrades()
    {
        return $this->who_grades;
    }

    // Setters
    public function setGradeCategId($id)
    {
        $this->id = $id;
    }

    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }

    public function setGradeCategItemTypeId($item_type_id)
    {
        $this->item_type_id = $item_type_id;
    }

    public function setWhoGrades($who_grades)
    {
        $this->who_grades = $who_grades;
    }
}

?>