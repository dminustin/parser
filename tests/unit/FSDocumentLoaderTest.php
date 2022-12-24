<?php


use a3f\DocumentLoaders\FSDocumentLoader;
use a3f\Exceptions\FileNotFoundException;
use a3f\InfoWriters\StdOutWriter;
use a3f\Parsers\HTMLParser;
use PHPUnit\Framework\TestCase;

class FSDocumentLoaderTest extends TestCase
{
    public function testLoad()
    {
        $loader = new FSDocumentLoader(__DIR__ . '/../data/test.html');
        $this->assertIsString($loader->getDocument());
    }

    public function testNotExists()
    {
        $this->expectException(FileNotFoundException::class);
        $loader = new FSDocumentLoader(__DIR__ . '/../data/_not_exists.html');
    }
}
