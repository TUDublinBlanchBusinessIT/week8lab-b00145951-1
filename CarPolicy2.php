<?php

class CarPolicy
{
    private $policyNumber; #Policy num for car policy
    private $yearlyPremium; #yearly premium
    private $dateOfLastClaim; # date of last claim

    #constructor
    public function __construct($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }

    #setdate of last claim
    public function setDateOfLastClaim($dateOfLastClaim)
    {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    #get year with no claims
    public function getTotalYearsNoClaims()
    {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    #get discount based on no claims
    public function getDiscount()
    {
        $yearsNoClaims = $this->getTotalYearsNoClaims();

        if ($yearsNoClaims >= 3 && $yearsNoClaims <= 5) {
            return 0.10; // 10% discount
        } elseif ($yearsNoClaims > 5) {
            return 0.15; // 15% discount
        } else {
            return 0; // No discount
        }
    }

    #yearly premium with discount
    public function getDiscountedPremium()
    {
        $discount = $this->getDiscount();
        $discountedPremium = $this->yearlyPremium * (1 - $discount);
        return $discountedPremium;
    }

    public function __toString()
    {
        return $this->policyNumber . ": " . $this->yearlyPremium;
    }
}