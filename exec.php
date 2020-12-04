<?php
define('ROOT_PATH', dirname(__FILE__));
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

array_shift($argv);
if (empty($argv)) {
    exit('Parameters cannot be empty');
}

$commandName = '\Command\\' . ucfirst(array_shift($argv)) . 'Command';
$params = [];
foreach ($argv as $v) {
    $arr = explode("=", $v);
    $key = array_shift($arr);
    $value = implode("=", $arr);
    $params[$key] = $value;
}

include_once ROOT_PATH . '/vendor/autoload.php';
include_once 'AutoLoader.php';

try {
    /** @var Command\BaseCommand $instance */
    $instance = new $commandName();
    $instance->run($params);

} catch (Exception $exception) {
    /** @var Monolog\Logger $logger */
    $logger = Library\LoggerService::getLogger('pull', 'command');
    $message = $exception->getFile().':'.$exception->getLine().';'.$exception->getMessage();
    $logger->info($message);
    exit($exception->getMessage() . PHP_EOL);
}
