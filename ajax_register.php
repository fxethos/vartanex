<?php
require('includes/application_top.php');

if($_POST['formsub']=="Send Me"){
    $verifycode = tep_create_random_value(6,'digits');
    $telephone = $_POST['phone'];
    $Qcheck = $OSCOM_Db->prepare('select auto_id from :table_'.TABLE_GETAPP_MOBILE.' where mobile = :mobile limit 1');
    $Qcheck->bindValue(':mobile', $telephone);
    $Qcheck->execute();
    if($Qcheck->fetch() !== false) {
        $sql_data_array = array('mobile' => $telephone,
                                'verifycode' => $verifycode,
                                'mdCreated' => 'now()');
        $OSCOM_Db->save(TABLE_GETAPP_MOBILE, $sql_data_array, ['mobile' => $telephone]);
    }else{
        $sql_data_array = array('mobile' => $telephone,
                                'verifycode' => $verifycode,
                                'is_active' => 1,
                                'dtCreated' => 'now()');
        $OSCOM_Db->save(TABLE_GETAPP_MOBILE, $sql_data_array);
    }
    $message = "Your OTP for downloading VartanEx app is {$verifycode}. Use this to verify your mobile number to get the download link.";
    //mobileVerification($telephone, $message); // Mobile Verification
}

if($_POST['formcodesub']=="Submit"){
    $telephone = $_POST['hidphone'];
    $verifycode = $_POST['verifycode'];
    $Qcheck = $OSCOM_Db->prepare('select auto_id from :table_'.TABLE_GETAPP_MOBILE.' where mobile =:mobile and verifycode =:verifycode limit 1');
    $Qcheck->bindValue(':mobile', $telephone);
    $Qcheck->bindValue(':verifycode', $verifycode);
    $Qcheck->execute();
    if($Qcheck->fetch() !== false) {
        $message = "Trade Ethereum quick & easy. Download VartanEx app: xxxxxxxx";
        //mobileVerification($telephone, $message); // Mobile Verification
        echo '<span style="color:#008000;">Please check your mobile for VartanEx download link.</span>';
    }else{
        echo '<span style="color:#002720;">Invalid OTP. Please try again.</span>';
    }
}
?>