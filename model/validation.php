<?php
/**
 * Created by PhpStorm.
 * User: Jittima Goodrich
 * Date: 5/3/2019
 * Time: 6:58 PM
 * File: validation.php
 */

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
