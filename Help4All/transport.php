<?php
include("includes/service-header.html");
require 'mysqli_connect.php';
function redirect_user($page = 'index.html'){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= '/'.$page;
    header("Location: $url");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $q = 'INSERT INTO queries (name, email, phone, city, province, subject, description) VALUES (?, ?, ?, ?, ?, ?, ?)';

    $stmt = $mysqli->prepare($q);

    $stmt->bind_param('sssssss', $user, $email, $phone, $city, $province, $sub, $desc);

    $user = strip_tags($_POST['uname']);
    $email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phone']);
    $city = strip_tags($_POST['city']);
    $province = strip_tags($_POST['province']);
    $sub = strip_tags($_POST['subject']);
    $desc = strip_tags($_POST['description']);

    $stmt->execute();
    
    if ($stmt->affected_rows == 1) {
        echo '<script>alert("Successfully registered your request. We will get back to you at the earliest.")</script>';
        // redirect_user('contactus.php');
    } else {
        echo '<script>alert("Failed to register your request. Please try again!")</script>';
    }

    $stmt->close();
    unset($stmt);
    $mysqli->close();
    unset($mysqli);
}
?>

<hr>
<p>We provide airport pickup/drop and ride share services at affordable prices. Choose from many of our service providers. They will pick you up from your pre-confirmed location and drop you off at your destination.<br>To confirm your booking, you just need to pay the base charge of your trip upfront.</p>
<p><i>Note: 
    <ul>
        <li>The base charge covers your trip cost if the distance travelled is 7 KMs or less. After 7 KMs, additional <strong>$1.50</strong> will be added.</li>
        <li>If you need to change your pickup location, time or the destination, you can only do that once by contacting us through our helpline atleast 8 hours before the confirmed pickup time. <u>No changes will be allowed after that.</u><br>
        Cancellations:
            <ul>
                <li>If you cancel before 8 hours of your confirmed pickup time, then you will be eligible for a full refund of the base charge.</li>
                <li>If you cancel before 5 hours of your confirmed pickup time, you will be refunded only 50% of the base charge.</li>
                <li><u>No refund will be given in any other case.</u></li>
            </ul></li></ul>
</i></p><br>
<div id="service-form-div">
    <form id="service-query-form" action="transport.php" method="post">
        <p><label>Service:</label><select id="service" name="service">
            <option value="airportPickup" selected>Airport Pickup</option>
            <option value="airportDrop">Airport Drop</option>
            <option value="rideShare">Ride Share</option>
        </select></p>
        <p><label>Airport:</label><select id="airport" name="airport">
            <option value="YYC">Calgary International Airport, Calgary, Alberta (YYC)</option>
            <option value="YEG">Edmonton International Airport, Edmonton, Alberta (YEG)</option>
            <option value="YVR">Vancouver International Airport, Vancouver, British Columbia (YVR)</option>
            <option value="YFC">Fredericton International Airport, Fredericton, New Brunswick (YFC)</option>
            <option value="YQM">Greater Moncton Roméo LeBlanc International Airport, Moncton, New Brunswick (YQM)</option>
            <option value="YYT">St. John's International Airport, St. John's, Newfoundland and Labrador (YYT)</option>
            <option value="YQX">Gander International Airport, Gander, Newfoundland and Labrador (YQX)</option>
            <option value="YHZ">Halifax Stanfield International Airport, Halifax, Nova Scotia (YHZ)</option>
            <option value="YUL">Montréal–Trudeau International Airport, Montreal, Quebec (YUL)</option>
            <option value="YQB">Québec/Jean Lesage International Airport, Quebec City, Quebec (YQB)</option>
            <option value="YQW">Ottawa Macdonald–Cartier International Airport, Ottawa, Ontario (YQW)</option>
            <option value="YYZ" selected>Toronto Pearson International Airport, Toronto, Ontario (YYZ)</option>
            <option value="YWG">Winnipeg International Airport, Winnipeg, Manitoba (YWG)</option>
        </select></p>
        <p><label>Service Provider:</label><select id="serviceProvider" name="serviceProvider">
            <option value="" selected>--select--</option>
        </select></p>
        <p><label>Base Charge:</label><input type="text" id="baseCharge" name="baseCharge" size="15" maxlength="5" readonly></p>
        <p><label>Charge Per KM:</label><input type="text" id="chargePerKM" name="chargePerKM" size="15" maxlength="5" readonly></p>
        <p><label>Pickup Address:</label><input type="text" id="pickAddr" name="pickAddr" size="15" maxlength="150" required></p>
        <p><label>Pickup Address:</label><input type="text" id="pickAddr" name="pickAddr" size="15" maxlength="150" required></p>
        <p><label>Pickup Postcode:</label><input type="text" id="pickpostcode" name="pickpostcode" size="15" maxlength="6" required></p>
        <p><label>Destination Address:</label><input type="text" id="destAddr" name="destination" size="15" maxlength="150" required></p>
        <p><label>Destination Postcode:</label><input type="text" id="destpostcode" name="destpostcode" size="15" maxlength="6" required></p>
        <p><label>Pickup Date:</label><input type="date" id="pickupDate" name="pickupDate" required></p>
        <p><label>Pickup Time:</label><input type="time" id="pickupTime" name="pickupTime" required></p>
        <p><label>Phone:</label><input id="phone" type="phone" name="phone" size="15" maxlength="10" required></p>
        <p><label>Comments:</label><textarea name="comments" id="comments" rows="7" cols="60" maxlength="250"></textarea></p>
        <p><label></label><input class="transport-submit-btn" type="submit" value="Send"></p>
    </form>
</div>
<?php include("includes/service-footer.html"); ?>