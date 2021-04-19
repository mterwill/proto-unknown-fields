<?php

require __DIR__ . '/vendor/autoload.php';

$foo = new \Foo\Foo;
$foo->mergeFromJsonString('{"unknown":true}', true);
echo "ok\n";
