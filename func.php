<?php

    /*
     * This php is my custom function library
     */

    session_start();

    /*
     * This function is will redirect user to the right page
     * This is to prevent user from accessing a wrong page(they may do something bad?)
     */
    function sessionStatusRedirect()
    {
        // remove arguments in query string
        // e.g. /index.php?in=hello  ==>  /index.php
        $url = strtok($_SERVER["REQUEST_URI"], '?');

        if( !isset($_SESSION["status"]) )  // if it's a new user (i.e. first time connect to this server)
        {
            $_SESSION["status"] = "new";
        }
        
        if( $_SESSION["status"] == "new" ) // if user should go to "index.php"
        {
            if( $url != "/index.php" && $url != "/post_text.php" && $url != "/post_image.php" )
            {
                header("Location: /index.php"); // force to redirect
                exit;
            }
        }
        else if( $_SESSION["status"] == "waiting" ) // if user should go to "waiting.php"
        {
            if( $url != "/waiting.php" )
            {
                header("Location: /waiting.php"); // force to redirect
                exit;
            }
        }
        else if( $_SESSION["status"] == "finish" ) // if user should go to "finish.php"
        {
            if( $url != "/finish.php" )
            {
                header("Location: /finish.php"); // for to redirect
                exit;
            }
        }
    }

    // check whether a process is still running
    function isProcessRunning($pid)
    {
        exec("kill -0 " . $pid . " 2>&1", $ret); // check if process finished

        if( count($ret) != 0 ) // if process finished
        {
            return 0;
        }
        else
        {
            return 1;
        }
        
    }
?>
