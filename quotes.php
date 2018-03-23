<?php
error_reporting('E_ERROR | E_WARNING | E_PARSE');
ob_start();
session_start();
$opts = array('http'=>array('method'=>"GET", 'header'=>"User-Agent: lashaparesha api script\r\n"));
$context = stream_context_create($opts);
$url = 'https://koinex.in/api/ticker';
$file = file_get_contents($url, false, $context);
$response = json_decode($file);
//print_r($response->prices);
/*
echo 'BTC/INR: '.$response->prices->BTC;
echo "<br />";
echo 'ETH/INR: '.$response->prices->ETH;
echo "<br />";
echo 'XRP/INR: '.$response->prices->XRP;
echo "<br />";
echo 'LTC/INR: '.$response->prices->LTC;
echo "<br />";
echo 'BCH/INR: '.$response->prices->BCH;
echo "<br />";
echo 'GNT/INR: '.$response->prices->GNT;
echo "<br />";
echo 'MIOTA/INR: '.$response->prices->MIOTA;
echo "<br />";
echo 'OMG/INR: '.$response->prices->OMG;*/
?>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />

<style>
.box-set{float:left; margin:5px 2px; text-align:center; padding:0px 25px 12px; width:19%; font-family: 'PT Sans', sans-serif;  background:url(images/ap-bg.jpg) no-repeat center}
.box-set img{ line-height:0}
.box-set h1{font-size:20px; margin-bottom:0px; font-weight:500; margin-top:0; color:#30ad8b; line-height:15px}
.box-set h5{font-size:20px; margin:5px 0 10px; font-weight:400; color:#333; line-height:20px }
.box-set a{ color:#011b16; text-decoration:none; font-size:14px; width:auto !important; margin:0; padding:5px 30px}
.box-set a:hover{ color:#037662}
.btn-2{background:#30ad8b; border-radius:15px 15px 0 0; color:#fff !important; padding:5px 15px; margin-top:10px}
.btn:hover{background:#30ad8b ; border-radius:15px 15px 0 0; color:#fff !important; padding:5px 15px}

.btn-1{background:#ccc; border-radius:15px 15px 0 0; color:#fff !important; padding:5px 15px; margin-top:10px}

@media(max-width:767px) {
.box-set{width:75%}
}
</style>
<script>

function startTrading() {
    document.formsend.phone.focus();
}
</script>
<div class="box-set">
<img src="images/ap-1.png"  alt="img"/>
<h1>Ethereum</h1>
<h5><i class="fa fa-rupee"></i> <?php if($response->prices->ETH !=""){ echo $response->prices->ETH; $_SESSION['ETH'] = $response->prices->ETH; }else{echo $_SESSION['ETH']; } //ETH/INR ?></h5>
<a href="javascript:void(0);" class="btn-2" onclick="startTrading();">Start Trading</a>
</div>

<div class="box-set">
<img src="images/ap-2.png"  alt="img"/>

<h1>Bitcoin</h1>
<h5><i class="fa fa-rupee"></i> <?php if($response->prices->BTC !=""){ echo $response->prices->BTC; $_SESSION['BTC'] = $response->prices->BTC; }else{echo $_SESSION['BTC']; } //BTC/INR ?></h5>
<a class="btn-1">Coming up</a>
</div>

<div class="box-set">
<img src="images/ap-3.png" alt="img" />

<h1>Bitcoin Cash</h1>
<h5><i class="fa fa-rupee"></i> <?php if($response->prices->BCH !=""){ echo $response->prices->BCH; $_SESSION['BCH'] = $response->prices->BCH; }else{echo $_SESSION['BCH']; } //BCH/INR ?></h5>
<a class="btn-1">Coming up</a>
</div>

<div class="box-set">
<img src="images/ap-4.png" alt="img" />

<h1>Ripple</h1>
<h5><i class="fa fa-rupee"></i> <?php if($response->prices->XRP !=""){ echo $response->prices->XRP; $_SESSION['XRP'] = $response->prices->XRP; }else{echo $_SESSION['XRP']; } //XRP/INR ?></h5>
<a class="btn-1">Coming up</a>
</div>

<div class="box-set">
<img src="images/ap-5.png" alt="img" />

<h1>Litecoin</h1>
<h5><i class="fa fa-rupee"></i> <?php if($response->prices->LTC !=""){ echo $response->prices->LTC; $_SESSION['LTC'] = $response->prices->LTC; }else{echo $_SESSION['LTC']; } //LTC/INR ?></h5>
<a class="btn-1">Coming up</a>
</div>
