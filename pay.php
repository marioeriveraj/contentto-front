<?php
require_once("payment.php");
extract($_REQUEST);

$oPayment= new Payment($conektaTokenId, $card,$name,$description,$total,$email);

if($oPayment->pay()){
    //1 = true
    echo "1";
}else{
    echo $oPayment->error;
}

?>