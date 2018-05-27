<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDFF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfsController extends Controller
{

    public function repartition(Request $request)
    {

    $data=$_GET['datapdf'];



        $pdf= PDFF::loadHTML('
<link rel="stylesheet" href="css/material-dashboard.min790f.css">
<style>table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: none;
            text-align: left;
            padding: 8px;
        }</style>'.$data)->setPaper('a4', 'portrait');
        return $pdf->download('Search&Go.pdf');



    }

}
