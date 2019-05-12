<?php
/**
 * Created by PhpStorm.
 * User: Jittima Goodrich
 * Date: 5/11/2019
 * Time: 10:07 PM
 * The Member class provide a basic information of the member
 */

/**
 * Class Member represents a basic information
 *
 * The Member class represents a Member with name, age, gender,
 * phone, email, state, seeking, and bio.
 * @author Jittima Goodrich
 * @copyright 2019
 */
class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    /**
     * Member's information
     * Member constructor.
     * @param $fname Member's first name
     * @param $lname Member's last name
     * @param $age Member's age
     * @param $gender Member's gender
     * @param $phone Member's phone number
     * @return void
     */
    function __construct($fname, $lname, $age, $gender, $phone)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    /**
     * function that gets the first name
     * @return String First name
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * function that sets the first name
     * @param String $fname First name of the member
     * @return void
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * function that gets the last name
     * @return String Last name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * function that sets the last name
     * @param String $lname Last name of the member
     * @return void
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * function that gets the age of the member
     * @return int age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * function that sets the age
     * @param int $age age of the member
     * @return void
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * function that gets the gender
     * @return String gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * function that sets the gender
     * @param String $gender gender of the member
     * @return void
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * function that gets the phone number
     * @return String phone
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * function that sets the phone number
     * @param String $phone phone number of the member
     * @return void
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * function that gets the email
     * @return String email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * function that sets the email
     * @param String $email email address of the member
     * @return void
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * function that gets the state
     * @return String state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * function that sets the state
     * @param String $state state of the member
     * @return void
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * function that gets the gender the member is seeking
     * @return String gender seeking
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * function that sets the gender the member is seeking
     * @param String $seeking gender the member is seeking
     * @return void
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * function that gets the bio
     * @return String bio
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * function that sets the member's bio
     * @param String $bio bio of the member
     * @return void
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}