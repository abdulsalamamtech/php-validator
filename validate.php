<?php

print_r(date_default_timezone_get());
date_default_timezone_set('Africa/lagos');
echo "<br>";
print_r(date_default_timezone_get());
echo "<br> The time is " . date("D, d F Y, h:i:s a")."<br>";


class Validator{
    private $data;
    private $data_type;
    private $input = [];
    private $output;

    // VERIFY AND ENCODE INPUT
    private function input(){
        $data = $this->data;
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        $data = stripslashes($data);
        $data = trim($data);
        
        return $data;
    }

    // VERIFY AND DECODE OUTPUT
    private function output(){
        $data = $this->output;
        $data = html_entity_decode($data);
        $data = htmlspecialchars_decode($data);
        
        return $data;
    }

    // RETURN VALID INPUT
    public function validInput($data, $data_type){
        $this->data = $data;
        $this->data_type = $data_type;

        // VALIDATE BY DATATYPE
        switch ($this->data_type) {

            // FOR TEXT
            case 'text':
                return $this->inputText();
                break;

            // FOR NUMBER
            case 'number':
                return $this->inputNumber();
                break;

            // FOR EMAIL
            case 'email':
                return $this->inputEmail();
                break;

            // FOR VARCHAR
            case 'varchar':
                return $this->inputVarchar();
                break;

            // FOR TELEPHONE NUMBER
            case 'tel':
                return $this->inputTel();
                break;
            
            default:
                $input['error'] = 'true';
                $input['message'][] = "Invalid datatype!, enter a valid datatype "
                    . " e.g (text, varchar, number, email, tel, url, password e.t.c)"
                    . " i.e \"\$str = new Validator() \n \$mystr = \$str->validInput('value', 'text') \"";
                break;
        }

        // RETURN VALIDATED INPUT
        return $input;
    }
    // END OF RETURN VALID INPUT


    // RETURN VALID OUTPUT
    public function validOutput($data){
        $this->output = $data;
        return $this->output();
    }
    // END OF RETURN VALID INPUT


    // VALIDATING TEXT
    private function inputText(){
        $data = $this->data;
        $input = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == "")
        {
            $input['error'] = 'true';
            $input['message'][] = "Invalid input field";

        }
        // CHECK IF DATA IS ALPHABET
        else if(!preg_match("/^[a-zA-Z ]*$/",$data))
        {
            $input['error'] = 'true';
            $input['message'][] = "value can only be letters";
        }
        else
        {
            $input['error'] = 'false';
            $input['value'] = $this->input();
        }
        return $input;
    }

    // VALIDATING NUMBER
    private function inputNumber(){
        $data = $this->data;
        $input = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == "")
        {
            $input['error'] = 'true';
            $input['message'][] = "value is require";
        }
        // CHECK IF DATA IS NUMBER
        else if(!preg_match("/^[0-9+]*$/",$data))
        {
            $input['error'] = 'true';
            $input['message'][] = "value can only be numbers";
        }
        else
        {
            $input['error'] = 'false';
            $input['value'] = $this->input();
        }
        return $input;
    }

    // VALIDATING EMAIL
    private function inputEmail(){
        $data = $this->data;
        $input = $this->input;

        // CHECK IF DATA IS EMPTY
        if(empty($data) OR $data == "")
        {
            $input['error'] = 'true';
            $input['message'][] = "email is require";
        }
        // CHECK IF DATA IS EMAIL
        else if(!filter_var($data, FILTER_VALIDATE_EMAIL))
        {
            $input['error'] = 'true';
            $input['message'][] = "Invalid email account";
        }
        else
        {
            $input['error'] = 'false';
            $input['value'] = $this->input();
        }
        return $input;
    }
}



$text = new Validator();
$valid_text = $text->validInput("", "email");

// CHECK FOR ERROR MESSAGE
if($valid_text['error'] === "true"){
    $var = "";
    // GET ALL VALUES FROM THE ERROR MESSAGE
    foreach ($valid_text['message'] as $key => $value){
        $var  .= $value ."<br>";
    }
    echo $var;

}
// CHECK FOR VALUE
if(isset($valid_text['value'])){
    echo $valid_text['value'];
}


$str = new Validator();
$valid_str = $str->validOutput("<BR><\script><H1>EMAILER</H1>");
echo $valid_str;


?>

<!-- <pre>
$name = new Validator();
$name = $name->input("500", "number");

if(is_array($name) AND $name['error'] == true){
    $var = "";
    foreach ($name as $key => $value){
        $var  .= $value ."<br>";
    }

}else{
    echo $name['value']
}

$name = new Validator();
$name_input = $name->validInput("amtech", "text");
$nameError = $name->inputError();
$name_error_message = $name->inputErrorMessage();
$name_output = $name->validOutput();

$num = Validator()
$num = output($var);
</pre> -->


