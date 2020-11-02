<?php

namespace TemplateForPDF\Foundation;

use Exception;
use TCPDF;

class Express extends TCPDF
{
    /**
     * @var float
     */
    private $width;
    /**
     * @var float
     */
    private $height;
    /**
     * @var string
     */
    private $template;

    /**
     * MyPdf constructor.
     * @param float $width
     * @param float $height
     * @param string $template
     */
    public function __construct(float $width, float $height, string $template)
    {
        $this->width = $width;
        $this->height = $height;
        $this->template = $template;

        parent::__construct('P', 'mm', [$width, $height], true, 'UTF-8', false, false);

        $this->SetMargins(0, 0, 0, true);
        $this->SetHeaderMargin(0);
        $this->SetFooterMargin(0);
        $this->setPrintFooter(false);
        $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $this->SetFont('stsongstdlight');
        $this->AddPage();
    }

    /**
     * 头部
     */
    public function Header()
    {
        if(!file_exists($this->template)){
            throw new Exception("模板文件不存在！");
        }
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $this->Image($this->template, 0, 0, $this->width, $this->height, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, 0);
        $this->setPageMark();
    }

    public function Footer()
    {

    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

}