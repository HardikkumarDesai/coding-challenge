<?php
namespace App;

/*
 * This class handles opration ralted to file like, validating the file or reading the file.
 * */
class FileHandler {
    public $file;

    // file content stored as array in this variable
    public array $matrix = [];

    // Default validation response
    protected $validation = [
        'status' => 'success',
        'message' => ''
    ];

    /**
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    public function readCsvFile() {
        try {
            $file = fopen($this->file['tmp_name'],"r");
            while(! feof($file)) {
                $column = fgetcsv($file);
                $this->matrix[] = $column;
            }
            fclose($file);
        }catch (\App\Exception $e){
            throw new \App\Exception("Error while reading the file. Error : ". $e->getMessage());
        }
    }

    public function validateCsvFile() {
        try {
            /*
             * Validation file is not empty
             * */
            if($this->file['size'] === 0){
                return $this->validation = [
                    'status' => 'error',
                    'message' => 'File is empty.'
                ];
            }

            /*
             * Validation file has square matrix and all elements are of type integer
             * */
            $this->readCsvFile();
            $rows = count( $this->matrix );
            $square_matrix_flag = true;
            $integer_flag = true;
            foreach ($this->matrix as $column){
                if(count($column) != $rows){
                    $square_matrix_flag = false;
                    break;
                }
                foreach ($column as $element){
                    if(!is_numeric($element)){
                        $integer_flag = false;
                        break;
                    }
                }
                if($integer_flag === false){
                    break;
                }
            }

            if($square_matrix_flag === false){
                return $this->validation = [
                    'status' => 'error',
                    'message' => 'Provided file has not square matrix.'
                ];
            }
            if($integer_flag === false){
                return $this->validation = [
                    'status' => 'error',
                    'message' => 'Provided file has none integer element(s).'
                ];
            }

            return $this->validation;
        }catch (\App\Exception $e){
            throw new \App\Exception("Error while validating the file. Error : ". $e->getMessage());
        }
    }
}
?>