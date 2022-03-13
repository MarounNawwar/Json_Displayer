<?php

// $files = file_get_contents("http://smextractor.com/clients/aspire/apitop.php?cat=ROTATION_1_LEVEL_1");
$rslt_arr = array();
$properties_names = array();
$files = file_get_contents("sample.json");
$json = json_decode($files,true);

foreach($json as $key => $propName){
    if($key == 'data' && (is_array($propName) || is_object($propName))){
        foreach($propName as $handler => $handlerVal){
            array_push($properties_names,$handler);
            array_push($rslt_arr,$handlerVal);
        }
    }
    else{
        array_push($properties_names,$key);
        array_push($rslt_arr,$propName);
    }
}

//Retrieving the Keys available in the object
$properties_names = array_keys($rslt_arr[0]);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Json Content</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
<?php               foreach($properties_names as $property_name){ ?>
                        <th>
                            <?php echo $property_name ?>
                        </th>
<?php               }                                             ?>
                </tr>
            </thead>
            <tbody>
<?php               foreach($rslt_arr as $element){                     ?>
                    <tr>
<?php                   foreach($element as $property_content){                    
                            echo "<td>".$property_content."</td>";
                        }                                               ?>
                    </tr>
<?php               }                                                   ?>
            </tbody>
        </table>
    </body>
</html>