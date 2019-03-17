<!DOCTYPE HTML>

<html>
<head>
    <script>
        // send a request to check whether the process has finished every 3sec
        setInterval( function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/checkProcess.php", true);
            xhr.onload = function (e) {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        if( xhr.responseText == "true" ) {
                            window.location.href = '/finish.php';
                        }
                    } else {
                        console.error(xhr.statusText);
                    }
                }
            };
            xhr.onerror = function (e) {
                console.error(xhr.statusText);
            };
            xhr.send(null);
        }, 3000);
   </script>
</head>
<?php
    include 'func.php';
    sessionStatusRedirect();
?>

<!-- a button for user to cancel their requested task -->
<form action="/cancel.php" method="get">
    <input type="submit" value="cancel"/>
</form>

</html>
