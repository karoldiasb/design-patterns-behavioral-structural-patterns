<?php

namespace Src\Report;

use SimpleXMLElement;
use Src\Report\Content\FileContent;

class XmlExport implements Export
{
    public function save(FileContent $fileContent): string
    {
        $element = new SimpleXMLElement('<root/>');
        foreach($fileContent->content() as $key => $content){
            if(is_array($content)){
                foreach($content as $subKey => $subContent){
                    $element->addChild($subKey, $subContent);
                }
            }else{
                $element->addChild($key, $content);
            }
        }

        $path =  tempnam(sys_get_temp_dir(), 'zip');

        $element->asXML($path);

        return $path;
    }
}