<?php
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$steps = explode("*", $text);

$count = count($steps);

if ($text == "") {
    $response  = "CON What brand would you like to order \n";
    $response .= "1. B&H \n";
    $response .= "2. Dunhill\n";
    $response .= "3. Rothmans\n";
    $response .= "4. Pallmall\n";
    $response .= "5. Others";

} else if ($count == 1) {
    $response = "CON Select Quantity type\n";
    $response .= "1. Cartoon(s)\n";
    $response .= "2. Roll(s)\n";
    $response .= "3. Pack(s)\n";

} else if ($count == 2) {
    $response = "CON Input Quantity";

} else if ($count == 3){
    $randNum  = rand(1000, 100000);
    $response = "END Thank You... Your order number is ".$randNum;

    $order    = "Mobile Number: ".$phoneNumber."\nOrder Number: ".$randNum."\nBrand: ".getBrand($steps[0])."\nQuantity Type: ".getQType($steps[1])."\nQuantity: ".$steps[2];

    mail("lagossupport@bat.com", "New Order ".$randNum, $order);
    
} else
    $response = "END Invalid Request, Try Again!";

header('Content-type: text/plain');
echo $response;

function getBrand($s)
{
    if($s == 1)
        return "B&H";
    else if($s == 2)
        return "Dunhill";
    else if($s == 3)
        return "Rothmans";
    else if($s == 4)
        return "Pallmall";
    else if($s == 5)
        return "Others";
}

function getQType($s)
{
    if($s == 1)
        return "Cartoon(s)";
    else if($s == 2)
        return "Roll(s)";
    else if($s == 3)
        return "Pack(s)";
}