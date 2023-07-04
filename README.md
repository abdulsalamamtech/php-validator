**PHP Validator**

PHP Validator is a PHP OOP framework 
that helps in validating users input 
and prevent sql injection

---

**How to use PHP Validator**

Directory:

>validator

>> validate.php

>yourproject.php

```php
<?php

//INCLUDE VALIDATOR TO YOUR PROJECT
include(validator/validate.php);

// YOUR VARIABLE
$var = "abdulsalam amtech";

// INITIALIZE YOUR CLASS
$validator = new Validator();

/* VALID INPUT TAKES IN TWO PERAMETERS THE VARABLE
AND THE DATATYPE YOU LOVE TO USE FOR VALIDATION 
THIS ALSO RETURN THE EXACT INPUT
*/
$var = $validator->input($var, "text");

// INPUT ERROR CHECK FOR ANY ERROR
$var_error = $validator->inputError();

// INPUT ERROR MESSAGE GET ALL THE ERROR MESSAGE
$var_error_message = $validator->inputErrorMessage();

// THIS ALSO RETURN THE EXACT INPUT
$value = $validator->output();

/* THIS RETURN VALIDATED INPUT
IS RETURN HTML ENTITIES AND CHARACTERS
*/
$encode_value = $validator->validInput($var);

/* THIS RETURN VALID OUTPUT
IS CONVERT HTML ENTITIES AND CHARACTERS
*/
$decode_value = $validator->validOutput($var);


?>
```

___

**Contribution**

You are free to use and contribute to this project.

***

 **About this project**

 This project is only for PHP validation.

You can check out my github for more intresting project.
For details [Visit My github Page](https://github.com/abdulsalamamtech) :octocat: .