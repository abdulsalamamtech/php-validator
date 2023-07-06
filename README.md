**PHP Validator**

PHP Validator is a PHP OOP framework 
that helps in validating users input 
and prevent sql injection


---

**How to use PHP Validator**

Directory:

>validator

>> validator.php

>yourproject.php

```php
<?php

//INCLUDE VALIDATOR TO YOUR PROJECT
include(validator/validator.php);

// YOUR VARIABLE
$var = "Abdulsalam Amtech";

// INITIALIZE CLASS
$validator = new Validator();

/* VALID INPUT TAKES IN TWO PERAMETERS THE VARABLE
AND THE DATATYPE YOU LOVE TO USE FOR VALIDATION 
THIS ALSO RETURN THE EXACT INPUT
*/
$var = $validator->input($var, "text");

/* INPUT ERROR CHECK FOR ANY ERROR
THIS RETURN TRUE/FALSE
*/
$var_error = $validator->inputError();

// COUNT THE NUMBER OF ERROR
$var_count = $validator->inputCount();

// INPUT ERROR MESSAGE GET ALL THE ERROR MESSAGE IN STRING FORMAT
$var_error_message = $validator->inputErrorMessage();

// INPUT ERROR MESSAGE GET ALL THE ERROR MESSAGE IN ARRAY FORMAT
$var_error_message = $validator->inputErrorMessageArray();

// THIS ALSO RETURN THE EXACT INPUT
$value = $validator->output();

/* THIS RETURN VALIDATED INPUT
IT RETURN HTML ENTITIES AND CHARACTERS
THE PARAMETER IS OPTIONAL
*/
$encode_value = $validator->validInput($var);

/* THIS RETURN VALID OUTPUT
IT CONVERT HTML ENTITIES AND CHARACTERS
THE PARAMETER IS OPTIONAL
*/
$decode_value = $validator->validOutput($var);


?>
```


***

**Using it to prevent SQL injection**

```php
<?php

// YOUR VARABLE
$name = "Abdulsalam Amtech";

// INITIALIZING CLASS
$validator = new Validator();
$name = $validator->input($name, "text");

// CHECK FOR ANY ERROR
if($validator->inputError() === true){
    // GET ERROR MESSAGE
    echo $validator->inputErrorMessage();
}else{
    // YOU CAN INSERT THIS INTO YOUR SQL STATEMENT
    $sql_name = $validator->validInput($name);
}

?>
```


---

**Retreiving your data from SQL and displaying it on your page**

```php
<?php

// VARIABLE FROM database
$sql_name = "Abdulsalam Amtech";

// INITIALIZING CLASS
$validator = new Validator();

// YOU CAN DISPLAY THIS VARIABLE ON YOUR HTML PAGE
$name = $validator->validOutput($sql_name);

echo "My name is " . $name;

?>

```


***

**Types of data validation types**

*This are the types of data validation you can use*

```php

    $var = "";
    $type = "";

    $types = [
        // for text only
        [] = "text",
        // for number only
        [] = "number",
        // for email
        [] = "email",
        // for text and number only
        [] = "alphanumeric",
        // for text, numbers, and special characters
        [] = "varchar",
        // for password (+234): this must be pass into valid input and output
        [] = "password"
    ];

    // INITIALIZING CLASS
    $validator = new Validator();
    $input = $validator->input($var. $type);

```

___


**Contribution**

You are free to use and contribute to this project.


***

 **About this project**

 This project is only for PHP validation.

You can check out my github for more intresting project.
For details [Visit My github Page](https://github.com/abdulsalamamtech)  :octocat: .
