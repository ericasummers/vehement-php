<?php
  date_default_timezone_set('America/Los_Angeles');
  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/Band.php';
  require_once __DIR__.'/../src/Fan.php';

  $server = 'mysql:host=localhost:8889;dbname=vehement-php';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);

  use Symfony\Component\HttpFoundation\Request;
  Request::enableHttpMethodParameterOverride();

  use Symfony\Component\Debug\Debug;
  Debug::enable();

  $app = new Silex\Application();
  $app['debug'] = true;

  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

  $app->get('/', function() use ($app) {  // HOME PAGE WITH ENTER FORMS
        $bands = Band::getAll();
        return $app['twig']->render('index.html.twig', array('bands' => $bands));
    });

  $app->post('/add-band', function() use ($app) {
      $name = $_POST['name'];
      $genre = $_POST['genre'];
      $description = $_POST['description'];
      $members = $_POST['members'];
      $new_band = new Band($name, $genre, $description, $members);
      $new_band->save();

      return $app->redirect('/');
  });

  $app->get('/fans', function() use ($app) {  // HOME PAGE WITH ENTER FORMS
        $fans = Fan::getAll();
        return $app['twig']->render('fans.html.twig', array('fans' => $fans));
    });

    $app->post('/add-fan', function() use ($app) {
        $username = $_POST['username'];
        $favBand = $_POST['favBand'];
        $new_fan = new Fan($username, $favBand);
        $new_fan->save();

        return $app->redirect('/fans');
    });

    return $app;


 ?>
