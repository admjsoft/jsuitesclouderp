<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pdf
{
    public $temppath;
    public function __construct()
    {
        $this->temppath= FCPATH . 'userfiles/temp/pdf';
    }

    public function load($param = null)
    {
        require_once APPPATH . 'third_party/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf(['tempDir' => $this->temppath,'mode' => 'utf-8', 'format' => 'A4', 'margin_left' => 5, 'margin_right' => 5, 'margin_top' => 5, 'margin_bottom' => 4]);
        //$mpdf->SetDirectionality('RTL');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        return $mpdf;
    }

    public function load_en($param = null)
    {
        require_once APPPATH . 'third_party/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf(['tempDir' => $this->temppath]);

        //$mpdf->SetDirectionality('RTL');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        return $mpdf;
    }


    public function load_split($param = array('margin_top'=>40))
    {
        require_once APPPATH . 'third_party/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf(['tempDir' => $this->temppath,'default_font' => 'bangla','mode' => 'utf-8', 'format' => 'A4', 'margin_left' => 5, 'margin_right' => 5, 'margin_top' =>$param['margin_top'], 'margin_bottom' => 12]);

        //$mpdf->SetDirectionality('RTL');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->use_kwt = true;

        return $mpdf;
    }

        public function load_thermal($param = null)
        {
            require_once APPPATH . 'third_party/vendor/autoload.php';

            $mpdf = new \Mpdf\Mpdf(['tempDir' => $this->temppath,'mode' => 'utf-8',  'margin_left' => 1, 'margin_right' => 1, 'margin_top' =>1, 'margin_bottom' => 1]);


            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->use_kwt = true;


            return $mpdf;
        }
}
