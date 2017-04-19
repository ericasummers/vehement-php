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

    function save()
    {
      $GLOBALS['DB']->exec("INSERT INTO bands (name, genre, description, members) VALUES ('{$this->name}', '{$this->genre}', '{$this->description}', '{$this->members}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
      $all_bands = $GLOBALS['DB']->query("SELECT * FROM bands;");
      $bands = array();

      foreach ($all_bands as $band) {
        $name = $band['name'];
        $genre = $band['genre'];
        $description = $band['description'];
        $members = $band['members'];
        $id = $band['id'];
        $new_band = new Band($name, $genre, $description, $members, $id);
        array_push($bands, $new_band);
      }
      return $bands;
    }

    static function deleteAll()
    {
      $GLOBALS['DB']->exec("DELETE FROM bands;");
    }

  }



?>
