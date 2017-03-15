<?php
  class Job {
    private $first_name;
    private $last_name;
    private $job_title;
    private $year;
    private $company;

    function __construct($first_name, $last_name, $job_title, $year, $company){
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->job_title = $job_title;
      $this->year = $year;
      $this->company = $company;
    }

    function setFirstName($new_first_name){
      $this->first_name = (string) $new_first_name;
    }

    function getFirstName(){
      return $this->first_name;
    }

    function setLastName($new_last_name){
      $this->last_name = (string) $new_last_name;
    }

    function getLastName(){
      return $this->last_name;
    }

    function setJobTitle($new_job_title){
      $this->job_title = (string) $new_job_title;
    }

    function getJobTitle(){
      return $this->job_title;
    }

    function setYear($new_year){
      $this->year = (int) $new_year;
    }

    function getYear(){
      return $this->year;
    }

    function setCompany($new_company){
      $this->company = (string) $new_company;
    }

    function getCompany(){
      return $this->company;
    }

    function save(){
      array_push($_SESSION['jobs'], $this);
    }

    static function getAll(){
      return $_SESSION['jobs'];
    }

    static function delete(){
      session_destroy();
    }

  }
?>
