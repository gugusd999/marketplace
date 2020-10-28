<?php

// Load Composer's autoloader
require 'autoload.php';

function newpdf($value='')
{
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($value);
	$mpdf->Output();
}
