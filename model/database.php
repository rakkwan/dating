<?php
/**
 * Created by PhpStorm.
 * User: Jittima Goodrich
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

/**
 * Class Database connect to database
 * @author Jittima Goodrich
 * @version 1.0
 * @copyright 2019
 */
class Database
{
    private $_dbh;

    /**
     * Database constructor.
     * @return void
     */
    function __construct()
    {
        $this->connect();
    }

    /**
     * Connection to database
     * @return void
     */
    function connect()
    {
        try {
            // Instantiate a db object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //return $this->_dbh;
        } catch (PDOException $e) {
            $this->_dbh = $e->getMessage();
        }
    }

    /**
     * Insert a member into database
     * @param $member
     * @return void
     */
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

            // grab id
            $id = $this->_dbh->lastInsertId();

            //check if Premium member to insert
            if($member instanceof PremiumMember) {
                $indoor = $member->getInDoorInterests();
                $outdoor = $member->getOutDoorInterests();
                if(isset($indoor))
                {
                    $this->insertInterest($indoor, $id);
                }
                if(isset($outdoor))
                {
                    $this->insertInterest($outdoor, $id);
                }
            }
        }
    }

    /**
     * Insert interests into database
     * @param $interest
     * @param $id
     */
    private function insertInterest($interest, $id)
    {
        $sql = "INSERT INTO memberinterest(member_id, interest_id)
                VALUES(:member, :interest)";
        $statement = $this->_dbh->prepare($sql);

        foreach ($interest as $value) {
            // bind interest id and member id
            $statement->bindParam(":member", $id, PDO::PARAM_INT);
            $statement->bindParam(":interest", $this->getID($value), PDO::PARAM_INT);

            //Execute the statement
            $statement->execute();
        }
    }

    /**
     * check interest id
     * @param $interest_id id of interest
     * @return mixed Int interest
     */
    private function getID($interest_id)
    {
        $sql = "SELECT interest_id FROM interest WHERE interest_id = :interest_id";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':interest', $interest_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_NUM);
    }

    /**
     * Retrieves members from the database
     * @return String from database
     */
    function getMembers()
    {
        $sql = "SELECT * FROM member ORDER BY lname";
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a member from the database
     * @param $member_id - the member id
     * @return String from the database
     */
    function getMember($member_id)
    {
        $sql ="SELECT * FROM member WHERE member_id = :member_id";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(":member_id", $member_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * String of interest
     * @param $member_id id of the member
     * @return String interest
     */
    function getInterests($member_id)
    {
        $sql = "SELECT i.interest FROM memberinterest AS mi INNER JOIN interest AS i 
                ON mi.interest_id = i.interest_id WHERE mi.member_id = :member_id";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':member_id', $member_id, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}