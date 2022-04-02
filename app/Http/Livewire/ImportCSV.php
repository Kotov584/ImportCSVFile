<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImportCSV extends Component
{   
    use WithFileUploads;

    public $csv;
    public $length = null;
    public $separator = ",";
    public $enclosure = "\"";
    public $escape = "\\";
    public $encoding = "UTF-8";
    public $header_row = [];
    public $data = []; 
    public $success = null;

    public function csv_to_array()
    {
        if(!file_exists(storage_path('app/public/import.csv')) || !is_readable(storage_path('app/public/import.csv')))
            return FALSE; 
        $header = NULL;
        $data = array();
        if (($handle = fopen(storage_path('app/public/import.csv'), "r")) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $this->separator)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        } 
        $this->header_row = $header; 
        $this->data = $data;
    }

    public function import () 
    { 
        $query = DB::table(config("app.csv_import_table_name_in_the_database"))->insert($this->data); 
        
        if ($query > 0) 
        {
            $this->success = "Data has been imported successfully"; 
        }
    }

    public function change_table_field($table_field, $csv_field) 
    {
        foreach ($this->data as $key => $value) {   
            if ($table_field == $csv_field) {
                break;
            }
            $this->data[$key][$table_field] = $this->data[$key][$csv_field]; 
            unset($this->data[$key][$csv_field]); 
        }   

        $validator = Validator::make($this->data, config('app.csv_import_table_level_validating_rules'));

        if ($validator->fails()) { 
            dd($validator->errors());
        }
    }

    public function updatedCsv()
    {
        $this->csv->storeAs('/', 'import.csv', $disk = 'public');  

        mb_convert_encoding(storage_path('app/public/import.csv'), $this->encoding);

        $this->csv_to_array();   

        $validator = Validator::make($this->data, config('app.csv_import_validating_rules'));

        if ($validator->fails()) { 
            dd($validator->errors());
        }
    }

    public function render()
    {
        return view('livewire.import-c-s-v');
    }
}
