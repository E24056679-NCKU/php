<?php
    /*
     * This php is for waiting.php to query whether user's python process has finished
     * if user's process has finished, return "true"
     * else return "false"
     */
    include 'func.php';
    if( isProcessRunning($_SESSION["pid"]) )
    {
        echo "false";
    }
    else
    {
        $_SESSION["status"] = "finish";
        $_SESSION["pid"] = "";
        echo "true";
    }
?>
