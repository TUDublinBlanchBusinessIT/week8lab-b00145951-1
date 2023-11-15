<?php
date_default_timezone_set('Europe/Dublin');
include("CarPolicy2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $policyNumber = $_POST["policyNumber"];
    $yearlyPremium = $_POST["yearlyPremium"];
    $dateOfLastClaim = $_POST["dateOfLastClaim"];

    #Create CarPolicy object
    $carPolicy = new CarPolicy($policyNumber, $yearlyPremium);
    $carPolicy->setDateOfLastClaim($dateOfLastClaim);

    #initial premium
    echo "Initial Premium: $" . $yearlyPremium . "\n";

    #discounted premium
    echo "Discounted Premium: $" . $carPolicy->getDiscountedPremium() . "\n";
} else {
    echo "Invalid request method.";
}
?>