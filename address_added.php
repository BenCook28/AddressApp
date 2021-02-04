<html>
<head>
<title>Add Address</title>
</head>
<body>
<?php
 
if(isset($_POST['submit'])){
     
    $data_missing = array();
     
    if(empty($_POST['address_1'])){
 
        $data_missing[] = 'address_1';
 
    } else {
 
        // Trim white space from the name and store the name
        $address_1 = trim($_POST['address_1']);
 
    }
 
    if(empty($_POST['address_2'])){
 
        // Adds name to array
        $data_missing[] = 'address_2';
 
    } else{
 
        // Trim white space from the name and store the name
        $address_2 = trim($_POST['address_2']);
 
    }
 
    if(empty($_POST['city'])){
 
        // Adds name to array
        $data_missing[] = 'City';
 
    } else {
 
        // Trim white space from the name and store the name
        $city = trim($_POST['city']);
 
    }
 
    if(empty($_POST['state'])){

        // Adds name to array
        $data_missing[] = 'State';

    } else {

        // Trim white space from the name and store the name
        $state = trim($_POST['state']);

    }

    if(empty($_POST['zip'])){

        // Adds name to array
        $data_missing[] = 'Zip Code';

    } else {

        // Trim white space from the name and store the name
        $zip = trim($_POST['zip']);

    }

    if(empty($data_missing)){       

        require_once('../mysqli_connect.php');       

        $query = "INSERT INTO addresses (address_1, address_2, city, state, zip) VALUES (?, ?, ?,

        ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ssssssisssd", $address_1,

                               $address_2, $city,

                               $state, $zip);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Address Entered';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';

            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }
    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }
}
?>
<form action="http://localhost/address_added.php" method="post">
    <b>Add a New Address</b>
    <p>Address 1:
<input type="text" name="address_1" size="30" value="" />
</p>
<p>Address 2:
<input type="text" name="address_2" size="30" value="" />
</p>
<p>City:
<input type="text" name="city" size="30" value="" />
</p>
<p>State (2 Characters):
<input type="text" name="state" size="30" maxlength="2" value="" />
</p>
<p>Zip Code:
<input type="text" name="zip" size="30" maxlength="5" value="" />
</p>
<p>
    <input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>

