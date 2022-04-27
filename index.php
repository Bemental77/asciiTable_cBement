<!DOCTYPE html>
<html>
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Ascii Table Generator</title>

    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<?php
$myForm = <<<FORMSTUFF
        
        <h3>Generate ASCII Table</h3>
        
        <form action="$_SERVER[PHP_SELF]" method="post">
            
            <label>Number of rows:</label>
            <input type="text" name="numRows" id="numRows" value="32">
            <br><br>
            <input type="submit" name="go" value="Create ASCII Table">

        </form>
        
FORMSTUFF;

echo $myForm;

$numRows = $_POST['numRows'];
$endAscii = 256;

$numColumns = floor($endAscii / $numRows);


if ($endAscii % $numRows) {
    $numColumns++;
}

?>
<table>

    <?php

    for ($cols = 0; $cols < $numColumns; $cols++) {
        ?>
        <th class="num">ASCII</th>
        <th class="chr">CHR</th>
        <?php
    }
    ?>
    </tr>

    <?php
    
    for ($rows = 0; $rows < $numRows; $rows++) {

        ?>
        <tr>

            <?php

            for ($cols = 0; $cols < $endAscii; $cols+=$numRows) {
                $asciiNum = $rows + $cols;

                if ($asciiNum < $endAscii) {

                    $asciiChr = chr($asciiNum);
                    ?>

                    <td class="num"><?= $asciiNum ?></td>
                    <td class="chr"><?= $asciiChr ?></td>

                    <?php

                }

            }

            ?>
        </tr>
        <?php

    }

    ?>
</table>

</body>
</html>
