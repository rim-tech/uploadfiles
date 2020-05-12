<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head></head>
<body>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
FB.init({appId: '<? echo $FACEBOOK_APP_ID ?>', status: true, cookie: true, xfbml: true});
FB.Event.subscribe('auth.login', function(response) { window.location.reload(); });
</script>
<?php
function get_facebook_cookie($app_id, $app_secret) 
{
    $args = array();
    parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);

    ksort($args);
    $payload = '';
    foreach ($args as $key => $value) {
    if ($key != 'sig') {
    $payload .= $key . '=' . $value;
    }
    }
    if (md5($payload . $app_secret) != $args['sig']) {
    return null;
    }
    return $args;
}

$cookie = get_facebook_cookie($FACEBOOK_APP_ID, $FACEBOOK_SECRET);
if($cookie)
{ 
    $access_token = $cookie['access_token'];

}
$url = 'https://graph.facebook.com/me?access_token='.$access_token;
$graph = file_get_contents($url);
if($graph) 
{

    $fbuser = json_decode($graph);
    $userid = $fbuser->id;
    $email = mysql_real_escape_string($fbuser->email);

    /********************** 
    I placed code here to check if the  email already exists in my database, which means they are already a member. 
    In that case, I retrieve their username and password from the database and automatically log them 
    in by rerouting them to my login script with their crenditials sent as well.
    ***********************/

    /********************** 
    If the email is not already in my database, then I know it's a new user and so I prompt them to make a username here. 
    ***********************/
}
//The user either opted to log in using my traditional non-Facebook method, or something went wrong with the FB authentication
else 
{

    /********************** 
    Show my normal registration form that prompts for username, email, etc 
    ***********************/
}
?>