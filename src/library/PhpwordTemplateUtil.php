<?php

namespace Sxqibo\FastUtils\library;

use PhpOffice\PhpWord\TemplateProcessor;

class PhpwordTemplateUtil
{
    protected $phpword;

    public function __construct($file)
    {
        ini_set('memory_limit', -1);
        set_time_limit(0);
        $this->phpword = new TemplateProcessor($file);
    }

    public function setTextValue($name, $value)
    {
        $this->phpword->setValue($name, $value);
    }

    public function setTextValues($dataList)
    {
        $this->phpword->setValues($dataList);
    }

    public function setImages($imageList)
    {
        foreach ($imageList as $imageItem) {
            $name   = $imageItem['name'];
            $params = $imageItem['params'];
            $this->phpword->setImageValue($name, $params);
        }
    }

    /**
     * 克隆循环一组数据
     *
     * @param $blockName
     * @param $arr
     * @return void
     */
    public function cloneBlock($blockName, $arr)
    {
        $this->phpword->cloneBlock($blockName, 0, true, false, $arr);
    }

    /**
     * 克隆表格一行
     *
     * @param $blockName
     * @param $arr
     * @return void
     */
    public function cloneRow($rowName, $count)
    {
        $this->phpword->cloneRow($rowName, $count);
    }

    public function cloneRowAndSetValues($rowName, $arr)
    {
        $this->phpword->cloneRowAndSetValues($rowName, $arr);
    }

    /**
     * 保存文件
     * @return null|string  写入的文件
     */
    public function save($baseDir = null, $filename = '')
    {
        // 保存文件
        $baseDir = $baseDir ?: root_path() . 'public/storage/';
        file_exists($baseDir) || mkdir($baseDir, 0777, true);
        $filepath = $filename == '' ? $baseDir . DIRECTORY_SEPARATOR . uniqid('docx_') . '.docx'
            : $baseDir . DIRECTORY_SEPARATOR . $filename . '.docx';

        $this->phpword->saveAs($filepath);

        return is_file($filepath) ? $filepath : null;
    }

}
