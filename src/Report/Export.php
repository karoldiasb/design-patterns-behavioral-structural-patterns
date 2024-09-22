<?php

namespace Src\Report;

use Src\Report\Content\FileContent;

interface Export
{
    public function save(FileContent $fileContent): string;
}