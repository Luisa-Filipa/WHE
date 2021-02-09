<?php

function manageInfo($csvFilename) {

    $info = getInfo($csvFilename);
    //print_r($info);

    $finalInfo["generalInfo"]= helper($info, 0, 14);
    $finalInfo["features"]= helper($info,14,35);
    $auxBuildingProcess["buildingsProcess"]=helper($info,35,47);
    $auxBuildingProcess["Design Process"]=helper($info,47,50);
    $auxBuildingProcess["Construction Process"]=helper($info,50,55);
    $auxBuildingProcess["Building Codes and Standards"]=helper($info,55,58);
    $auxBuildingProcess["Building Permits and Development Control Rules"]=helper($info,58,62);
    $auxBuildingProcess["Building Maintenance and Condition"]=helper($info,62,65);
    $auxBuildingProcess["Construction Economics"]=helper($info,65,68);
    $finalInfo["BuildingsProcess"]= $auxBuildingProcess;
    $finalInfo["SocioEconomicIssues"]= helper($info,68,83);
    $finalInfo["Earthquakes"]= helper($info,83,99);

    return $finalInfo;
}

function helper($info, $min, $max) {
    $aux = array();
    while ($min < $max) {

        $key = $info[0][$min];
        $value = $info[1][$min];
        //if (strlen($value)!=0){
            $aux[$key] = $value;
            $min++;
        //}
    }
    return $aux;
}

function getInfo($csvFilename) {
    $info = array(2);
    $count = 0;
    $file = fopen($csvFilename, 'r');
    while (($line = fgetcsv($file)) !== FALSE) {
        $info[$count] = $line;
        $count++;
    }
    fclose($file);

    return $info;
}

function printInformation ($arrayInfo){
    foreach ($arrayInfo as $key => $value) {
        echo sprintf("<p><b>%s: </b>%s</p>",
            $key,
            $value);
    }
}

function html_table($data) {

    $rowsHeader= 4;
    $aux= array_chunk($data, (count($data)/$rowsHeader));

    $rows = array();
    foreach ($aux as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    return sprintf("<table>
            <tr>
            <th>Year</th>
            <th>Earthquake Epicenter</th>
            <th>Richter Magnitude</th>
            <th>Maximum Intensity</th>
            </tr>%s</table>", implode('', $rows));
}
