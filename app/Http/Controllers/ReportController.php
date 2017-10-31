<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Alert;
use App\Article;
use DB;
use Excel;

class ReportController extends Controller
{
    // render view import
    public function importExport()
    {
        return view('importExport');
    }
    // download excel
    public function downloadExcel($type)
    {
        $data = Article::get()->toArray();
        return Excel::create('report_example', function($excel) use ($data){
            $excel->sheet('mySheet', function($sheet) use ($data)   {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    // import excel 
    public function importExcel()
    {
        if(Input::hasFile('import_file'))   {
            $path = Input::file('import_file')->getRealPath();
            // $data = Excel::load($path)->get();
            $data = Excel::load($path, function($reader)    {})->get();

            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
					$insert[] = ['title' => $value->title, 'content' => $value->content, 'writer'=>$value->writer];
				}
                if(!empty($insert)){
					DB::table('articles')->insert($insert);
                    // dd('Insert Record successfully.');
                    Alert::success('Excel Upload successfully');
				}
            }
        }
        return back();
    }
}