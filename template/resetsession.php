<?php

    session_start();
    //remove PHPSESSID from browser
    if ( isset( $_COOKIE[session_name()] ) )
    setcookie( session_name(), "", time()-3600, "/" );
    //clear session from globals
    $_SESSION = array();
    //clear session from disk
    echo session_destroy() ? "Your session has been destroyed" :  "An error Occurred";
    exit;

?>