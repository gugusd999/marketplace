<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function spreadsheet()
{
	return new Spreadsheet();
}

function create_xlsx($data='')
{
	$date = date('d-m-y-'.substr((string)microtime(), 1, 8));
	$date = str_replace(".", "", $date);
	$filename = "export_".$date.".xlsx";

	try {
	    $writer = new Xlsx($data);
	    $writer->save($filename);
	    $content = file_get_contents($filename);
	} catch(Exception $e) {
	    exit($e->getMessage());
	}

	header("Content-Disposition: attachment; filename=".$filename);

	unlink($filename);
	exit($content);
	
}

// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');
