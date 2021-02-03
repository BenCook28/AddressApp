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

    <?php
        if(isset($_GET["submit"])){
            $address1 = $_Get["address1"];
            $address2 = $_Get["address2"];
            $city = $_Get["city"];
            $state = $_Get["state"];
            $zip = $_Get["zip"];

            require_once(dirname(__FILE__) . 'smartystreets-php-skd/src/ClientBuilder.php');
            require_once(dirname(__FILE__) . 'smartystreets-php-skd/src/US_Street/Lookup.php');
            require_once(dirname(__FILE__) . 'smartystreets-php-skd/src/StaticCredentials.php');
            use SmartyStreets\PhpSdk\Exceptions\SmartyException;
            use SmartyStreets\PhpSdk\StaticCredentials;
            use SmartyStreets\PhpSdk\ClientBuilder;
            use SmartyStreets\PhpSdk\US_Street\Lookup;

            $lookupExample = new UsStreetSingleAddressExample();
$lookupExample->run();

class UsStreetSingleAddressExample {

    public function run() {
        $authId = 'Your SmartyStreets Auth ID here';
        $authToken = 'Your SmartyStreets Auth Token here';

        // We recommend storing your secret keys in environment variables instead---it's safer!
//        $authId = getenv('SMARTY_AUTH_ID');
//        $authToken = getenv('SMARTY_AUTH_TOKEN');

        $staticCredentials = new StaticCredentials($authId, $authToken);
        $client = (new ClientBuilder($staticCredentials))
//                        ->viaProxy("http://localhost:8080", "username", "password") // uncomment this line to point to the specified proxy.
                        ->buildUsStreetApiClient();

        // Documentation for input fields can be found at:
        // https://smartystreets.com/docs/cloud/us-street-api

        $lookup = new Lookup();
        $lookup->setInputId("24601"); // Optional ID from your system
        $lookup->setAddressee("John Doe");
        $lookup->setStreet("1600 Amphitheatre Pkwy");
        $lookup->setStreet2("closet under the stairs");
        $lookup->setSecondary("APT 2");
        $lookup->setUrbanization("");  // Only applies to Puerto Rico addresses
        $lookup->setCity("Mountain View");
        $lookup->setState("CA");
        $lookup->setZipcode("21229");
        $lookup->setMaxCandidates(3);
        $lookup->setMatchStrategy("invalid"); // "invalid" is the most permissive match,
                                                           // this will always return at least one result even if the address is invalid.
                                                           // Refer to the documentation for additional MatchStrategy options.

        try {
            $client->sendLookup($lookup);
            $this->displayResults($lookup);
        }
        catch (SmartyException $ex) {
            echo($ex->getMessage());
        }
        catch (Exception $ex) {
            echo($ex->getMessage());
        }
    }

    public function displayResults(Lookup $lookup) {
        $results = $lookup->getResult();

        if (empty($results)) {
            echo("\nNo candidates. This means the address is not valid.");
            return;
        }

        $firstCandidate = $results[0];

        echo("\nAddress is valid. (There is at least one candidate)\n");
        echo("\nZIP Code: " . $firstCandidate->getComponents()->getZIPCode());
        echo("\nCounty: " . $firstCandidate->getMetadata()->getCountyName());
        echo("\nLatitude: " . $firstCandidate->getMetadata()->getLatitude());
        echo("\nLongitude: " . $firstCandidate->getMetadata()->getLongitude());
    }
}

            $request_doc_template = <<<EOT
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

        echo "Address1: " . $xml->Address->Address1 . "\n";
        echo "Address2: " . $xml->Address->Address2 . "\n";
        echo "City: " . $xml->Address->City . "\n";
        echo "State: " . $xml->Address->State . "\n";
        echo "Zip5: " . $xml->Address->Zip5 . "\n";
        }

        $key = "8348838492075460";
        $hosts = "birdwatching_addresses";
        $AuthToken = "oHXrhHfZvRI3uGssPOL9";
        $AuthID = "4f0c5b30-72d5-5c15-79ba-1e48506626eb";

        
    ?>
</body>
</html>