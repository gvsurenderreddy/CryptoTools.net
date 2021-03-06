<?php

require("vendor/autoload.php");
require("includes/cryptotools.php");

$router = new AltoRouter();
$router->setBasePath("");

$router->map('GET', '/', 'CryptoToolsRoute::page_home', 'home');
$router->map('GET', '/aes', 'CryptoToolsRoute::page_aes_string', 'aes_string');
$router->map('GET', '/rsagen', 'CryptoToolsRoute::page_rsa_gen', 'rsa_gen');
$router->map('GET', '/hash', 'CryptoToolsRoute::page_hash_string', 'hash_string');
$router->map('GET', '/otp', 'CryptoToolsRoute::page_otp', 'otp');
$router->map('GET', '/base64', 'CryptoToolsRoute::page_base64', 'base64');

$router->map('GET', '/about', 'CryptoToolsRoute::page_about', 'about');
$router->map('GET', '/attributions', 'CryptoToolsRoute::page_attributions', 'attributions');

$router->map('GET', '/api', 'CryptoToolsAPI::test', 'apitest');

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "Error 404: Not found";
}