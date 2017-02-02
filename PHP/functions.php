<?php

########################
###  EDIT THIS FILE  ###
########################

// read from "input.json" and return as an array
function load_input_file_into_php_array() {

    print "Loading...\n";
    $jsonInputFile = file_get_contents("./data/input.json");
    $jsonArray = json_decode($jsonInputFile, true);
    return $jsonArray;

}

// convert array to match structure in "correct-output.json"
function convert_array_to_output_format($input_array) {

    print "Converting...\n";
    $i = 0;
    foreach ($input_array as $key1 => $subArray1 ){
        foreach ($subArray1 as $key2 => $subArray2 ) {
            foreach ($subArray2 as $key3 => $subArray3 ) {
                foreach ($subArray3 as $key4 => $value ) {
                    if($key4 == "EnglishName"){$output_array[$i]["name"] = $value;}
                    if($key4 == "Species"){$output_array[$i]["latin"] = $value;}
                    if($key4 == "Lifespan"){$output_array[$i]["lifespan"] = $value;}
                }
            }
            $i++;
        }
    }
    return $output_array;
}

// save the array to file named "my-output.json" 
function save_php_array_to_output_file($output_array) {

    print "Saving...\n";
    $currentJsonOutput = json_encode($output_array,JSON_PRETTY_PRINT);
    $file = './data/my-output.json';
    file_put_contents($file, $currentJsonOutput);

}

########################################################################
###  Note: Final "my-output.json" file should match structure of     ###
###  "correct-output.json" - but, whitespace does NOT have to match. ###
########################################################################

########################################################################
###  Tip - Look at these built-in PHP functions:                     ###
###  json_encode, json_decode, file_put_contents, file_get_contents  ###
########################################################################

