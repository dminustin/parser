<?php

namespace a3f\DocumentLoaders;

use a3f\Exceptions\FileNotFoundException;

class FSDocumentLoader extends BaseDocumentLoader
{
    public function getDocument(): string
    {
        return file_get_contents($this->source);
    }

    /**
     * @throws FileNotFoundException
     */
    protected function checkIfAccessible()
    {
        if (!file_exists($this->source)) {
            throw new FileNotFoundException(sprintf('File "%s" does not exist.', $this->source));
        }
    }
}
