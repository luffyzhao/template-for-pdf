<?php

namespace TemplateForPDF\Foundatin\Express;

use TemplateForPDF\Foundation\Express;

class YunDa76x130
{
    /**
     * @var Express
     */
    protected $pdf;

    protected $data = [];

    /**
     * YunDa76x130 constructor.
     */
    public function __construct()
    {
        $this->pdf = new Express(76, 130, __DIR__ . "/../../../template/yunda-76x130/yunda-76x130_00.png");
        // 时间
        $this->pdf->SetFontSize(8);
        $this->pdf->Text(2, 7, date('Y-m-d H:i'));
    }


    /**
     * @param $code
     * @return YunDa76x130
     */
    public function setCode(string $code)
    {
        // 条码这里
        $this->pdf->write1DBarcode($code, 'C128B', 4, 21.5, 50, 15, '', [
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 12
        ], 'C');
        $this->pdf->StartTransform();
        $this->pdf->Rotate(-90, 35, 40);
        $this->pdf->write1DBarcode($code, 'C128B', 19, 0, 50, 15);
        $this->pdf->StopTransform();
        return $this;
    }

    /**
     * @param string $code
     * @return YunDa76x130
     */
    public function setPackageCode(string $code)
    {
        $this->pdf->SetFontSize(26);
        $this->pdf->Text(4, 11, $code);
        return $this;
    }

    /**
     * @param string $code
     * @return YunDa76x130
     */
    public function setTpStatus(string $code)
    {
        $this->pdf->SetFont('stsongstdlight', 'B', 12);
        $this->pdf->Text(4, 37.5, $code);
        return $this;
    }


    /**
     * @param string $code
     * @return $this
     */
    public function setPackageLand(string $code)
    {
        $this->pdf->SetFont('stsongstdlight', 'B', 16);
        $this->pdf->Text(1, 44, "集包地: " . $code);
        return $this;
    }

    /**
     * @param array $receiving
     * @return $this
     */
    public function setReceiving(array $receiving){
        // 收件人信息
        $this->pdf->SetFont('stsongstdlight', 'B', 8);
        $this->pdf->Text(11, 51, "{$receiving['name']}   {$receiving['mobile']}");
        $this->pdf->SetFont('stsongstdlight', '', 7);
        $this->pdf->Text(11, 54, "{$receiving['telphone']}");
        $this->pdf->writeHTMLCell(47, 7, 11, 57, "<p>{$receiving['address']}</p>", 0, 1);
        return $this;
    }

    /**
     * @param array $buyer
     * @return $this
     */
    public function setBuyer(array $buyer){
        $this->pdf->SetFont('stsongstdlight', 'B', 8);
        $this->pdf->Text(11, 67, "{$buyer['name']}   {$buyer['mobile']}");
        $this->pdf->SetFont('stsongstdlight', '', 6);
        $this->pdf->writeHTMLCell(47, 7, 11, 70, "<p>{$buyer['address']}</p>", 0, 1);
        return $this;
    }

    /**
     * @param $info
     * @return $this
     */
    public function setOtherInfo($info){
        $this->pdf->writeHTMLCell(70, 23, 1, 81, '<div>' .
            $info .
            '</div>', 0, 1);
        return $this;
    }

    /**
     * @param $text
     * @return $this
     */
    public function set2DBarcode($text){
        $style = ['border' => 2,'vpadding' => 'auto', 'hpadding' => 'auto','module_width' => 1,'module_height' => 1];
        $this->pdf->write2DBarcode("{$text}", 'QRCODE,L', 59, 108, 15, 15, $style);
        return $this;
    }

    /**
     * @param $path
     */
    public function save($path){
        $this->pdf->Output($path, 'F');
    }
}