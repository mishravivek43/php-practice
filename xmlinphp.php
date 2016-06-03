<?php
$std=simplexml_load_file('persons.xml');
echo '<pre>';
print_r($std);
echo $std->persons[0]->age;
//echo $std->persons[0];
//echo $std->asXML();
$std->persons[0]->addChild('color','brown');
$std->persons[1]->addChild('color','white');
$std->persons[2]->addChild('color','fair');
print_r($std);
?>
