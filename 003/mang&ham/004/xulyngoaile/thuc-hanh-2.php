<?php
// class Exception2 extends Exception {
//     public function errorMessage(){
//         return $this->getMessage();
//     }
// }
// $age = 18;
// try{
// if(!is_int($age)){
// throw new Exception2 ('ko phai so nguyen ');
// }

//     if($age = 18){
//         throw new Exception (' phai lon hon 18');
//     }
// }
// catch(Exception2 $e){
//  echo $e->errorMessage();
// }
// catch(Exception $e){
//     echo $e->getMessage();

// }


// class CustomException extends Exception
// {
//     public function errorMessage()
//     {
//         return 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
//             . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
//     }
// }

// $email = "someone@example.com";

// try {
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         throw new CustomException($email);
//     }
// } catch (CustomException $e) {
//     echo $e->errorMessage();
// }
