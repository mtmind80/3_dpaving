<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $stream=TRUE)
{
    ini_set("display_errors",1);
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    //$dompdf->set_base_path($basepath);
   // $dompdf->set_paper("A4");
    $dompdf->load_html($html);
    $dompdf->render();


    /*$canvas = $dompdf->get_canvas();
    $font = Font_Metrics::get_font("helvetica", "bold");
    $date = date("Y-m-d");
    $canvas->page_text(480, 813, "Page: {PAGE_NUM} of {PAGE_COUNT}   Printed on:$date", $font, 6, array(0,0,0));
    $image = "./assets/images/foot6.jpg";
    $canvas->image($image, 10, 770, 580, 60);
*/

    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }

}


    function pdf_createWFooter($html, $filename='', $stream=TRUE)
    {
        require_once("dompdf/dompdf_config.inc.php");

        $dompdf = new DOMPDF();
        //$dompdf->set_base_path($basepath);
        $dompdf->set_paper("A4");
        $dompdf->load_html($html);




        $dompdf->render();

        //add new footer

        $canvas = $dompdf->get_canvas();
        $font = Font_Metrics::get_font("helvetica", "bold");


         $date = date("Y-m-d");

         $canvas->page_text(72, 800, "Page: {PAGE_NUM} of {PAGE_COUNT} $date", $font, 6, array(0,0,0));

        // $image = "./assets/images/foot6.jpg";
        // $canvas->image($image, 10, 800, 700, 100);

        if ($stream) {
            $dompdf->stream($filename.".pdf");
        } else {
            return $dompdf->output();
        }


}
?>