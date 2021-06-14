<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lawyer;
use App\Exports\lawyerExport;
use Excel;
use App\Imports\lawyerImport;

class ImportController extends Controller
{
    public function addLawyer()
    {
        $lawyers =[
            ["name"=>"Abinash","bcr"=>"AS-1010-17","address"=>"Beltola"],
            ["name"=>"Bikram","bcr"=>"AS-1011-17","address"=>"Chenikuthi"],
            ["name"=>"Rathore","bcr"=>"AS-1012-17","address"=>"Sixmile"],
            ["name"=>"Jintu","bcr"=>"AS-1013-17","address"=>"Beltola"],
        ];
        lawyer::insert($lawyers);
        return "records are inserted";
    }
    public function exportIntoExcel()
    {
        return Excel::download(new lawyerExport,'lawyerlist.xlsx');
    }
    public function exportIntoCSV()
    {
        return Excel::download(new lawyerExport,'lawyerlist.csv');  
    }
    public function importForm()
    {
        return view('import-form');
    }
    public function import(Request $request)
    {
        Excel::import(new lawyerImport,$request->file);
        return "Records are imported successfully!";
    }
}

}
