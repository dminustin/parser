<?php

namespace a3f\InfoWriters;

abstract class BaseInfoWriter
{
    abstract public function writeInfo(array $data): void;
}
