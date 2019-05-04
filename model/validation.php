<?php
/**
 * Created by PhpStorm.
 * User: Jittima Goodrich
 * Date: 5/3/2019
 * Time: 6:58 PM
 * File: validation.php
 */

// valid the personal form
function validFormPersonal()
{
    global $f3;
    $isValid = true;

    if (!validName($f3->get('first_name')))
    {
        $isValid = false;
        $f3->set("errors['first_name']", "Please enter a first name");
    }

    if (!validName($f3->get('last_name')))
    {
        $isValid = false;
        $f3->set("errors['last_name']", "Please enter a last name");
    }

    if (!validAge($f3->get('age')))
    {
        $isValid = false;
        $f3->set("errors['age']", "Please enter 18 to 118");
    }

    if (!validPhone($f3->get('phone')))
    {
        $isValid = false;
        $f3->set("errors['phone']", "Please enter a phone number");
    }
    return $isValid;
}

// valid the profile form
function validFormProfile()
{
    global $f3;
    $isValid = true;

    if (!validEmail($f3->get('email')))
    {
        $isValid = false;
        $f3->set("errors['email']", "Please enter an email");
    }
    return $isValid;
}

// valid the interests form
function validFormInterests()
{
    global $f3;
    $isValid = true;

    if (!validIndoor($f3->get('indoor')))
    {
        $isValid = false;
        $f3->set("errors['indoor']", "Invalid selection!");
    }

    if (!validOutdoor($f3->get('outdoor')))
    {
        $isValid = false;
        $f3->set("errors['outdoor']", "Invalid selection");
    }
    return $isValid;
}

// check to see if name is all alphabetic
function validName($name)
{
    return !empty($name) && ctype_alpha($name);
}

// check to see that age is numeric and between 18 and 118
function validAge($age)
{
    return !empty($age) && ctype_digit($age) && $age >= 18 && $age <= 118;
}

// check to see that the phone number is valid
function validPhone($phone)
{
    return !empty($phone) && ctype_digit($phone) && strlen($phone) == 10;
}

// check to see that email address is valid
function validEmail($email)
{
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

// check each selected outdoor interest
function validOutdoor($outdoor)
{
    global $f3;

    if (empty($outdoor))
    {
        return true;
    }

    foreach ($outdoor as $outdoorInterest)
    {
        if (!in_array($outdoorInterest, $f3->get('outdoorInterests')))
        {
            return false;
        }
    }
    return true;
}

// check each selected indoor interest
function validIndoor($indoor)
{
    global $f3;

    if (empty($indoor))
    {
        return true;
    }

    foreach ($indoor as $indoorInterest)
    {
        if (!in_array($indoorInterest, $f3->get('indoorInterests')))
        {
            return false;
        }
    }
    return true;
}
