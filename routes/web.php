<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

Route::post('/calculate', function () {
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    $spreadsheet = $reader->load("boxette.xlsx");

    $spreadsheet->getActiveSheet()->setCellValue('F17',request()->get('weight'));
    $spreadsheet->getActiveSheet()->setCellValue('F18',request()->get('state'));
    $spreadsheet->getActiveSheet()->setCellValue('F19',request()->get('length'));
    $spreadsheet->getActiveSheet()->setCellValue('F20',request()->get('height'));
    $spreadsheet->getActiveSheet()->setCellValue('F21',request()->get('width'));

    return response()->json([
        'requests' => request()->all(),
        'result' => [
            'delivery_price' => $spreadsheet->getActiveSheet()->getCell('F43')->getCalculatedValue(),
            'fedex_express' => $spreadsheet->getActiveSheet()->getCell('F44')->getCalculatedValue()
        ]
    ]);
});

Route::get('/', function () {
    return view('test');
});
