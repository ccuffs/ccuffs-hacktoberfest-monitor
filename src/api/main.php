<?php

require_once dirname(__FILE__) . '/github.php';

function config($key, $value = null) {
    $config = require_once dirname(__FILE__) . '/../../config/app.php';
    return isset($config[$key]) ? $config[$key] : $value;
}

?>