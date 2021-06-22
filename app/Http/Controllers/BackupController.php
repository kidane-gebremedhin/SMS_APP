<?php

namespace App\Http\Controllers;

use Andegna;
use DateTime;
use Illuminate\Http\Request;
use PDO;

class BackupController extends Controller
{
    private $date;

    public function __construct()
    {
      // $this->middleware('ict');
      // parent::__construct();
      $this->date = (new Andegna\DateTime(new DateTime()))->format('Y-m-d');
    }

    // public function index()
    // {   
    //     return view('pages.Admin.reports.excel-exports.index')
    //         ->withZones(Zone::all())
    //         ->withWoredas(Woreda::all());
    // }

    public function backup()
    {   
        $connect = new PDO('mysql:host=localhost;dbname=edms','root','root');
        if ($connect == false) {
            return ['error', 'Unable to connect to database'];
        }

        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();

        /****************************/

        $output = ''; $i = 0;
        foreach ($result as $key => $table) {
            // dd($table['Tables_in_edms']);
            $show_query_table = "SHOW CREATE TABLE " . $table['Tables_in_edms'] . "";
            $statement = $connect->prepare($show_query_table);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }

            $select_query = "SELECT * FROM " . $table['Tables_in_edms'] . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count=0; $count < $total_row; $count++) { 
                $single_result = $statement->fetch(PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $tt = $table['Tables_in_edms'];
                $output .= "\nINSERT INTO $tt (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "')\n";
            }
        }

        $file_name = 'database_backup_on-' . date('Y-m-d') . '.sql';
        $file_handle = fopen($file_name,'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachement; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);

        return back();
    }


    
}
