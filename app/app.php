<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Joblist.php";

    $app = new Silex\Application();

    session_start();
    if(empty($_SESSION['jobs'])){
      $_SESSION['jobs'] = array();
    }

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {
      return $app['twig']->render('job.html.twig');
    });

    $app->post("/function", function() use ($app) {
      $newjob = new Job($_POST['firstName'], $_POST['lastName'], $_POST['jobTitle'], $_POST['year'], $_POST['company']);
      $newjob->save();
      return $app['twig']->render('job.html.twig',array("jobs"=>$newjob::getAll()));
    });

    return $app;

 ?>
