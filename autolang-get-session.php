<?php

function set_lang_get() {
	if (isset($_GET['lang'])) {

      if ($_GET['lang'] == "ge") {
        $_SESSION['lang'] = "ge";
      }
      if ($_GET['lang'] == "en") {
        $_SESSION['lang'] = "en";
      }
      if ($_GET['lang'] == "ru") {
        $_SESSION['lang'] = "ru";
      }

    }
}

 function auto_lang(){
	 if( isset($_SESSION["lang"]) ){

	 if ($_SESSION['lang'] == 'ge' ){

	$lang = "ge";

 }  elseif ($_SESSION['lang'] == 'ru' ){

	$lang = "ru";

 }  elseif ($_SESSION['lang'] == 'en' ){

	$lang = "en";

 }

} else {

	//default lang
	$lang = "en";

	$_SESSION['lang'] = $lang;
}

return $lang;
 }



?>
