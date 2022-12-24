<?php


use a3f\DocumentLoaders\FSDocumentLoader;
use a3f\InfoWriters\StdOutWriter;
use a3f\Parsers\HTMLParser;
use PHPUnit\Framework\TestCase;

class HTMLParserTest extends TestCase
{
    public function testParser()
    {
        $loader = new FSDocumentLoader(__DIR__ . '/../data/test.html');
        $writer = new StdOutWriter();
        $parser = new HTMLParser($loader, $writer);
        $this->assertIsArray($parser->getParsedData());
    }
}
