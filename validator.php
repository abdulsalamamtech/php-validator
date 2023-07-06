<?php


// PHP VALIDATOR NAMESPACE
// namespace PhpValidator;


// MY COUNTRY TIME ZONE
print_r(date_default_timezone_get());
date_default_timezone_set('Africa/lagos');
echo "\n";
print_r(date_default_timezone_get());
echo "The time is " . date("D, d F Y, h:i:s a")."\n";



// PHP VALIDATOR CLASS
class Validator{
    private $input;
    private $input_type;

    private $error = "false";

    private $error_message = array();

    
    // VERIFY AND ENCODE INPUT
    private function encodeInput(){
        $data = $this->input;
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        $data = stripslashes($data);
        $data = strtolower($data);
        $data = trim($data);
        
        return $data;
    }


    // VERIFY AND DECODE OUTPUT
    private function decodeOutput(){
        $data = $this->input;
        $data = html_entity_decode($data);
        $data = htmlspecialchars_decode($data);
        
        return $data;
    }

    // GET INPUT DATA & VALIDATION TYPE
    public function input($var, $type = "text"){
        $this->input = $var;
        $this->input_type = $type;
        $this->inputType();
        return $this->input;
    }

    // RETURN THE EXACT INPUT VALUE
    public function output(){
        return $this->input;
    }

    // YOU CAN INSERT THIS INTO YOUR SQL STATEMENT
    public function validInput($var = ""){
        if($var !== ""){
            $this->input = $var;
        }
        return $this->encodeInput();
    }

    // YOU CAN DISPLAY THIS VARIABLE ON YOUR HTML PAGE
    public function validOutput($var = ""){
        if($var !== ""){
            $this->input = $var;
        }
        return $this->decodeOutput();
    }

    // CHECK FOR ERROR TRUE/FALSE
    public function error(){
        if(is_array($this->error_message) 
        AND count($this->error_message) > 0)
        {
            $this->error = "true";
        }
        return $this->error;
    }

    // COUNT THE NUMBER OF ERROR
    public function errorCount(){
        return count($this->error_message);
    }

    // RETURN THE ERROR MESSAGE IN STRING FORMART
    public function errorMessage(){
        $all_error = "";
        foreach($this->error_message as $err){
            $all_error .= $err . "<br>";
        }
        return $all_error;
    }

    // RETURN THE ERROR MESSAGE IN ARRAY FORMART
    public function errorMessageArray(){
        return $this->error_message;
    }

    // VALIDATE ACCOUNDING TO YOUR INPUT DATA TYPE
    private function inputType(){
        $data = $this->input;
        $input_type = $this->input_type;

        // THIS CAN ALSO WORK
        // $error_message = $this->error_message;
        // $error_message[] = "error message 100";
        // $error_message[] = "error message 200";
        // $this->error_message = $error_message;

        // SWITCH FOR THE INPUT DATA TYPE
        switch($input_type){

            case 'text':
                $this->inputText();
                break;
            case 'number':
                $this->inputNumber();
                break;
            case 'email':
                $this->inputEmail();
                break;
            case 'alphanumeric':
                $this->inputAlphaNumeric();
                break;
            case 'varchar':
                $this->inputVarchar();
                break;
            case 'password':
                $this->inputPassword();
                break;
            case 'tel':
                $this->inputTel();
                break;
            default:
                $this->forDefault();
                break;
        } 

    }

    // FOR DEFAULT SWITCH CASE
    private function forDefault(){
        $this->error = "true";
        $this->error_message[] = "something went wrong!";
    }


    function inputText(){
        $data = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == ""){
            $this->error = "true";
            $this->error_message[] = "this value is require";
        }
        // CHECK IF DATA IS ALPHABET
        if(!preg_match("/^[a-zA-Z ]*$/",$data)){
            $this->error = "true";
            $this->error_message[] = "value can only be letters";
        }

    }
    function inputNumber(){
        $data = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == ""){
            $this->error = "true";
            $this->error_message[] = "this value is require";
        }
        // CHECK IF DATA IS NUMBER
        if(!preg_match("/^[0-9+]*$/",$data)){
            $this->error = "true";
            $this->error_message[] = "value can only be numbers";
        }

    }
    function inputEmail(){
        $data = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == ""){
            $this->error = "true";
            $this->error_message[] = "email is require";
        }
        // CHECK IF DATA IS NUMBER
        if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
            $this->error = "true";
            $this->error_message[] = "invalid email account";
        }

    }

    function inputAlphaNumeric(){
        $data = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == ""){
            $this->error = "true";
            $this->error_message[] = "this value is require";
        }
        // CHECK IF DATA IS ALPHABET
        if(!preg_match("/^[a-zA-Z0-9+. ]*$/",$data)){
            $this->error = "true";
            $this->error_message[] = "value can only be letters and numbers";
        }

    }

    function inputVarchar(){
        $data = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == ""){
            $this->error = "true";
            $this->error_message[] = "this value is require";
        }
        // CHECK IF DATA IS ALPHABET
        if(!preg_match("/^[a-zA-Z0-9+._-]*$/",$data)){
            $this->error = "true";
            $this->error_message[] = "value can only be letters(a-z), 
                numbers(0-9), underscore(_) & dash(-)";
        }

    }
    function inputPassword(){
        $data = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == ""){
            $this->error = "true";
            $this->error_message[] = "password is require";
        }
        if(strlen($data) < 8){
            $this->error = "true";
            $this->error_message[] = "password must be at least 8 characters long.";
        }
        // CHECK IF DATA IS ALPHABET
        if(!preg_match("/^[a-zA-Z0-9_-]*$/",$data)){
            $this->error = "true";
            $this->error_message[] = "value can only be letters(a-z), 
                numbers(0-9), underscore(_) & dash(-)";
        }

    }

    function inputTel(){
        $data = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == ""){
            $this->error = "true";
            $this->error_message[] = "phone number is require";
        }

        // CHECK IF DATA IS NUMBER AND LENGTH IS BETWEEN 
        if(strlen($data) < 7 OR strlen($data) > 15){
            $this->error = "true";
            $this->error_message[] = "invalid phone number";
        }

        // CHECK IF DATA IS NUMBER AND IN THE RIGHT FORMAT
        // if(!preg_match("/^[+]{1}(?:[0-9\-\(\)\/\.]\s?){6, 15}[0-9]{1}$/", $data)){
        //     $this->error = "true";
        //     $this->error_message[] = "invalid phone number format";
        // }
        // CHECK IF DATA IS NUMBER AND IN THE RIGHT FORMAT
        if(!preg_match("/^[+]{1}[0-9+]{1,15}$/", $data)){
            $this->error = "true";
            $this->error_message[] = "invalid phone number format";
        }

    }


}


?>