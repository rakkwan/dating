<?php
/**
 * Created by PhpStorm.
 * User: Jittima Goodrich
 * Date: 5/12/2019
 * Time: 11:31 AM
 * The PremiumMember class the member have the opportunity to provide more information
 */

/**
 * Class PremiumMember represents a premium membership
 *
 * Only premium members get to choose the interests
 * @author Jittima Goodrich
 * @copyright 2019
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    function __construct($fname, $lname, $age, $gender, $phone)
    {
        parent::__construct($fname, $lname, $age, $gender, $phone);
    }

    /**
     * function that gets the indoor interests of the member
     * @return array of indoor interests
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * function that sets the indoor interests of the member
     * @param array $inDoorInterests of the member
     * @return void
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * function that gets the outdoor interests
     * @return array of outdoor interests
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * function that sets the outdoor interests
     * @param array $outDoorInterests of the member
     * @return void
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

}