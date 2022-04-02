@extends("layouts.app")

@section("content")

<div class="container-fluid p-2 ml-4 w-75">
    <br><br><br><br>
            <a type="button" href="/import" class="btn btn-primary">Import</a> 
          <div class="row text-center">
            <div class="col align-self-start">
                <hr />
            </div>
            <div class="col align-self-center"> 
            </div>
            <div class="col align-self-end">
                <hr />
            </div>
          </div> 
          <br><h1 class="text-center">List of records from {{ config("app.table_name_displayed_on_the_screen") }}</h1><br>  
          <table class="table">
            <thead>
                <tr>
                    @foreach(config('app.csv_import_table_columns') as $value)
                            <th scope="col">{{ $value }}</th> 
                    @endforeach 
                </tr> 
            </thead>
            <tbody> 
            @foreach($data as $data_key => $data_value)
                            <tr>
                                @foreach(config('app.csv_import_table_columns') as $key => $value)
                                    <td>{{ $data_value->$value }}</td>
                                @endforeach
                            </tr>
                            @endforeach 
                </tr> 
            </tbody>
            </table>
</div> 
@endsection