<?php

include 'route.php';

echo 'Current PHP version: ' . phpversion();
echo '<pre>';
$route = new Router();
$route->add('/address_added');
$route->add('/get_address_info');

print_r($route);


function checkReponse($reponse)
{
    return true;
}
        if(isset($_POST["submit"])){
            $address1 = $_Get["address1"];
            $address2 = $_Get["address2"];
            $city = $_Get["city"];
            $state = $_Get["state"];
            $zip = $_Get["zip"];
        }

            /*$request_doc_template = <<<EOT
                <?xml version="1.0"?>
                <AddressValidateRequest USERID="812SYLIS7409">
                    <Revision>1</Revision>
                    <Address ID="0">
                        <Address1>$address1</Address1>
                        <Address2>$address2</Address2>
                        <City>$city</City>
                        <State>$state</State>
                        <Zip5>$zip</Zip5>
                        <Zip4/>
                    </Address>
                </AddressValidateRequest>
EOT;

        $doc_string = preg_replace('/[\t\n]/', '', $request_doc_template);
        $doc_string = urlencode($doc_string);
        $url = "http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=". $doc_string;

        $response = file_get_contents($url);

        $xml=simplexml_load_string($response) or die("Error: Cannot create object");
        print_r($xml);


        //1. Check for errors in the xml, if the response has erros send them to the page. Create a function that will validate the response.

        $error = checkReponse($xml);
        if($error) {
            $errorMessage = 'Something went wrong!!!!';
        }

        echo "Address1: " . $xml->Address->Address1 . "\n";
        echo "Address2: " . $xml->Address->Address2 . "\n";
        echo "City: " . $xml->Address->City . "\n";
        echo "State: " . $xml->Address->State . "\n";
        echo "Zip5: " . $xml->Address->Zip5 . "\n";
        };*/
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birdwatching Club Address App</title>
</head>
<body>
    <div>
        <h1>Birdwatching Club Address App</h1>
    </div>
    <?php /*if(isset($errorMessage)): ?>
        <h3><?= $errorMessage ?></h3>
    <?php endif; */?>
    <form method="post" action="index.php">
    <label>Street address 1</label><br><br>
    <input type="address1"/>
    <br><br>

    <label>Street address 2</label><br><br>
    <input type="address2"/>
    <br><br>

    <label>City</label><br><br>
    <input type="city"/>
    <br><br>

    <label>State</label><br><br>
    <select name="state">
    <option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="IA">IA</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="ME">ME</option>
	<option value="MD">MD</option>
	<option value="MA">MA</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MS">MS</option>
	<option value="MO">MO</option>
	<option value="MT">MT</option>
	<option value="NE">NE</option>
	<option value="NV">NV</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>
	<option value="NY">NY</option>
	<option value="NC">NC</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WV">WV</option>
	<option value="WI">WI</option>
	<option value="WY">WY</option>
    </select>
    <br><br>

    <label>ZIP</label><br><br>
    <input type="zip"/>
    <br><br>

    <input type="submit" name="submit" value="Submit"/>
    </form>

    
</body>
</html>