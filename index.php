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
    require_once ('model/validation.php');

    // create an instance of the base class
    $f3 = Base::instance();

    // Turn on Fat-free error reporting
    $f3->set('DEBUG', 3);

    // arrays of interests
    $f3->set('indoorInterests', array('tv', 'movies', 'cooking', 'board games',
        'puzzles', 'reading', 'playing cards', 'video games'));
    $f3->set('outdoorInterests', array('hiking', 'biking', 'swimming', 'collecting',
        'walking', 'climbing'));

    // define a default route
    $f3->route('GET /', function()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    });

    $f3->route('GET|POST /personal', function($f3)
    {
        // Get data from form
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];

        // Add data to hive
        $f3->set('first_name', $first_name);
        $f3->set('last_name', $last_name);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('phone', $phone);

        // If form has been submitted, validate
        if(!empty($_POST))
        {
            // if data is valid
            if (validFormPersonal())
            {
                // Write data to session
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['age'] = $age;
                $_SESSION['phone'] = $phone;
                if (empty($gender))
                {
                    $_SESSION['gender'] = "No gender selected";
                }
                else
                {
                    $_SESSION['gender'] = $gender;
                }
            }
        }
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
