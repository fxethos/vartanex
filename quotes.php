<?php
require_once('includes/application_top.php');
error_reporting(E_ALL | E_STRICT | E_WARNING);
$Cryptoval = $OSCOM_Db->prepare('select SQL_CALC_FOUND_ROWS symbol, price, buy_price, sell_price from :table_'.TABLE_CRYPTO_VALUE.' WHERE name="Ethereum" ORDER BY symbol ASC');
$Cryptoval->execute();
?>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
<style>
.box-set-new {
    border: 1px solid #30ad8b;
    padding: 0;
    position: relative;
    text-align: center;
    margin: 30px 10px;
    height: 130px;
	width: 200px
}.box-set-new h1 {
    font-size: 20px;
    margin-bottom: 0px;
    font-weight: 500;
    margin-top: 30px;
    color: #30ad8b;
    line-height: 15px;
    text-align: center;
}
	.box-set-inner{
		padding: 0;
	}
	.box-set-inner h2 {
    background: url(images/img1.png) no-repeat;
    display: flex;
    margin-top: 10px;
    margin-bottom: 5px;
    background-position: bottom;
    background-size: cover;
}
	span.box-text-1 {
    text-align: left;
    float: left;
    width: 100%;
    padding-left: 10px;
    color: #fff;
    font-size: 15px;
    line-height: 20px;
}
	span.box-text-2 {
    text-align: right;
    width: 100%;
    color: #fff;
    font-size: 15px;
    padding-right: 5px;
    line-height: 20px;
}
	.box-set-img{
		position: absolute;
		margin-top: -45px;
	}
	.btn-1{
		background: #ccc;
		 border-radius: 15px 15px 0 0;
    color: #fff !important;
    padding: 5px 15px;
    margin-top: 10px;
	}
	.btn-2 {
    background: #30ad8b;
    border-radius: 15px 15px 0 0;
    color: #fff !important;
    padding: 5px 15px;
    margin-top: 10px;
}
	.box-set-new a {
    color: #011b16;
    text-decoration: none;
    font-size: 14px;
    width: auto !important;
    margin: 0;
    padding: 5px 30px;
}
	.bot-btn{
		position: absolute;
		bottom: -10px;
		left: 0;
		right: 0;
	}
	.box-set-img img{
		width:75px;
	}
@media(max-width:767px) {

	.box-set-new{
		width: inherit;
	}
}
</style>
<script>

function startTrading() {
    document.formsend.phone.focus();
}
</script>
<?php 
if($Cryptoval->getPageSetTotalRows()>0) {
    //while($cryptores = $Cryptoval->fetch()){ 
	$cryptores = $Cryptoval->fetchAll();
	//echo '<pre>';
	//print_r($cryptores);
?>
<section class="box-set-out">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-3 col-xs-12 box-set-new">
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-img">
				<img src="images/ap-1.png" class="img-responsive center-block" alt="img">
			</div>
			<h1>Ethereum</h1>
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-inner text-left">
				<h2><span class="box-text-1">Buy <br><i class="fa fa-rupee"></i>  <?php echo $cryptores[0]['buy_price'];?> </span><span class="box-text-2">Sell <br><i class="fa fa-rupee"></i> <?php echo $cryptores[0]['sell_price'];?></span></h2>
			</div>
			<div class="bot-btn">
				<a href="javascript:void(0);" class="btn-2" onclick=" startTrading();">Start Trading</a>
			</div>
		</div>
		
		<div class="col-md-2 col-sm-3 col-xs-12 box-set-new">
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-img">
				<img src="images/ap-2.png" class="img-responsive center-block" alt="img">
			</div>
			<h1>Bitcoin</h1>
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-inner text-left">
				<h4 style="text-align: center;padding-top:10px"><i class="fa fa-rupee"></i></h4>
			</div>
			<div class="bot-btn">
				<a class="btn-1">Coming Up</a>
			</div>
		</div>
		
		<div class="col-md-2 col-sm-3 col-xs-12 box-set-new">
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-img">
				<img src="images/ap-3.png" class="img-responsive center-block" alt="img">
			</div>
			<h1>Bitcoin Cash</h1>
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-inner text-left">
				<h4 style="text-align: center;padding-top:10px"><i class="fa fa-rupee"></i></h4>
			</div>
			<div class="bot-btn">
				<a class="btn-1">Coming Up</a>
			</div>
		</div>
		
		<div class="col-md-2 col-sm-3 col-xs-12 box-set-new">
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-img">
				<img src="images/ap-4.png" class="img-responsive center-block" alt="img">
			</div>
			<h1>Ripple</h1>
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-inner text-left">
				<h4 style="text-align: center;padding-top:10px"><i class="fa fa-rupee"></i></h4>
			</div>
			<div class="bot-btn">
				<a class="btn-1">Coming Up</a>
			</div>
		</div>
		
		<div class="col-md-2 col-sm-3 col-xs-12 box-set-new">
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-img">
				<img src="images/ap-5.png" class="img-responsive center-block" alt="img">
			</div>
			<h1>Litecoin</h1>
			<div class="col-md-12 col-sm-12 col-xs-12 box-set-inner text-left">
				<h4 style="text-align: center;padding-top:10px"><i class="fa fa-rupee"></i></h4>
			</div>
			<div class="bot-btn">
				<a class="btn-1">Coming Up</a>
			</div>
		</div>
		
	</div>
</section>
<?php
//}
}
?>
