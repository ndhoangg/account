<?php
use starter\config\Config;

$configs = Config::getConfig();
foreach (array_keys($configs) as $config) {
    define($config, $configs[$config]);
}


