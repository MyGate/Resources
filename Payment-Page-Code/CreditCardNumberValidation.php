 <?php
//Sets a card number. This would typically be entered by the card holder on your website.
$cardNumber = "4111111111111111";
//If statement that calls the luhn_check function and will print whether or not the card is valid on the screen.
if(performLuhnCheck($cardNumber) == TRUE) {
echo("Valid Card");
}
else {
echo("Invalid Card");
}
//luhn_check function. Named as such because the algorithm used to check the validity of the credit card is known as the Luhn or MOD10 check.
function performLuhnCheck($number) {
//Removes any spaces or hyphens on the card number before validation continues.
$number = preg_replace("/\D/", "", $number);
//Checks to see whether the submitted value is numeric (After spaces and hyphens have been removed).
if(is_numeric($number)) {
//Set the string length and parity
$number_length = strlen($number);
$parity = $number_length % 2;

//Loop through each digit and perform checks
$total = 0;
for ($i = 0; $i < $number_length; $i++) {
$digit = $number[$i];
//Multiply alternate digits by two
if ($i % 2 == $parity) {
$digit*=2;
if ($digit > 9) { 
$digit-=9;
}
}
// Total up the digits
$total+=$digit;
}

//If the total mod 10 equals 0, the number is valid. There can be instatnces where false credit cards will pass this function (test cards, etc). These will however be declined by the merchant bank during the authorization process.
return ($total % 10 == 0) ? TRUE : FALSE;
}
else {
return FALSE;
}
}
?>