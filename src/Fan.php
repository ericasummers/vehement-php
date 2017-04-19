<?php
  class Fan
  {
    private $username;
    private $favBand;
    // private $posts;
    private $id;

    function __construct($username, $favBand, $id = null)
    {
      $this->username = $username;
      $this->favBand = $favBand;
      $this->id = $id;
    }

    function getUsername()
    {
      return $this->username;
    }
    function setUsername($username)
    {
      $this->username = $username;
    }
    function getFavBand()
    {
      return $this->favBand;
    }
    function setFavBand($band)
    {
      $this->favBand = $band;
    }
    function getPosts()
    {
      return $this->posts;
    }
    function setPosts($posts)
    {
      $this->posts = $posts;
    }
    function getId()
    {
      return $this->id;
    }

    function save()
    {
      $GLOBALS['DB']->exec("INSERT INTO fans (username, favBand) VALUES ('{$this->username}', '{$this->favBand}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
      $all_fans = $GLOBALS['DB']->query("SELECT * FROM fans;");
      $fans = array();
      foreach ($all_fans as $fan) {
        $username = $fan['username'];
        $favBand = $fan['favBand'];
        $id = $fan['id'];
        $new_fan = new Fan($username, $favBand, $id);
        array_push($fans, $new_fan);
      };
      return $fans;
    }

    static function deleteAll()
    {
      $GLOBALS['DB']->exec("DELETE FROM fans;");
    }





  }
 ?>
