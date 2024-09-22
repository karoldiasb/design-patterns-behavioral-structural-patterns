<?php

namespace Src\Report;

use Src\Report\Content\FileContent;
use ZipArchive;

class ZipExport implements Export
{
    public function save(FileContent $fileContent): string
    {
        $path =  tempnam(sys_get_temp_dir(), 'zip');
        $zip = new ZipArchive();
        $zip->open($path, ZipArchive::CREATE);
        $zip->addFromString('budget.serial', serialize($fileContent->content()));
        $zip->close();

        return $path;
    }
}