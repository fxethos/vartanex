<?php 
use OSC\OM\HTML;
use OSC\OM\OSCOM;
include("header.php"); 
$faqid = $_REQUEST['fid'];
?>
<div class="container">
    <!--<div class="col-lg-12">
        <div class="heading-title-1">
            <h2 class="title iq-tw-6">Lorem Ipsum is simply dummy text</h2>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<?php //echo HTML::form('faq_form', '', 'post', 'class="cmxform form-horizontal tasi-form" id="faq_form" role="form" enctype="multipart/form-data"', ['tokenize' => true, 'action' => 'process']); ?>
        <div class="search">
            <input class="typeahead search-input" onfocus="if (this.value == 'Search') {this.value=''}" onblur="if(this.value == '') { this.value='Search'}" value="Search" id="faqSearch" name="faqSearch" type="text">
            <input type="submit" class="button-search" value="Submit"/>
        </div>
        </form>
    </div>-->
    <div class="spacer-1">&nbsp;</div>
    <?php
     $Faq = $OSCOM_Db->prepare('select faq_id, faq_ques, url_key, faq_ans from :table_'.TABLE_FAQ.' where faq_id = :faq_id and is_active = :is_active ORDER BY faq_ques ASC'); 
     $Faq->bindInt(':faq_id', $faqid);
     $Faq->bindInt(':is_active', '1');   
    $Faq->execute();
    while($Faq_list = $Faq->fetch()){
    ?>
    <div class="col-lg-12">
        <h3 class="green-head"><?php echo $Faq_list['faq_ques'];?> </h3>
        
        <!--<div style="font-weight: bold;"><?php //echo $Faq_list['faq_ques'];?> </div>
        <br />-->
        <div><?php echo $Faq_list['faq_ans'];?></li></div>
        <hr />
        <br />
          <div style="text-align:center; width:100%; float:left ">
     <a href="<?php SITE_URL;?>support.php" class="button bt-green">Go Back</a>
     </div>
    </div>  
    
    <?php }?>

    <div class="spacer-1">&nbsp;</div>
    
</div>

       
<?php include("footer.php"); ?>