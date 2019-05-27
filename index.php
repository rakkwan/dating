<?php
    require_once ('vendor/autoload.php');
    session_start();
/**
 * Created by PhpStorm.
 * User: Jittima Goodrich
 * Date: 4/8/2019
 * Time: 2:16 PM
 * File: index.php
 * index page for dog dating website
 */


    // Turn on error reporting
    ini_set('display_error', 1);
    error_reporting(E_ALL);

    //require autoload file
    require_once ('model/validation.php');

    // create an instance of the base class
    $f3 = Base::instance();

    //Turn on Fat-Free error reporting
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
        // If form has been submitted, validate
        if(!empty($_POST))
        {
            // Get data from form
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $member = $_POST['member'];

            // Add data to hive
            $f3->set('first_name', $first_name);
            $f3->set('last_name', $last_name);
            $f3->set('age', $age);
            $f3->set('gender', $gender);
            $f3->set('phone', $phone);
            $f3->set('member', $member);

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

                if($member == "premium")
                {
                    $memb = new PremiumMember($first_name, $last_name, $age, $gender, $phone);
                }
                else
                {
                    $memb = new Member($first_name, $last_name, $age, $gender, $phone);
                }
                $_SESSION['member'] = $memb;

                // redirect to profile
                $f3->reroute('/profile');
            }
        }
        // display a personal views
        $view = new Template();
        echo $view->render('views/personal.html');
    });

    $f3->route('GET|POST /profile', function($f3)
    {
        // if form has been submitted, validate
        if(!empty($_POST))
        {
            // get data from form
            $email = $_POST['email'];
            $state = $_POST['state'];
            $bio = $_POST['bio'];
            $seeking = $_POST['seeking'];

            // add data to hive
            $f3->set('email', $email);
            $f3->set('state', $state);
            $f3->set('bio', $bio);
            $f3->set('seeking', $seeking);

            // if data is valid
            if (validFormProfile())
            {
                // write data to Session
                $_SESSION['email'] = $email;
                $_SESSION['state'] = $state;

                if (empty($bio))
                {
                    $_SESSION['bio'] = "No Biography";
                }
                else
                {
                    $_SESSION['bio'] = $bio;
                }

                if (empty($seeking))
                {
                    $_SESSION['seeking'] = "Not prefer to answer";
                }
                else
                {
                    $_SESSION['seeking'] = $seeking;
                }

                $memb = $_SESSION['member'];
                $memb->setEmail($email);
                $memb->setState($state);
                $memb->setBio($bio);
                $memb->setSeeking($seeking);

                if ($memb instanceof PremiumMember)
                {
                    // redirect to interests
                    $f3->reroute('/interest');
                }
                $f3->reroute('/summary');
            }
        }

        // display a profile views
        $view = new Template();
        echo $view->render('views/profile.html');
    });

    $f3->route('GET|POST /interest', function($f3)
    {
        //if form has been submitted
        if (!empty($_POST))
        {
            // get data from form
            $indoor = $_POST['indoor'];
            $outdoor = $_POST['outdoor'];

            // add data to hive
            $f3->set('indoor', $indoor);
            $f3->set('outdoor', $outdoor);

            // if data is valid
            if (validFormInterests())
            {
                // write data to Session
                if (empty($indoor))
                {
                    $_SESSION['indoor'] = "No indoor interests";
                }
                else
                {
                    $_SESSION['indoor'] = implode(', ',$indoor);
                }

                if (empty($outdoor))
                {
                    $_SESSION['outdoor'] = "No outdoor interests";
                }
                else
                {
                    $_SESSION['outdoor'] = implode(', ', $outdoor);
                }

                $_SESSION['member']->setInDoorInterests($indoor);
                $_SESSION['member']->setOutDoorInterests($outdoor);
                // redirect to summary
                $f3->reroute('/summary');
            }
        }

        // display a interest views
        $view = new Template();
        echo $view->render('views/interest.html');
    });

    $f3->route('GET|POST /summary', function()
    {
        // display a order received views
        $view = new Template();
        echo $view->render('views/summary.html');
    });

    $f3->route('GET /admin', function($f3)
    {
        $db = new database();
        $db->connect();
        $members = $db->getMembers();
        $view = new Template();
        $f3->set('members', $members);
        $f3->set('database', $db);
        echo $view->render("views/admin.html");
    });

    // Run Fat-Free
    $f3->run();
