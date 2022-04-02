<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlackBoxController extends Controller
{
    public function index () 
    { 
        $data = DB::table(config('app.csv_import_table_name_in_the_database'))->get();

        return view('home', ['data' => $data]);
    }

    public function import () 
    {
        return view('import');
    }
}
