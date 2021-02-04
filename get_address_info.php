<?php
    require('mysqli_connect.php');

    $query = "Select * FROM addresses";

    $response = @mysqli_query($dbc, $query);

    if($response){

        echo '<table align="left"
        cellspacing="5" cellpadding="8">
        <tr><td align="left"><b>Address 1</b></td>
        <td align="left"><b>Address 2</b></td>
        <td align="left"><b>City</b></td>
        <td align="left"><b>State</b></td>
        <td align="left"><b>Zip</b></td></tr>';

        while($row = mysqli_fetch_array($response)){
            echo '<tr><td align="left">' .
            $row['address1'] . '</td><td align="left">' .
            $row['address2'] . '</td><td align="left">' .
            $row['city'] . '</td><td align="left">' .
            $row['state'] . '</td><td align="left">' .
            $row['zip'] . '</td><td align="left">';

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "Couldn't issue database query<br />";
        echo mysqli_error($dbc);
    }

    mysqli_close($dbc);

?>