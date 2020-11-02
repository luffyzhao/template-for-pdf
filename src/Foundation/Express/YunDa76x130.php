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

}