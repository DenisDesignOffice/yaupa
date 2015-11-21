<?php




function random_number($value)
{
$length=strlen($value);
$position=mt_rand(0, $length - 1);
return($value[$position]);
}


function random_generate($value, $length)
{

$return_value="";
for($x=0; $x < $length; $x++)
{
$return_value.=random_number($value);
}
return $return_value;
}


?>