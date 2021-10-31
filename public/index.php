<?php

use Siwebapp\Application as SiwebappApplication;

            
$rootPath = dirname(__DIR__);

try {
    require_once $rootPath . '/vendor/autoload.php';

    /**
     * Load .env configurations
     */
    Dotenv\Dotenv::create($rootPath)->load();

    /**
     * Run Siwebapp!
     */
    echo (new SiwebappApplication($rootPath))->run();
} catch (Exception $e) {
    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
}
