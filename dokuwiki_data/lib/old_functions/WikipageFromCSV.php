<?php
include '/GetInfoFromCSV.php';

$info = manageInfo("Report_206.csv");
$generalInfo= $info["generalInfo"];
$features = $info["features"];
$BuildingProcess = $info["BuildingsProcess"];
$socioEconomicIssues = $info["SocioEconomicIssues"];
$earthquakes = $info["Earthquakes"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $generalInfo["Building Type"].", ".$generalInfo["Country"] ; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<div>
    <h1><?php echo $generalInfo["Building Type"].", ".$generalInfo["Country"] ; ?></h1>
    <h5>From World Housing Encyclopedia</h5>
</div>

<div class="index">
    <p>Context</p>

    <ol class="context">
        <li class="context"><a href="#General_Information">General Information</a></li>
        <li class="context"><a href="#Features">Features</a></li>
        <li class="context"><a href="#Buildings_Process">Buildings Process</a>
            <ol class="context">
                <li class="context"><a href="#Design_Process">Design Process</a></li>
                <li class="context"><a href="#Construction_Process">Construction Process</a></li>
                <li class="context"><a href="#BuildingCodesStandards">Building Codes and Standards</a></li>
                <li class="context"><a href="#BuildingPermitsDevelopmentControlRules">Building Permits and Development Control Rules</a></li>
                <li class="context"><a href="#BuildingMaintenanceCondition">Building Maintenance and Condition</a></li>
                <li class="context"><a href="#BuildingMaintenanceCondition">Construction Economics</a></li>
            </ol>
        </li>
        <li class="context"><a href="#Socio-Economic Issues">Socio-Economic Issues</a></li>
        <li class="context"><a href="#Earthquakes">Earthquakes</a></li>
    </ol>
</div>

<div class="Container">

    <div class="GeneralInformation">
        <h4 style="text-align: right;"><?php echo "Report nº: " . $generalInfo["ID"] ?></h4>
        <h3 id="General_Information">1. General Information</h3>

        <?php
        //Eliminar a variável do nome do PDF antes de imprimir
        unset($generalInfo[""]);
        printInformation($generalInfo);
        ?>
    </div>

    <div class="Features">
        <h3 id="Features">2. Features</h3>
        <?php
        printInformation($features);
        ?>
    </div>

    <div class="BuildingsProcess">

        <h3 id="Buildings_Process"> 3. Buildings Process</h3>
        <?php
        $aux=$BuildingProcess["buildingsProcess"];
        printInformation($aux);
        ?>

        <div style="margin-left: 50px">
            <div class="DesignProcess">
                <h3 id="Design_Process">3.1 Design Process</h3>
                <?php
                $aux=$BuildingProcess["Design Process"];
                printInformation($aux);
                ?>
            </div>

            <div class="ConstructionProcess">
                <h3 id="Construction_Process">3.2 Construction Process</h3>
                <?php
                $aux=$BuildingProcess["Construction Process"];
                printInformation($aux);
                ?>
            </div>

            <div class="BuildingCodesStandards">
                <h3 id="BuildingCodesStandards">3.3 Building Codes and Standards</h3>
                <?php
                $aux=$BuildingProcess["Building Codes and Standards"];
                printInformation($aux);
                ?>
            </div>

            <div class="BuildingPermitsDevelopmentControlRules">
                <h3 id="BuildingPermitsDevelopmentControlRules">3.4 Building Permits and Development Control Rules</h3>
                <?php
                $aux=$BuildingProcess["Building Permits and Development Control Rules"];
                printInformation($aux);
                ?>
            </div>

            <div class="BuildingMaintenanceCondition">
                <h3 id="BuildingMaintenanceCondition">3.5 Building Maintenance and Condition</h3>
                <?php
                $aux=$BuildingProcess["Building Maintenance and Condition"];
                printInformation($aux);
                ?>
            </div>

            <div class="ConstructionEconomics">
                <h3 id="ConstructionEconomics">3.6 Construction Economics</h3>
                <?php
                $aux=$BuildingProcess["Construction Economics"];
                printInformation($aux);
                ?>
            </div>
        </div>



    </div>

    <div class="Socio-EconomicIssues">
        <h3 id="Socio-Economic Issues">4. Socio-Economic Issues</h3>
        <?php
        printInformation($socioEconomicIssues);
        ?>
    </div>

    <div class="Earthquakes">
        <h3 id="Earthquakes">5. Earthquakes</h3>
        <?php
        echo html_table($earthquakes);
        ?>
    </div>
</div>

</body>
</html>
