<?php

class CarPolicy
{
    private $policyNumber; #Policy number for car policy
    private $yearlyPremium; #Yearly premium
    private $dateOfLastClaim; #Date of the last claim
    
    #Constructor
    public function __construct($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }
    #set the date of last claim
    public function setDateOfLastClaim($dateOfLastClaim)
    {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    public function getTotalYearsNoClaims()
    {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    public function __toString()
    {
        return $this->policyNumber . ": " . $this->yearlyPremium;
    }
}

#Print
$carPolicy = new CarPolicy('1234', 1000);
$carPolicy->setDateOfLastClaim('2022-01-01');
echo $carPolicy . "\n";  // Output: 1234: 1000
echo "Total Years No Claims: " . $carPolicy->getTotalYearsNoClaims() . "\n";