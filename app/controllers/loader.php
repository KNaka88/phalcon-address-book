<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs()->register(
    [
          $config->application->controllersDir,
          $config->application->modelsDir
    ]
)->register();



// This option (using registerDirs) is not recommended in terms of performance, since Phalcon will need to perform a significant number of file stats on each folder, looking for the file with the same name as the class. It’s important to register the directories in relevance order. Remember always add a trailing slash at the end of the paths.

//https://docs.phalconphp.com/en/3.0.2/reference/loader.html
