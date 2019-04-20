<?php
/**
 * Created by PhpStorm.
 * User: Jittima Goodrich
 * Date: 4/8/2019
 * Time: 2:16 PM
 * File: index.php
 * index page for dog dating website
 */

    //Start a session
    session_start();

    // Turn on error reporting
    ini_set('display_error', 1);
    error_reporting(E_ALL);

    //require autoload file
    require_once ('vendor/autoload.php');

    // create an instance of the base class
    $f3 = Base::instance();

    // Turn on Fat-free error reporting
    $f3->set('DEBUG', 3);

    // define a default route
    $f3->route('GET /', function()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    });

    $f3->route('POST /personal', function()
    {
        // display a personal views
        $view = new Template();
        echo $view->render('views/personal.html');
    });

    $f3->route('POST /profile', function()
    {
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phone'] = $_POST['phone'];

        // display a profile views
        $view = new Template();
        echo $view->render('views/profile.html');
    });

    $f3->route('POST /interest', function()
    {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['bio'] = $_POST['bio'];

        // display a interest views
        $view = new Template();
        echo $view->render('views/interest.html');
    });

    $f3->route('POST /summary', function()
    {
        $_SESSION['indoor'] = $_POST['indoor'];
        $_SESSION['outdoor'] = $_POST['outdoor'];

        // display a order received views
        $view = new Template();
        echo $view->render('views/summary.html');
    });

    // Run Fat-Free
    $f3->run();
