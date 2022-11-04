<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function csv(Request $request)
    {
        $request->validate([
            'data' => ['required'],
        ]);

        $uploadedcsv = [$request->data];

        foreach ($uploadedcsv as $file) {
            $files = json_encode($file);
            $data =count($files);
            $hashString = "sha".rand(2,3);
            $sha256 = md5($hashString);
            dd($sha256);
            // $data = append($files, $sha256);

            
        }

        return "success";

        // dd($uploadedcsv);
    }

    private $rows = [];
    
    public function csvfile(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        // dd($request->file('file'));
        $records = array_map('str_getcsv', file($path));

        if (! count($records) > 0) {
           return 'Error...';
        }

        // Get field names from header column
        $fields = array_map('strtolower', $records[0]);

        // Remove the header column
        array_shift($records);

        foreach ($records as $record) {
            if (count($fields) != count($record)) {
                return 'csv_upload_invalid_data';
            }

            // Decode unwanted html entities
            $record =  array_map("html_entity_decode", $record);

            // Set the field name as key
            $record = array_combine($fields, $record);

            // Get the clean data
            $this->rows[] = $this->clear_encoding_str($record);
        }

        $sha256 = md5(rand(3,5));
        // dd($sha256);

        foreach ($this->rows as $data) {
            $sha256 = md5(rand(3,5));
             return response()->json([
            'format' => 'CHIP-0007',
            'id' =>  "uuid",
            'name' => "file_name",
            'filename'=> "file_name",
            'description' => '',
            'minting_tool' => '',
            'sensitive_content' => False,
            'series_number' => "sn",
            'series_total' => "data"[-1][0],
            'collection'=> [
                'name'=> '',
                'id' => '',
            ],
            'filename.output.csv' => $sha256,
             ]);
              
             
        }
         return redirect()->back()->with($data);
        // return to_route('/');
    }
    
    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }

}
