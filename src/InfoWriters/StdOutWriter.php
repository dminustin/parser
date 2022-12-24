<?php

namespace a3f\InfoWriters;

class StdOutWriter extends BaseInfoWriter
{
    public function writeInfo(array $data): void
    {
        print_r($data);
    }
}
