<?php

function selected_page ($input) {

$access_level = $_SESSION['access_level'];
if ($access_level > 1){
$items = array(
          array("link"=>"cdr.php", "image"=>"cdr16.png", "name"=>"Κλήσεις"),
	  );
}
else {
$items = array(
          array("link"=>"cdr.php", "image"=>"cdr16.png", "name"=>"Κλήσεις"),
          array("link"=>"extensions.php", "image"=>"users16.png", "name"=>"Αριθμοδότηση"),
	  );

}

$wwwpath = reverse_strrchr($input, '/');
$cur_page = substr(strrchr($input, '/'), 1);

foreach ($items as $val) {
  if ($cur_page == $val['link'] ) {
		$selected = "1";
	} else {
		$selected = "0";
	}
    $pages[]=array( "page"=>$val['link'], "image"=>$val['image'], "name" =>$val['name'], "is_selected"=>"$selected" );

  }
    
return $pages;
}

function reverse_strrchr($haystack, $needle)
{
    $pos = strrpos($haystack, $needle);
    if($pos === false) {
        return $haystack;
    }
    return substr($haystack, 0, $pos + 1);
}

?> 
