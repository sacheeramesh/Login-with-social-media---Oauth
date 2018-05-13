<!--all php functions are decleraed in here-->
<?php

    require 'config.php';

    session_start();

    echo "Please wait! Connecting to Facebook Server.. ";


  

  if(isset($_GET['code']))//get Access token and store it inside $result
  {
    
    $result = get_auth_code(251952998878485, "https://localhost/Social-Login/redirect.php", $_GET['code'], "MjUxOTUyOTk4ODc4NDg1OmU2MmFmYzI4OWU4NDE5ZjhiYTJiMTQyZDdiN2RiZmI1");
    
    
    $token_json = json_decode($result);//jason array to fetch token
    

    
    if(!isset($_COOKIE['access_token']))//set cookie to store access token to get when needed in server page
    {
     	setcookie("access_token",$token_json->access_token,time()+10,"/","localhost");
      	echo '<script> window.location.assign("https://localhost/Social-Login/server.php") </script>';
    }

    	echo '<script> window.location.assign("https://localhost/Social-Login/server.php") </script>';
 
    }



?>
