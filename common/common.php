<?php
define("BASE_URL", "/dogrunapp/");

function getRightNowSqlDate(){
    return date('Y-m-d H:i:s');
}

/**
 * @param String - the html you'd like escaped
 * @return String - the escaped string
 */
function escapeHTML($html){
    return htmlspecialchars($html, ENT_HTML5, 'UTF-8');
}

/**
 * redirects user to passed in path
 * @param String - the path you wish to have the user redirected to
 */
function redirect($url){
    echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
}

?>