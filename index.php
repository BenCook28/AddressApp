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
    <input type="address1"/>
    <br><br>

    <input type="submit" name="submit" value="Submit"/>
    </form>

    <?php
        if(isset($_GET["submit"])){
            $address = $_Get["address"];
        }

        $request_doc_template = <<<EOT
        <?xml version="1.0"?>
        <AddressValidateRequest USERID="812SYLIS7409">
            <Revision>1</Revision>
            <Address ID=$address></Address1>
        </AddressValidateRequest>
        EOT;

        $doc_string = preg_replace('/[\t\n]/', '', $request_doc_template);
        $doc_string = urlencode($doc_string);
        $url = "http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=", $doc_string;
    ?>
</body>
</html>