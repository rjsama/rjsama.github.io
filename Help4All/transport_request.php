<?php
ob_start();
include("includes/service-header.php");
include("includes/transport-info.html");

require 'mysqli_connect.php';

if ( (isset($_GET['tid'])) && (is_numeric($_GET['tid'])) ) {
	$tid = $_GET['tid'];
} elseif ( (isset($_POST['tid'])) && (is_numeric($_POST['tid'])) ) {
	$tid = $_POST['tid'];
} elseif (isset($_POST['hid_tid'])){
    //do nothing
    $tid = $_POST['hid_tid'];
}
 else { // No valid ID, kill the script.
	echo '<p class="error">Unexpected error!</p>';
    include("includes/service-footer.html");
	exit();
}

$q = "SELECT s.serviceName, tl.serviceType, tl.baseCharge, tl.chargePerKM, tl.luggage, tl.userId from transport_listing tl inner join services s on tl.serviceType = s.serviceId where tl.status = 'confirmed' AND tl.tlistingid = '$tid'";
$r = @mysqli_query($dbc, $q);

if(mysqli_num_rows($r) == 1){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

    $serviceName = $row['serviceName'];
    $baseCharge = '$' . $row['baseCharge'];
    $chargePerKM = '$' . $row['chargePerKM'];
}

mysqli_free_result($r);

//set requesting userId here
$userId = '2';
function redirect_user($page = 'index.php'){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= '/'.$page;
    header("Location: $url", true);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    
    if(!empty($_POST['pickAddr'])){
        $pickAddr = mysqli_real_escape_string($dbc, trim($_POST['pickAddr']));
    }

    $pcregex = "/^[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}$/";
    if(!empty($_POST['pickpc'])){
        $pickpc = mysqli_real_escape_string($dbc, trim($_POST['pickpc']));
        if (preg_match_all($pcregex, $pickpc, $matches)){
            // echo 'TRUE!';
            
            // echo '<pre>'.print_r($matches, 1).'</pre>';
        } else {
            $errors[] = 'Please enter a valid pickup postcode';
        }
    }

    if(!empty($_POST['destAddr'])){
        $destAddr = mysqli_real_escape_string($dbc, trim($_POST['destAddr']));
    }

    if(!empty($_POST['destpc'])){
        $destpc = mysqli_real_escape_string($dbc, trim($_POST['destpc']));
        if (preg_match_all($pcregex, $destpc, $matches)){
            // echo 'TRUE!';
            
            // echo '<pre>'.print_r($matches, 1).'</pre>';
        } else {
            $errors[] = 'Please enter a valid destination postcode';
        }
    }

    if(strtolower($pickpc) == strtolower($destpc)){
        $errors[] = 'Pickup postcode and destination postcode cannot be same';
    }

    $phnregex = "/^[0-9]{10}$/";

    if(!empty($_POST['phone'])){
        $phn = mysqli_real_escape_string($dbc, trim($_POST['phone']));
        if (preg_match_all($phnregex, $phn, $matches)){
            // echo 'TRUE!';
            
            // echo '<pre>'.print_r($matches, 1).'</pre>';
        } else {
            $errors[] = 'Please enter a valid phone number';
        }
    }

    if(!empty($_POST['pickupDate'])){
        $pd = mysqli_real_escape_string($dbc, trim($_POST['pickupDate']));
    }

    if(!empty($_POST['pickupTime'])){
        $pt = mysqli_real_escape_string($dbc, trim($_POST['pickupTime']));
    }

    if(!empty($_POST['ret'])){
        $ret = mysqli_real_escape_string($dbc, trim($_POST['ret']));
    }

    if(!empty($_POST['comments'])){
        $cmts = mysqli_real_escape_string($dbc, trim($_POST['comments']));
    }

    if (empty($errors)) { 
        $pAddr = $pickAddr . ', ' . $pickpc;
        $dAddr = $destAddr . ', ' . $destpc;

        $tuid = 'TPORT'.rand(101,9999).$userId.$tid;
        $q = "INSERT INTO transport_service_request (userId, tlistingid, PickupAddr, DestAddr, PickupDate, PickupTime, phone, comments, uid, timestamp) VALUES ('2', '$tid', '$pAddr', '$dAddr', '$pd', '$pt', '$phn', '$cmts', '$tuid', NOW() )";
        $r = @mysqli_query($dbc, $q);
        if ($r) { 
            //request sent successfully. send email
            echo '<script type="text/javascript"> sendEmail(); </script>';
            redirect_user('successReq.php');

        } else {
            redirect_user('error.php');

            // Debugging message:
            // echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($dbc);
        
        exit();

    } else { // Report the errors.

        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br>';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br>\n";
        }
        echo '</p><p>Please try again.</p><p><br></p>';

    } // End of if (empty($errors)) IF.

    mysqli_close($dbc);
}

?>
<div id="service-form-div" style="margin-top:2%">
    <form id="service-query-form" action="transport_request.php" method="post">
        <p><label>Service Type:</label><input type="text" id="serviceType" value="<?php echo $serviceName ?>" name="serviceType" size="15" readonly></p>
        <p><label>Base Charge:</label><input type="text" id="baseCharge" name="baseCharge" value="<?php echo $baseCharge ?>" size="15" readonly></p>
        <p><label>Charge Per KM:</label><input type="text" id="chargePerKM" name="chargePerKM" value="<?php echo $chargePerKM ?>" size="15" readonly></p>
        <p><label>Pickup Address:</label><input type="text" id="pickAddr" name="pickAddr" size="15" maxlength="150" value="<?php if(isset($pickAddr)) echo $pickAddr?>" required></p>
        <p><label>Pickup Postcode:</label><input type="text" id="pickpc" name="pickpc" size="15" maxlength="6" placeholder="x1xy2y" value="<?php if(isset($pickpc)) echo $pickpc?>" required></p>
        <p><label>Destination Address:</label><input type="text" id="destAddr" name="destAddr" size="15" maxlength="150" value="<?php if(isset($destAddr)) echo $destAddr?>" required></p>
        <p><label>Destination Postcode:</label><input type="text" id="destpc" name="destpc" size="15" maxlength="6" placeholder="x1xy2y" value="<?php if(isset($destpc)) echo $destpc?>" required></p>
        <p><label>Pickup Date:</label><input type="date" id="pickupDate" name="pickupDate"  value="<?php if(isset($pd)) echo $pd?>" required></p>
        <p><label>Pickup Time:</label><input type="time" id="pickupTime" name="pickupTime"  value="<?php if(isset($pt)) echo $pt?>" required></p>
        <p><label>Return:</label><select id="ret" name="ret" value="<?php if(isset($ret)) echo $ret?>"><option value="yes">Yes</option><option value="no" selected>No</option></select></p>
        <p><label>Phone:</label><input id="phone" type="phone" name="phone" size="15" maxlength="10" placeholder="1234567897" value="<?php if(isset($phn)) echo $phn?>" required></p>
        <p><label>Comments:</label><textarea id="comments" name="comments" rows="7" cols="60" maxlength="250" value="<?php if(isset($cmts)) echo $cmts?>"></textarea></p>
        <p><input type="hidden" id="hid_tid" name="hid_tid" size="15" value="<?php echo $tid ?>"></p>
        <p><label></label><input class="transport-submit-btn" type="submit" value="Send"></p>
    </form>
</div>
<?php include("includes/service-footer.html"); ?>