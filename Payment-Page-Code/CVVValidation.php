<?php
//Sets a card number and CVV. This would typically be entered by the card holder on your website.
$cardNumber = "4111111111111111";
$CVV = "123";
//If statement that calls the validateCVV function and will print whether or not the CVV is valid on the screen.
if(validateCVV($cardNumber, $CVV) == true) {
echo("Valid CVV");
}
else {
echo("Invalid CVV");
}
function validateCVV($cardNumber, $cvv)
{
//Removes any spaces or hyphens on the card number and CVV before validation continues.
$cardNumber = preg_replace("/\D/", "", $cardNumber);
$cvv = preg_replace("/\D/", "", $cvv);

//Checks to see whether the submitted value is numeric (After spaces and hyphens have been removed).
if(is_numeric($cardNumber)) {
//Checks to see whether the submitted value is numeric (After spaces and hyphens have been removed).
if(is_numeric($cvv)) {
//Splits up the card number into various identifying lengths.
$firstOne = substr($cardNumber, 0, 1);
$firstTwo = substr($cardNumber, 0, 2);

//If the card is an American Express
if($firstTwo == "34" || $firstTwo == "37") {
if (!preg_match("/^\d{4}$/", $cvv))
{
// The credit card is an American Express card but does not have a four digit CVV code
return false;
}
}
else if (!preg_match("/^\d{3}$/", $cvv)) {
// The credit card is a Visa, MasterCard, or Discover Card card but does not have a three digit CVV code
return false;
}
return true;
}
else {
return false;
}
}
else {
return false;
}
}
?>