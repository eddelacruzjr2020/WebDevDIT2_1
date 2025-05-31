<?php
setcookie("user", "Ed", expires_or_options: time() + (86400 * 30), "/" );

//Accessing cookies
if(isset($_COOKIE["user"])){
    echo "Welcome back". $_COOKIE["user"];
}else{
    echo "User cookie is not set";
}

?>