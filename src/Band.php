<?php
  class Band {
    private $name;
    private $genre;
    private $description;
    private $members;
    private $id;

    function __construct($name, $genre, $description, $members, $id=null)
    {
      $this->name = $name;
      $this->genre = $genre;
      $this->description = $description;
      $this->members = $members;
      $this->id = $id;
    }
// GETTERS AND SETTERS
    function getName()
    {
      return $this->name;
    }
    function setName($name)
    {
      $this->name = $name;
    }
    function getGenre()
    {
      return $this->genre;
    }
    function setGenre($genre)
    {
      $this->genre = $genre;
    }
    function getDescription()
    {
      return $this->description;
    }
    function setDescription($description)
    {
      $this->description = $description;
    }
    function getMembers()
    {
      return $this->members;
    }
    function setMembers($members)
    {
      $this->members = $members;
    }
    function getId()
    {
      return $this->id;
    }


  }



?>
