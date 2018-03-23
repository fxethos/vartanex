<?php
use OSC\OM\HTML;
use OSC\OM\OSCOM;
require('includes/application_top.php');

 //$booking_details=base64_decode($_REQUEST['seat_value']);

    $faqkeyword = $_POST['query'];
    
    if($faqkeyword!=""){
//	//$where_faqst = " faq_ques like '%" . $faqkeyword . "%'";
//    if(!empty($faqkeyword)) {
//		$keyword = $faqkeyword;
//		$wordsAry = explode(" ", $keyword);
//		$wordsCount = count($wordsAry);
//		$queryCondition = " WHERE ";
//		for($i=0;$i<$wordsCount;$i++) {
//			//$queryCondition .= "faq_ques LIKE '%" . $wordsAry[$i] . "%' OR faq_ans LIKE '%" . $wordsAry[$i] . "%'";
//            $queryCondition = " faq_ques like '%" . $wordsAry[$i] . "%'";
//			if($i!=$wordsCount-1) {
//				$queryCondition .= " OR ";
//			}
//		}
//	}    
    $where_faqst = " faq_ques like '%" . $faqkeyword . "%'";
    $Faqsearch = $OSCOM_Db->prepare('select SQL_CALC_FOUND_ROWS faq_id, faq_ques, url_key from :table_'.TABLE_FAQ.' where '.$where_faqst.' ORDER BY faq_ques ASC LIMIT 10');    
    $Faqsearch->execute();
    $FaqsearchResult = array();
    if($Faqsearch->getPageSetTotalRows()>0) {
    while($faqs = $Faqsearch->fetch()){ 
        $rowlink = SITE_URL.'support_details.php?fid='.$faqs['faq_id'];
        $FaqsearchResult[] = array("title"=>$faqs['faq_ques'],"href"=>$rowlink);
        //$FaqsearchResult[] = '<a href="'.SITE_URL.'support_details.php?id='.$faqs['faq_id'].'">'.$faqs['faq_ques'].'</a>';
        }
    }/*else{
        $FaqsearchResult[] = array("title"=>'No data found!',"href"=>'#');
    }*/
        echo json_encode($FaqsearchResult);
    }
    
?>
