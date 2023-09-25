<?php


use PHPUnit\Framework\TestCase;

class phpwordTest extends TestCase
{
    // word template write data
    public function testTemplateWrite()
    {
        $file     = __DIR__ . '/test.docx';
        $document = new \Sxqibo\FastUtils\library\PhpwordTemplateUtil($file);

        $valueList = [
            'name'    => 'test',
            'address' => 'beijing',
        ];

        $document->setTextValues($valueList);
        $fileName = 'word-template' . time();
        $filePath = $document->save('', $fileName);
        var_dump($filePath);
        $this->assertTrue(true);
    }
}
