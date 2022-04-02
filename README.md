1. When editing the file config/app.php specify the correct settings for the following lines: 
csv_import_validating_rules, csv_import_table_level_validating_rules, csv_import_table_name_in_the_database, csv_import_table_columns, table_name_displayed_on_the_screen (More info in config file)

2. Create a table with the following name you have written in "csv_import_table_name_in_the_database" in your database

3. Take a coffee, that's all you was needed to make it working
 
//Code logic
Main logic is located in livewire component in App/Http/Livewire/ImportCSV.php (Here we write our code to create a dynamic component in which we have written logic for importing our data from csv file)

Small controller for this code was written in App/Http/Controllers/BlackBoxController.php here we define our functions for our 2 pages Home and import which loading views of this pages

Views for this pages and dynamic components from livewire are located in resources/views/

