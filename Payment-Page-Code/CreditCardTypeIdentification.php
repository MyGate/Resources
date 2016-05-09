<?php
//Sets a card number. This would typically be entered by the card holder on your website.
$cardNumber = "4111111111111111";
//This will print out the returned card type from the identifyCreditCard function.
echo(identifyCreditCard($cardNumber));
function identifyCreditCard ($number)
{
//Removes any spaces or hyphens on the card number before validation continues.
$number = preg_replace("/\D/", "", $number);

//Checks to see whether the submitted value is numeric (After spaces and hyphens have been removed).
if(is_numeric($number)) {
//Splits up the card number into various identifying lengths.
$firstOne = substr($number, 0, 1);
$firstTwo = substr($number, 0, 2);
$firstThree = substr($number, 0, 3);
$firstFour = substr($number, 0, 4);
$firstFive = substr($number, 0, 5);
$firstSix = substr($number, 0, 6);

if($firstOne == "4") {
return "Visa";
}
if($firstTwo >= "51" && $firstTwo <= "55") {
return "MasterCard";
}
if($firstTwo == "34" || $firstTwo == "37") {
return "American Express";
}
if($firstTwo == "36") {
return "Diners Club International";
}
if($firstFour == "2014" || $firstFour == "2149") {
return "Diners Club enRoute";
}
if($firstThree >= "300" && $firstThree <= "305") {
return "Diners Club Carte Blanche";
}
if(($firstFour == "6011") || ($firstSix >= "622126" && $firstSix <= "622925") || ($firstThree >= "644" && $firstThree <= "649") || ($firstTwo == "65")) {
return "Discover Card";
}
if($firstTwo >= "35") {
return "JCB";
}

//If the above logic does not identify the card number, return this message.
return "Other / Unknown Card Type";
}
else {
//If the incoming card number is not numeric, return this message.
return "Unknown Card Type / Number";
}
}
?>       