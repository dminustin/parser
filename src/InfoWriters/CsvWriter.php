<?php

namespace a3f\InfoWriters;

class CsvWriter extends BaseInfoWriter
{
    public function __construct(protected string $filename)
    {
    }

    public function writeInfo(array $data): void
    {
        $fd = fopen($this->filename, 'w');
        foreach ($data as $key => $value) {
            fputcsv($fd, [$key, $value]);
        }
        fclose($fd);
    }
}
