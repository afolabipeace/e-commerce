<?php
// Variable Declaration
$name = "Peace";
$number = 11;
//  Output Command
// echo $name;
// print($number);
// print_r($number);

// Concatination
echo "<b> $name </b>" . " is " . $number . " years old. ";

//  Using Html
echo "<br/><i> $name </i>" . " is " . " <b> $number </b> " . " years old. ";

// Datatype
$myArray = array(1, 2, 3, 4, 5);
// print_r($myArray);

// $anotherArray = [1, 2, 3, 4, 5];
// echo "<br/>";
// print_r($anotherArray);

// Object creation 

$myObj = new stdClass;
$myObj->firstname = "Peace";
$myObj->lastname = "Afolabi";
$myObj->Dept = "SE";
echo "<br/>";
echo "<br/>";
print_r($myObj);
echo "<br/>";
echo "<br/>";
$anotherArray = [];
array_push($anotherArray, $myObj);
print_r($anotherArray);

echo "<br/>";
echo "<br/>";
$assoArray = ["first_name" => "Peace", "last_name" => "Afolabi", "department" => "SE"];
print_r($assoArray);
echo "<br/>";
foreach ($assoArray as $key => $value) {
    echo "My $key is $value <br/>";
}
echo "<br/>";
for ($i=0; $i < count($myArray) ; $i++) { 
    echo "$myArray[$i] <br/>" ;
}
echo"<br/>";
$allArray = [];
array_push($allArray, $myArray, $anotherArray, $assoArray);
print_r($allArray);

echo "<br/>";
for ($i=0; $i < count($allArray); $i++) { 
    foreach ($allArray[$i] as $value) {
        echo "<br/>";
        print_r($value);
        echo "<br/>";
    }
}

function test () {
    echo "function";
}
test();

if($name == "Peace"){
    echo "correct";
}

?>