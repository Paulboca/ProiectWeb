<?php

require_once __DIR__ . '/vendor/mpdf/mpdf';

$fields=$_POST['fields'];
$rest=$_POST['rest'];


$mpdf = new \Mpdf\Mpdf();

$data=' ';
$data='<h1>Products</h1>';

$data='<strong>Fields</strong>' . $fields . '<br />';
$data='<strong>Rest</strong>' . $rest . '<br />';

$mpdf->WriteHTML($data);
$mpdf->Output('database.pdf', 'D');

?>