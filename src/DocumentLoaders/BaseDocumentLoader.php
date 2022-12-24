<?php

namespace a3f\DocumentLoaders;

abstract class BaseDocumentLoader
{
    public function __construct(protected string $source)
    {
        $this->checkIfAccessible();
    }

    abstract protected function checkIfAccessible();

    abstract public function getDocument(): string;
}
