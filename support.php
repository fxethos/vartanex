<?php 
use OSC\OM\HTML;
use OSC\OM\OSCOM;
include("header.php"); 
error_reporting(E_ALL | E_STRICT | E_WARNING);?>
<script src="script/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript" src="script/script.js"></script>
<div class="container">
    <?php /*?><div class="col-lg-12">
        <div class="heading-title-1">
            <!--<h2 class="title iq-tw-6">Lorem Ipsum is simply dummy text</h2>-->
            <p>Need help? Start typing your query in the search bar, and we probably got an answer for you already.</p>
            <p>If you don't find what you're looking for, get in touch with our Support Desk using <a href="submit-request.php">this form</a> or write to us at <a href="mailto:hello@vartanex.in">hello@vartanex.in</a>. Catch us any time between 9 AM and 5 PM on all market business days.</p>
        </div>
        
<?php echo HTML::form('faq_form', ''.SITE_URL.'support-category.php', 'post', 'class="cmxform form-horizontal tasi-form" id="faq_form" role="form" enctype="multipart/form-data"', ['tokenize' => true, 'action' => 'process']); ?>
        <div class="search">
            <input class="typeahead search-input" typeahead-no-results="noResults" placeholder="Start typing..." id="faqSearch" name="faqSearch" type="text" autocomplete="off">
            <input type="submit" class="button-search" value="Submit"/>
        </div>
        </form>
    </div>
    <div class="spacer-1">&nbsp;</div><?php */?>
    <?php
     $FaqCat = $OSCOM_Db->prepare('select categories_id, categories_name from :table_'.TABLE_FAQ_CATEGORIES.' where is_active = :is_active ORDER BY categories_id ASC'); 
     $FaqCat->bindInt(':is_active', '1');   
    $FaqCat->execute();
    while($FaqCat_list = $FaqCat->fetch()){ 
    ?>
    <div class="col-lg-4">
        <h3 class="green-head"><?php echo $FaqCat_list['categories_name'];?> </h3>
        <ul class="list-1" >
        <?php
     $Faq = $OSCOM_Db->prepare('select faq_id, faq_ques, url_key from :table_'.TABLE_FAQ.' where categories_id = :categories_id and is_active = :is_active ORDER BY faq_ques ASC LIMIT 5'); 
     $Faq->bindInt(':categories_id', $FaqCat_list['categories_id']);
     $Faq->bindInt(':is_active', '1');   
    $Faq->execute();
    while($Faq_list = $Faq->fetch()){
        $rowlink = SITE_URL.'support_details.php?fid='.$Faq_list['faq_id'];
    ?>
        <li><a href="<?php echo $rowlink;?>"><?php echo $Faq_list['faq_ques'];?></a></li>
         <?php }?>
    </ul>
    <a href="<?php SITE_URL;?>support-category.php?catid=<?php echo $FaqCat_list['categories_id'];?>" class="button bt-green">View All</a>
    </div>  
    
    <?php }?>

    <div class="spacer-1">&nbsp;</div>
    <p>Didn't find what you're looking for? <a href="submit-request.php">Contact our customer support</a>.</p>
    
    <div class="spacer-1">&nbsp;</div>
    <div class="spacer-1">&nbsp;</div>  
</div>

       
<?php include("footer.php"); ?>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
    		$("#faq_form").validate({
    			rules: {
    				faqSearch: {
    					required : true
    				}
    			},    			
    			messages: {	
    				faqSearch: {
                        required : ""
    				}
    			},    			
    			invalidHandler: function(e, validator) {
    				var errors = validator.numberOfInvalids();
    				if (errors) {
    					var message = errors == 1
    						? 'You missed 1 field. It has been highlighted below'
    						: 'You missed ' + errors + ' fields.  They have been highlighted below';
    					$("div.errorTxt").html(message);
    					$("div.errorTxt").hide();
    					$("div.errorContainer").hide();
    				} else {
    					$("div.errorTxt").hide();
    					$("div.errorContainer").hide();
    				}
    			},
    			showErrors: function(){
    				//$(".serverValid").hide();
    				$(".serverValid").hide();
    				$(".errorContainer").hide();
    				this.defaultShowErrors();
    			}
    			//errorLabelContainer: $("div.errorTxt"),
    			//wrapper : "li"
    		});
    	});	
</script>
 