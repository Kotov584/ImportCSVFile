<div>
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
           <br>
           <h1 class="text-center">Import</h1><br>  
            <form>
                @if(!$csv) 
                    <br>
                    <div class="form-group"> 
                        <label class="form-label">Length - by default null</label>
                        <input type="text" placeholder="Length" class="form-control" wire:model.delay="length">
                    </div><br>    
                    <div class="form-group"> 
                        <label class="form-label">Separator - by default ,</label>
                        <input type="text" placeholder="Separator" class="form-control" wire:model.delay="separator">
                    </div><br>    
                    <div class="form-group"> 
                        <label class="form-label">Enclosure - by default \"</label>
                        <input type="text" placeholder="Enclosure" class="form-control" wire:model.delay="enclosure">
                    </div><br>    
                    <div class="form-group"> 
                        <label class="form-label">Escape - by default \\</label>
                        <input type="text" placeholder="Escape" class="form-control" wire:model.delay="escape">
                    </div><br>    
                    <div class="form-group"> 
                        <label class="form-label">Encoding - by default UTF-8</label>
                        <input type="text" placeholder="Encoding" class="form-control" wire:model.delay="encoding">
                    </div><br>
                @endif 
                @if(!$csv)
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose your csv file</label>
                    <input class="form-control" type="file" wire:model="csv">
                </div>  
                <div wire:loading wire:target="csv">Uploading temporary file...</div>
                @endif
                @if($csv)  
                @if(!$success)
                You have selected the csv file "{{ $csv->getClientOriginalName() }}  " to load the data. Don't forget to map the columns before clicking on "Upload" button below.
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" wire:click="import()">Upload</button> 
                        <div wire:loading wire:target="import">Uploading data</div>
                    </div>
                @endif
                @endif
            @if($data)
                @if($success)
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ $success }}
                    </div>
                @endif
                <br><h1 class="text-center">List of records</h1><br> 
                <table class="table">
                    <thead>
                        <tr>  
                            @foreach($header_row as $key => $value)
                                <th>{{ $value }}</th> 
                            @endforeach 
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            @foreach($header_row as $key => $value)
                                <td>
                                    <select> 
                                        <option>Choose table field</option> 
                                        @foreach(config('app.csv_import_table_columns') as $key => $value_column) 
                                            <option wire:click="change_table_field('{{ $value_column }}', '{{ $value }}')">{{ $value_column }}</option> 
                                        @endforeach
                                    </select>
                                </td> 
                            @endforeach
                        </tr> 
                            @foreach($data as $data_key => $data_value)
                            <tr>
                                @foreach($header_row as $key => $value)
                                    <td>{{ $data_value[$value] }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                    </tbody>
                    </table>
            @endif
            </form> 
</div>
