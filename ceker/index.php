<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="IwChecker v4.1.5, IwChecker.us.to">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo4.png" type="image/x-icon">
  <meta name="description" content="">
  <title>CVV Checker - Iw Checker</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
  <link href="assets/fonts/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/IwChecker/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<section class="mbr-section content5 cid-qsAok3Vdx1 mbr-parallax-background" id="content5-0" data-rv-view="13">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Iw Checker</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">Wellcome To My Checker<br>Powered by "Authorize.net"</h3>
                
                
            </div>
        </div>
    </div>
</section>

<center><iframe width="400" height="200" src="/count.html" frameborder="0"></iframe></center>


<section class="engine"><a href="https://IwChecker.us.to">bootstrap table</a></section><section class="mbr-section article content10 cid-qsApejUb2v" id="content10-4" data-rv-view="16">
    
     

    <div class="container">
        <div class="inner-container" style="width: 66%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-white mbr-fonts-style display-5">
                    <b>Check Your Card Here !!!</b>
					<form name="payform" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
<div class="maindiv" align="center">
<input name="firstname" type="hidden" value="Jonny">
<input name="lastname" type="hidden" value="Daniel">
<input name="email" type="hidden" value="hoamsss@hotmail.com">
<input name="address" type="hidden" value="385 Homestead Ave">
<input name="city" type="hidden" value="Hartford">
<input name="state" type="hidden" value="CT">
<input name="cardholder" type="hidden" value="Jonny Daniel">
    <input name="zip" type="hidden" value="06112">
    <div class="rightbox"><br><br><br>
    <div class="leftone">Card Number</div>
    <div class="rightone"><input name="cardnumber" type="text" maxlength="16"></div>
    <div class="leftone">Expiration</div>
    <div class="leftone"><input name="cardyear" type="text" maxlength="4"></div>
    <div class="leftone">CVV Number</div>
    <div class="rightone"><input name="cardcvv" type="text" maxlength="4"></div>
    <div class="leftone">Amount</div>
    <div class="rightone"><input name="amount" type="text" maxlength="3" value="1"></div>
<br><br><br>
    <div class="leftone""><input value="Check" style="border:1px outset gray; width:100px;" type="submit"></div>
    <div class="clear"></div>
</div>
<br><br>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $LOGINKEY = '42eRG47a7t63';// x_login
        $TRANSKEY = '227Y3uRYkXaL89fc';//x_tran_key
        $firstName =urlencode( $_POST['firstname']);
        $lastName =urlencode($_POST['lastname']);
        $creditCardType =urlencode ($_POST['cardtype']);
        $creditCardNumber = urlencode($_POST['cardnumber']);
        $expDateYear =urlencode( $_POST['cardyear']);
        $cvv2Number = urlencode($_POST['cardcvv']);
        $address1 = urlencode($_POST['address']);
        $city = urlencode($_POST['city']);
        $state =urlencode( $_POST['state']);
        $zip = urlencode($_POST['zip']);
        //give the actual amount below
        $amount = urlencode( $_POST['amount']);
        $currencyCode="USD";
        $paymentType="Sale";
    $post_values = array(
         "x_login"            => "$LOGINKEY",
        "x_tran_key"        => "$TRANSKEY",
         "x_version"            => "3.1",
        "x_delim_data"        => "TRUE",
        "x_delim_char"        => "|",
        "x_relay_response"    => "FALSE",
        //"x_market_type"        => "2",
        "x_device_type"        => "1",
          "x_type"            => "AUTH_CAPTURE",
        "x_method"            => "CC",
        "x_card_num"        => $creditCardNumber,
        "x_exp_date"        => $expDateYear,
         "x_card_code"        => $cvv2Number,
         "x_amount"            => $amount,
         "x_first_name"        => $firstName,
        "x_last_name"        => $lastName,
        "x_address"            => $address1,
        "x_state"            => $state,
        "x_response_format"    => "1",
         "x_zip"                => $zip
    );
    

    $post_string = "";
    foreach( $post_values as $key => $value )$post_string .= "$key=" . urlencode( $value ) . "&";
    $post_string = rtrim($post_string,"& ");

    //for live mode use the followin url
    $post_url = "https://secure.authorize.net/gateway/transact.dll";
    //for test use this url
    //$post_url = "https://test.authorize.net/gateway/transact.dll"; 

    $request = curl_init($post_url); // initiate curl object
    curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
    curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
    $post_response = curl_exec($request); // execute curl post and store results in $post_response
    // additional options may be required depending upon your server configuration
    // you can find documentation on curl options at http://www.php.net/curl_setopt
    curl_close ($request); // close curl object

    // This line takes the response and breaks it into an array using the specified delimiting character
    $response_array = explode($post_values["x_delim_char"],$post_response);
    if($response_array[0]==2||$response_array[0]==3) 
    {
        //success 
        echo '<b>Payment Failure</b>. <br>';
        echo '<br><br><b>Merchant Respond</b>: '.$response_array[3];
        echo '<br><br><b>Merchant CC Respond</b>: '.$response_array[5];
        echo '<br><br><b>Merchant CVV Respond</b>: '.$response_array[38];
        echo '<br><br>Press back button to go back to the previous page';
        echo "<br><br><br><br>";
    }
    else
    {
        $ptid = $response_array[6];
        $ptidmd5 = $response_array[7];
        echo "Payment Success";
        echo '<br><br><b>Merchant Respond</b>: '.$response_array[3];
        echo '<br><br><b>Merchant CC Respond</b>: '.$response_array[5];
        echo '<br><br><b>Merchant CVV Respond</b>: '.$response_array[38];
        echo "<br><br><br><br>";
    }
}
?>
					</div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
</section>


<section class="cid-qsAoHTHTC0" id="social-buttons1-1" data-rv-view="18">
    
    

    

    <div class="container">
        <div class="media-container-row">
            <div class="col-md-8 align-center">
                <h2 class="pb-3 mbr-section-title mbr-fonts-style display-2">
                    SHARE THIS PAGE!
                </h2>
                <div>
                    <div class="mbr-social-likes" data-counters="false">
                        <span class="btn btn-social facebook mx-2" title="Share link on Facebook">
                            <i class="socicon socicon-facebook"></i>
                        </span>
                        <span class="btn btn-social twitter mx-2" title="Share link on Twitter">
                            <i class="socicon socicon-twitter"></i>
                        </span>
                        <span class="btn btn-social plusone mx-2" title="Share link on Google+">
                            <i class="socicon socicon-googleplus"></i>
                        </span>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section once="" class="cid-qsAoJZ63tO" id="footer6-2" data-rv-view="21">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © Copyright 2017 Iw Cecker - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/jarallax/jarallax.min.js"></script>
  <script src="assets/social-likes/social-likes.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>