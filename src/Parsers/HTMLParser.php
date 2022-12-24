<?php

namespace a3f\Parsers;

use a3f\Exceptions\ParseDocumentException;

class HTMLParser extends BaseParser
{
    public function displayInfo(): void
    {
        $this->writer->writeInfo($this->getParsedData());
    }

    protected function parseToAssociativeArray(): array
    {
        $this->parsedData = [];
        $document = $this->getBody($this->document);
        $document = $this->removeNoTags($document);
        return $this->getAllTags($document);
    }

    protected function getBody(string $document): string
    {
        preg_match_all('#<body[^>]*>(.*?)</body>#is', $document, $matches);
        return $matches[1][0] ?? '';
    }

    protected function removeNoTags(string $document): string
    {
        $document = preg_replace('#<script.*?</scrip.*?>#is', '', $document);
        $document = preg_replace('#<style.*?</style.*?>#is', '', $document);
        return strtolower(preg_replace('#<[^a-z/].*?>#is', '', $document));
    }

    /**
     * @throws ParseDocumentException
     */
    protected function getAllTags(string $document): array
    {
        $result = [];
        preg_match_all('#<([\w]+)[ |>]#is', $document, $preg);
        if (empty($preg[1])) {
            throw new ParseDocumentException();
        }
        foreach ($preg[1] as $tag) {
            $result[$tag] = (empty($result[$tag])) ? 1 : $result[$tag] + 1;
        }
        return $result;
    }
}
