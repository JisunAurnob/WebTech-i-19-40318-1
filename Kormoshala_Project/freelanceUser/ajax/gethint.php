<?php
// Array with names
$a[] = "Kormoshala";
$a[] = "A4techs";
$a[] = "Apple";
$a[] = "Samsung";
$a[] = "Neat Solution";
$a[] = "Brain station";
$a[] = "Codepie";
$a[] = "Data Xpie";
$a[] = "Clean Tech";
$a[] = "One Plus";
$a[] = "Xiaomi";
$a[] = "P Cloud";


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>