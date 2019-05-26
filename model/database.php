<?php
/**
 * Created by PhpStorm.
 * User: jrakk
 * Date: 5/26/2019
 * Time: 11:06 AM
 */

/*
 * CREATE TABLE member
(
	member_id INTEGER NOT NULL AUTO_INCREMENT,
	fname VARCHAR(254) NOT NULL,
	lname VARCHAR(254) NOT NULL,
	age INTEGER(3),
	gender CHAR(1),
	phone VARCHAR(12),
	email VARCHAR(254),
	state CHAR(2),
	seeking CHAR(1),
	bio TEXT,
	premium TINYINT,
	image VARCHAR(254),
	PRIMARY KEY(member_id)
);

CREATE TABLE interest
(
	interest_id INTEGER NOT NULL AUTO_INCREMENT,
	interest TEXT,
	type VARCHAR(30),
	PRIMARY KEY(interest_id)
);

CREATE TABLE memberinterest
(
	member_id INTEGER,
	interest_id INTEGER,
	FOREIGN KEY(member_id) REFERENCES member(member_id),
	FOREIGN KEY(interest_id) REFERENCES interest(interest_id),
	PRIMARY KEY(member_id, interest_id)
);
 */
require '/home/jgoodric/config-student.php';
class Database
{
    private $_dbh;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            // Instantiate a db object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            return $this->_dbh;
        } catch (PDOException $e) {
            $this->_dbh = $e->getMessage();
        }
    }

    function insertMember($member)
    {
        if (isset($this->_dbh)) {
            // prepare sql statement
            $sql = "INSERT INTO member(fname, lname, age, gender, phone, email, state, seeking, bio, premium)
                    VALUES(:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium)";
            // prepare the statement
            $statement = $this->_dbh->prepare($sql);

            // assign values
            $fname = $member->getFname();
            $lname = $member->getLname();
            $age = $member->getAge();
            $gender = $member->getGender();
            $phone = $member->getPhone();
            $email = $member->getEmail();
            $state = $member->getState();
            $seeking = $member->getSeeking();
            $bio = $member->getBio();

            if ($member instanceof PremiumMember) {
                $premium = 1;
            } else {
                $premium = 0;
            }

            // bind params
            $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
            $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
            $statement->bindParam(':age', $age, PDO::PARAM_STR);
            $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
            $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':state', $state, PDO::PARAM_STR);
            $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
            $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
            $statement->bindParam(':premium', $premium, PDO::PARAM_INT);

            //Execute the statement
            $statement->execute();
        }

    }
}