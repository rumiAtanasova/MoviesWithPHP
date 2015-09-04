<?php
function __autoload($class_name){
    require_once $class_name.'.php';
}

if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
    die('Invalid request method');
}

//$handle = fopen("php://input", "rb");
//$raw_post_data = '';
//while (!feof($handle)) {
//    $raw_post_data .= fread($handle, 8192);
//}
//fclose($handle);
//$request = json_decode($raw_post_data, true);



$dataStr = file_get_contents("php://input");
$request = json_decode($dataStr, true);



if($_POST){
    $personInstance = new User($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email']);
}
else {
    if (!is_array($request)) {
        die('Ivalid data format');
    }
    $personInstance = new User($request['username'], $request['password'], $request['name'], $request['email']);

//    $username = $request['username'];
//    $pass = $request['password'];
//    $name = $request['name'];
//    $email = $request['email'];
}



try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=movies', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$res = $pdo->prepare('INSERT INTO myUsers (id, username, password, name, email) VALUES (NULL, :username, :password, :name, :email )');
$res -> bindParam(':username', $personInstance->getUsername());
$res -> bindParam(':password', $personInstance->getPassword());
$res -> bindParam(':name', $personInstance->getName());
$res -> bindParam(':email', $personInstance->getEmail());
$isExecute = $res->execute();

var_dump($isExecute);

//if($isExecute) {
//
//}