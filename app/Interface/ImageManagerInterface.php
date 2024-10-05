<?php
namespace App\Interface;

interface ImageManagerInterface
{
    public function upload($file);
    public function delete($filePath);
    public function getUrl($filePath);
}
