<?php

declare(strict_types=1);

namespace App\Config;

require '/application/vendor/autoload.php';


$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([

]);

return $containerBuilder->build();