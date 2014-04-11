<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = $_GET['twitterId'];
$notweets = 1;
$consumerkey = "n1GZR7ZO2G4QmuVWiRP4w";
$consumersecret = "T4AhFAXHXuveH0KCPmjclZbKdBuagmrD8U5fkBZj0Fs";
$accesstoken = "122332370-Egol3UCiJhcmsw4s2gI1WWXC4TEA0FtKW4AcQioH";
$accesstokensecret = "OfsRieUkeLvN1FeFVrMBr42nkRyv7ayfN2jUoGGUwM";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
  
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>