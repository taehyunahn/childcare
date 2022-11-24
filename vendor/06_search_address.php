<?php



$text01="도로명주소, 건물명 또는 지번입력";

if($search){

    $search_text=$search1;
    $search_text=urlencode($search_text);

    $currentPage=1;
    $countPerPage=10;
    $confmKey="devU01TX0FVVEgyMDIyMDEwNTE1NTYzNTExMjEwMTY=";

    $xmlurl="https://www.juso.go.kr/addrlink/addrLinkApi.do?currentPage=$currentPage&countPerpage=$countPerpage&keyword=$search_text&confmKey=$confmKey&resultType=xml";

    $xml_string = file_get_content($xmlurl);
    $xml = simplexml_load_string($xml_string);
    $count=count($xml -> juso);
    $total_count=$xml -> common -> totalCount;

    for($i=0; $i<$count; $i++){
        $zip_code=$xml -> juso[$i] -> zipNo;
        $address1=$xml -> juso[$i] -> roadAddr;
        $address2=$xml -> juso[$i] -> jibunAddr;

        $STR2.="
        <tr height=25 onmouseover=this.style.backgroundColor='#eeeeee' onmouseout=this.style.
        backgroundColor=''>
            <td width= '400' colspan=2 align=left style='cursor:pointer;border-bottom:1px solid #dddddd;
            text-align:left;padding:5px;' onclick=\"inzip('".substr($zip_code,0,6)."','','".addslashes
            ($address1)."'.'')\">
                <div>$address1</div>
                <div>$address2</div>
            </td>
        </tr>
        ";
    }
    
    
}else{
    $search1=$text01;
}
?>