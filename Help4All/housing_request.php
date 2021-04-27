<?php
ob_start();
include("includes/service-header.php");
include("includes/housing-info.html");

require 'mysqli_connect.php';

if ( (isset($_GET['hid'])) && (is_numeric($_GET['hid'])) ) {
	$hid = $_GET['hid'];
} elseif ( (isset($_POST['hid'])) && (is_numeric($_POST['hid'])) ) {
	$hid = $_POST['hid'];
} elseif (isset($_POST['hidn_hid'])){
    //do nothing
    $hid = $_POST['hidn_hid'];
}
 else { // No valid ID, kill the script.
	echo '<p class="error">Unexpected error!</p>';
    include("includes/service-footer.html");
	exit();
}

$q = "SELECT hlistingid, type, leaseOption, rent, rooms, occupancyPerRoom, parking, utilities, comments, status, userId, quarantineRooms, address, postCode, washrooms FROM housing_listing where status = 'confirmed' AND hlistingid = '$hid'";
$r = @mysqli_query($dbc, $q);

$qroomT = "none";
$qroomS = "flex";

if(mysqli_num_rows($r) == 1){
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $parking = $row['parking'];
    if($row['quarantineRooms'] != "Available"){
        $qroomT = "flex";
        $qroomS = "none";
    }
    $maxOcc = ($row['rooms'] * $row['occupancyPerRoom']) + 1;
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
    
    if(!empty($_POST['numOfOcc'])){
        $numOfOcc = mysqli_real_escape_string($dbc, trim($_POST['numOfOcc']));
    }

    if(!empty($_POST['parking'])){
        $park = mysqli_real_escape_string($dbc, trim($_POST['parking']));
    }

    if(!empty($_POST['quarantine'])){
        $quarantine = mysqli_real_escape_string($dbc, trim($_POST['quarantine']));
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

    if(!empty($_POST['comments'])){
        $cmts = mysqli_real_escape_string($dbc, trim($_POST['comments']));
    }

    if (empty($errors)) {
        $huid = 'HOUS'.rand(101,9999).$userId.$hid;
        $q = "INSERT INTO housing_service_request (userId, hlistingid, numOfOccupants, parking, quarantine, phone, comments, uid, timestamp) VALUES ('2', '$hid', '$numOfOcc', '$park', '$quarantine', '$phn', '$cmts', '$huid', NOW() )";
        $r = @mysqli_query($dbc, $q);
        if ($r) { 
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
    <form id="service-query-form" action="housing_request.php" method="post">
        <p><label>Number of occupants:</label><input type="number" id="numOfOcc" min="1" max="<?php echo $maxOcc ?>" name="numOfOcc" size="15" value="<?php if(isset($numOfOcc)) echo $numOfOcc ?>"></p>
        <p><label>Parking:</label><input type="number" id="parking" min="0" max="<?php echo $parking ?>" name="parking" size="15" value="<?php if(isset($park)) echo $park ?>"></p>

        <p style="display:<?php echo $qroomT ?>"><label>Quarantine Rooms:</label><input type="text" id="qroom" disabled value="Not Available" name="qroom" size="15" ></p>

        <p style="display:<?php echo $qroomS ?>"><label>Quarantine Rooms:</label><select name="quarantine" value="<?php if(isset($quarantine)) echo $quarantine ?>"><option value="Required">Required</option><option value="Not Required" selected>Not Required</option></select></p>

        <p><label>Phone:</label><input id="phone" type="phone" name="phone" size="15" maxlength="10" placeholder="1234567897" value="<?php if(isset($phn)) echo $phn?>" required></p>
        <p><label>Comments:</label><textarea id="comments" name="comments" rows="7" cols="60" maxlength="250" value="<?php if(isset($cmts)) echo $cmts?>"></textarea></p>
        <p><input type="hidden" id="hidn_hid" name="hidn_hid" size="15" value="<?php echo $hid ?>"></p>
        <p><label></label><input class="transport-submit-btn" type="submit" value="Send"></p>
    </form>
</div>
<?php include("includes/service-footer.html"); ?>