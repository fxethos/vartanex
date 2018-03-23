<?php 
use OSC\OM\HTML;
use OSC\OM\OSCOM;
include("header.php"); 
//error_reporting(E_ALL | E_STRICT | E_WARNING);
$catid = $_REQUEST['catid'];
if($catid!=''){
    $_SESSION['keyword'] ='';
}
if($_REQUEST['faqSearch']!=''){
$_SESSION['keyword'] = $_REQUEST['faqSearch'];
}else{
  $_SESSION['keyword'] = $_SESSION['keyword'];  
}

//Search Functions

function highlight($text, $words, $case = '1', $color='yellow') { 
	  $words = trim($words); 
	 $wordsArray = explode(' ', $words); 
	 
	 foreach($wordsArray as $word) { 
	  if(strlen(trim($word)) != 0) 
	   if ($case) {
		$text = eregi_replace($word, '<font style="background:' . $color . '";>\\0</font>', $text);
		 } else {
		$text = ereg_replace($word, '<font style="background:' . $color . '";>\\0</font>', $text); 
	   }
	  } 
	 return $text; 
	} 
    
    function Strip_all_tags($string, $remove_breaks = true) {
	$string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
	$string = strip_tags($string);

	if ( $remove_breaks )
		$string = preg_replace('/[\r\n\t ]+/', ' ', $string);

	return trim( $string );
	}
    
    function highlightKeywords($text, $phrase, $radius = 200, $ending = "...") { 
			
         $phraseLen = strlen($phrase); 
       if ($radius < $phraseLen) { 
             $radius = $phraseLen; 
         } 

    	 //$phrases = explode (' ',$phrase);
		$phrases = join('|', explode(' ', preg_quote($phrase)));
		$text = Strip_all_tags( $text );
    	 foreach ($phrases as $phrase) {
    		 $pos = strpos(strtolower($text), strtolower($phrase)); 
    		 if ($pos > -1) break;
    	 }

         $startPos = 0; 
         if ($pos > $radius) { 
             $startPos = $pos - $radius; 
         } 

         $textLen = strlen($text); 

         $endPos = $pos + $phraseLen + $radius; 
         if ($endPos >= $textLen) { 
             $endPos = $textLen; 
         } 

         $excerpt = substr($text, $startPos, $endPos - $startPos); 
         if ($startPos != 0) { 
             $excerpt = substr_replace($excerpt, $ending, 0, $phraseLen); 
         } 

         if ($endPos != $textLen) { 
             $excerpt = substr_replace($excerpt, $ending, -$phraseLen); 
         } 
		
		$excerpt = highlight($excerpt, $phrases);
	  

    return $excerpt; 
   }

?>
<div class="container">   
    
    <?php
    if($_SESSION['keyword']!=""){   
    ?>
     <div class="col-lg-12">
        <h5> Search Keyword: <span class="green-head" style="width:100%"><?php echo ucfirst($_SESSION['keyword']);?></span> </h5>
        
	<?php 
    $keyword = "";	
	$queryCondition = "";
	if(!empty($_SESSION["keyword"])) {
		$keyword = $_SESSION['keyword'];
		$wordsAry = explode(" ", $keyword);
		$wordsCount = count($wordsAry);
		//$queryCondition .= " WHERE ";
		for($i=0;$i<$wordsCount;$i++) {
			//$queryCondition .= "faq_ques LIKE '%" . $wordsAry[$i] . "%' OR faq_ans LIKE '%" . $wordsAry[$i] . "%'";
            $queryCondition .= " faq_ques like '%" . $wordsAry[$i] . "%'";
			if($i!=$wordsCount-1) {
				$queryCondition .= " OR ";
			}
		}
	}
    
      
    //$where_faqst = " faq_ques like '%" . $_SESSION['keyword'] . "%'";
    
        $SearchFaq = $OSCOM_Db->prepare('select SQL_CALC_FOUND_ROWS faq_id, faq_ques, url_key, faq_ans from :table_'.TABLE_FAQ.' WHERE '.$queryCondition.' and is_active = :is_active ORDER BY faq_ques ASC');     
        $SearchFaq->bindInt(':is_active', '1');   
        $SearchFaq->execute();
        if($SearchFaq->getPageSetTotalRows()>0) {
        while($SearchFaq_list = $SearchFaq->fetch()){
                $new_title = $SearchFaq_list['faq_ques'];
				if(!empty($_SESSION["keyword"])) {
					$new_title = highlightKeywords($SearchFaq_list['faq_ques'],$_SESSION["keyword"]);
				}
    ?>
   
        
        <div style="font-weight: bold;"><?php echo $new_title;?> </div>
        <br />
        <div><?php echo $SearchFaq_list['faq_ans'];?></li></div>
        <hr />
        <br />
    
    
    <?php } 
    }else{
        echo '<div style="font-weight: bold;">No results found.</div>';
    }?>
     <div style="text-align:center; width:100%; float:left ">
     <a href="<?php SITE_URL;?>support.php" class="button bt-green">Go Back</a>
     </div>
    </div>  
    <div class="spacer-1">&nbsp;</div>
   <?php }else if($catid!=""){
    
     $FaqCat = $OSCOM_Db->prepare('select categories_id, categories_name from :table_'.TABLE_FAQ_CATEGORIES.' where categories_id = :categories_id and is_active = :is_active ORDER BY categories_name ASC'); 
     $FaqCat->bindInt(':categories_id', $catid); 
     $FaqCat->bindInt(':is_active', '1');  
    $FaqCat->execute();
    while($FaqCat_list = $FaqCat->fetch()){ 
    ?>
    <div class="col-lg-12">
        <h3 class="green-head"><?php echo $FaqCat_list['categories_name'];?> </h3>
        
        <?php
     $Faq = $OSCOM_Db->prepare('select faq_id, faq_ques, url_key, faq_ans from :table_'.TABLE_FAQ.' where categories_id = :categories_id and is_active = :is_active ORDER BY faq_ques ASC'); 
     $Faq->bindInt(':categories_id', $FaqCat_list['categories_id']);
     $Faq->bindInt(':is_active', '1');   
    $Faq->execute();
    while($Faq_list = $Faq->fetch()){ 
    ?>
        <div style="font-weight: bold;"><?php echo $Faq_list['faq_ques'];?> </div>
        <br />
        <div><?php echo $Faq_list['faq_ans'];?></li></div>
        <hr />
        <br />
         <?php }?>
          <div style="text-align:center; width:100%; float:left ">
    <a href="<?php SITE_URL;?>support.php" class="button bt-green">Go Back</a>
    </div>
    </div>  
    
    <?php }?>

    <div class="spacer-1">&nbsp;</div>
   <?php }?> 
</div>

       
<?php include("footer.php"); ?>