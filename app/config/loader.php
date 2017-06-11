<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
 $loader->registerNamespaces([
     'Address\Models'      => $config->application->modelsDir,
     'Address\Controllers' => $config->application->controllersDir,
     'Address\Forms'       => $config->application->formsDir,
     'Address'             => $config->application->libraryDir
 ])->register();


//Don't forget to add this code to service.php

/**
 * Dispatcher use a default namespace
 */
// $di->set('dispatcher', function () {
//     $dispatcher = new Dispatcher();
//     $dispatcher->setDefaultNamespace('Address\Controllers');
//     return $dispatcher;
// });
