<?php

use a3f\DocumentLoaders\FSDocumentLoader;
use a3f\InfoWriters\CsvWriter;
use a3f\InfoWriters\StdOutWriter;
use a3f\Parsers\HTMLParser;

require_once('./vendor/autoload.php');

$filename = './tests/data/test.html';
$filename2 = './tests/data/test2.html';

$loader = new FSDocumentLoader($filename);
$writer = new StdOutWriter();
$parser = new HTMLParser($loader, $writer);
$parser->displayInfo();

$newLoader = new FSDocumentLoader($filename2);
$parser->setLoader($newLoader)->displayInfo();

$csvWriter = new CsvWriter('./test.csv');
$parser->setWriter($csvWriter);
$parser->displayInfo();
