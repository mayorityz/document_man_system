<?php
require "app/config/config.php";
function __autoload($class)
{
    require "app/libs/$class.php";
}
$app = new Bootstrap;