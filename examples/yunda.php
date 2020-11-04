<?php
include_once __DIR__ . "/../vendor/autoload.php";

$yunDa = new \TemplateForPDF\Foundatin\Express\YunDa76x130();
$yunDa->setCode("7700184651251")
    ->setPackageCode("300 G220-09 000")
    ->setPackageLand("上海分波包")
    ->setTpStatus("西溪首席")
    ->set2DBarcode("西溪首席西溪首席西溪首席西溪首席西溪首席")
    ->save(__DIR__ . '/example_yunda.pdf');

/*

$pdf = new \TemplateForPDF\Foundation\Express(76, 130, __DIR__ . "/../template/yunda-76x130/yunda-76x130_00.png");
// time
// 时间
$pdf->SetFontSize(8);
$pdf->Text(2, 7, date('Y-m-d H:i:s'));

// 集包代码
$pdf->SetFontSize(26);
$pdf->Text(4, 11, "300 G220-09 000");

// 条码这里
$pdf->write1DBarcode("7700184651251", 'C128B', 4, 21.5, 50, 15, '', [
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 12
], 'C');
$pdf->StartTransform();
$pdf->Rotate(-90, 35, 40);
$pdf->write1DBarcode("7700184651251", 'C128B', 19, 0, 50, 15);
$pdf->StopTransform();

// tp_status
$pdf->SetFont('stsongstdlight', 'B', 12);
$pdf->Text(4, 37.5, "西溪首席");

// 集包地
$pdf->SetFont('stsongstdlight', 'B', 16);
$pdf->Text(1, 44, "集包地: 上海分波包");

// 收件人信息
$pdf->SetFont('stsongstdlight', 'B', 8);
$pdf->Text(11, 51, '虚空小小    18620313552');
$pdf->SetFont('stsongstdlight', '', 7);
$pdf->Text(11, 54, '18620313552');
$pdf->writeHTMLCell(47, 7, 11, 57, '<p>湖南省长沙市长沙县湖南省长沙市长沙县黄花镇黄花综合保税区通关大楼4楼4001室</p>', 0, 1);


// 发件人
$pdf->SetFont('stsongstdlight', 'B', 8);
$pdf->Text(11, 67, '虚空小小    18620313552');
$pdf->SetFont('stsongstdlight', '', 6);
$pdf->writeHTMLCell(47, 7, 11, 70, '<p>湖南省长沙市长沙县湖南省长沙市长沙县黄花镇黄花综合保税区通关大楼4楼4001室</p>', 0, 1);

$pdf->writeHTMLCell(70, 23, 1, 81, '<div>' .
    '订单号:000291218912185486515156<br />' .
    '仓库单号:SOC0382512541225  <br />' .
    '</div>', 0, 1);

$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'module_width' => 1,
    'module_height' => 1
);
$pdf->write2DBarcode("湖南省长沙市长沙县湖南省长沙市长沙县黄花镇黄花综合保税区通关大楼4楼4001室", 'QRCODE,L', 59, 108, 15, 15, $style);

$pdf->Output(__DIR__ . '/example_yunda.pdf', 'F');
*/