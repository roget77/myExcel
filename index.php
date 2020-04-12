<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
$filePath = 'data.xlsx';
$spreadsheet = IOFactory::load($filePath);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
// var_dump($sheetData);
$dealData = [];
$keyData = [];
foreach ($sheetData as $key => $item) {
    if ($key == 1) {
        $keyData = $item;
        continue;
    }
    $tmpData = [];
    foreach ($item as $row => $value) {
        $tmpData[$keyData[$row]] = $value;
    }
    $dealData[] = $tmpData;
}
ob_start();
var_export($dealData);
$content = ob_get_contents();
ob_end_clean();
file_put_contents('deal.log', $content);




