<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
return [

    /*
     * The class to use to handle the export functionality
     */
    'exports' => \SIGA\Table\Exports\Export::class,

    /*
     * Which library you want to use for PDF generation
     * Supports dompdf, mpdf
     * You must install the appropriate third party package for each
     * See: https://docs.laravel-excel.com/3.1/exports/export-formats.html
     * And: https://phpspreadsheet.readthedocs.io/en/latest/topics/reading-and-writing-to-file/#pdf
     */
    'pdf_library' => 'dompdf',

    /*
     * The frontend styling framework to use
     * Options: bootstrap-4
     */
    //'theme' => 'tailwind',
    //'theme' => 'bootstrap-4',
    'theme' => 'core-ui',
     'core-ui'=>[
         'classes'=>[
             'table'=>'table table-responsive-sm table-striped'
         ]
     ],
    'status'=>[
        'draft'=>'bg-danger-100 text-danger-800',
        'revision'=>'bg-gray-100 text-gray-800',
        'published'=>'bg-green-100 text-green-800',
        'deleted'=>'bg-red-100 text-red-800',

    ]
];
