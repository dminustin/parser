<?php

namespace a3f\Parsers;

use a3f\DocumentLoaders\BaseDocumentLoader;
use a3f\Enums\SortEnum;
use a3f\InfoWriters\BaseInfoWriter;

abstract class BaseParser
{
    protected string $document;

    public function __construct(
        protected BaseDocumentLoader $loader,
        protected BaseInfoWriter     $writer
    ) {
        $this->setWriter($this->writer);
        $this->setLoader($loader);
    }

    /**
     * @param BaseDocumentLoader $loader
     * @return static
     */
    public function setLoader(BaseDocumentLoader $loader): static
    {
        $this->loader = $loader;
        return $this;
    }

    /**
     * @param BaseInfoWriter $writer
     * @return static
     */
    public function setWriter(BaseInfoWriter $writer): static
    {
        $this->writer = $writer;
        return $this;
    }


    public function getParsedData(): array
    {
        $this->document = $this->loader->getDocument();
        return $this->parseToAssociativeArray();
    }

    abstract protected function parseToAssociativeArray(): array;

    abstract public function displayInfo(): void;
}
