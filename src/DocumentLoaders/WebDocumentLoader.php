<?php

namespace a3f\DocumentLoaders;

use a3f\Exceptions\FileNotFoundException;

class WebDocumentLoader extends BaseDocumentLoader
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
        $headers = get_headers($this->source, false);
        $exists = false;
        $validHeaders = array('200', '302', '301');
        foreach ($validHeaders as $HeaderVal) {
            if (strstr($headers[0], $HeaderVal)) {
                $exists = true;
                break;
            }
        }
        if (!$exists) {
            throw new FileNotFoundException(sprintf('The URL "%s" does not exist', $this->source));
        }
    }
}
