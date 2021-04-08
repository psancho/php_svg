#!/usr/bin/env php
<?php declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use Psancho\SvgTools\Shape;

try {
    echo "\n";
    $go = microtime(true);
    echo "manipulation SVG\n";

    $filepath = __DIR__ . "/_mysvg.svg";

    $doc = new DOMDocument();
    $doc->load($filepath);

    $elPathList = $doc->getElementsByTagName('path');

    echo "trouvé $elPathList->length eléments path\n";

    /** @var DOMElement $elPath */
    foreach ($elPathList as $i => $elPath) {
        $pattern = $elPath->getAttribute('d');
        $shape = new Shape($pattern);
        printf("path #%d: %d steps\n", $i + 1, count($shape));
    }

} catch (\Throwable $e) {
    echo $e;
}

$duration = microtime(true) - $go;

printf("%.2F ms\n", $duration * 1000);


/*
Design
une classe Shape contenant la liste des directives
une classe pour chaque directive:
* pointage vers la directive précédente ou suivante
* stockage en relatif
* méthodes flipX, flipY, translate, transform(matrix), etc.,
 */
