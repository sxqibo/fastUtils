<?php


use Sxqibo\FastUtils\library\SpreadsheetUtil;
use PHPUnit\Framework\TestCase;

class phpExcelTest extends TestCase
{
    public function testExport()
    {
        $spreadsheetUtil = new SpreadsheetUtil();
        // 表头
        $headers = [
            'id', 'card_number', 'nickname',
        ];

        $items = [
            ['id' => 1, 'card_number' => '12321231231', 'nickname' => 'jack'],
            ['id' => 2, 'card_number' => '66666', 'nickname' => 'linda'],
            ['id' => 3, 'card_number' => '8888', 'nickname' => 'mary'],
        ];

        $title = 'test';
        $spreadsheetUtil->setTitle($title);
        $spreadsheetUtil->setRowValue(['A1:C1' => $title], 1);
        $spreadsheetUtil->setRowValue($headers, 2);

        $spreadsheetUtil->setRowValues($items);

        $fileName = 'filename-' . time();
        $filePath = $spreadsheetUtil->save('', $fileName);
        var_dump($filePath);

        $this->assertTrue(true);
    }
}
