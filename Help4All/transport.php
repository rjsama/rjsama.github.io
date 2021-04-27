<?php 
include("includes/service-header.php");
include("includes/transport-info.html");

require 'mysqli_connect.php';

$display = 10;

if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
	$pages = $_GET['p'];
} else { // Need to determine.
 	// Count the number of records:
	$q = "SELECT COUNT(tlistingid) FROM transport_listing";
	$r = @mysqli_query($dbc, $q);
	$row = @mysqli_fetch_array($r, MYSQLI_NUM);
	$records = $row[0];
	// Calculate the number of pages...
	if ($records > $display) { // More than 1 page.
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}
}

if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

$s_userId = $_SESSION['userId'];

$q = "SELECT s.serviceName, tl.tlistingid, tl.serviceType, tl.baseCharge, tl.chargePerKM, tl.status, tl.luggage, tl.description, tl.userId from transport_listing tl inner join services s on tl.serviceType = s.serviceId where tl.status = 'confirmed' AND tl.userId != '$s_userId' ";
$r = @mysqli_query($dbc, $q);

$tcount = 0;

echo '<h3 style="font-weight: bold;position: relative;color: #2f4d5a;z-index: 2;text-align:center;">Listings</h3>';
echo '<table width="100%" style="margin-top: 4%; margin-bottom: 4%">
<thead>
<tr>
	<th align="left"><strong>Service Type</strong></th>
	<th align="left"><strong>Base Charge</strong></th>
	<th align="left"><strong>Charge Per KM</strong></th>
	<th align="left"><strong>Luggage Capacity</strong></th>
	<th align="left"><strong>Description</strong></th>
	<th align="left"></th>
</tr>
</thead>
<tbody><tr><td></td></tr>
';

$bg = '#eeeeee';

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	$tcount += 1;
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr>
		<td align="left">' . $row['serviceName'] . '</td>
		<td align="left">$' . $row['baseCharge'] . '</td>
		<td align="left">$' . $row['chargePerKM'] . '</td>
		<td align="left">' . $row['luggage'] . '</td>
		<td align="left">' . $row['description'] . '</td>
		<td align="left"><a href="transport_request.php?tid=' . $row['tlistingid'] . '" style="text-decoration:none; color:#ffffff"><button class="btn btn-primary">Request Ride</button></a></td>
	</tr>
	';
}


echo '</tbody></table>';
mysqli_free_result($r);

if($tcount == 0){
	echo '<p style="text-align:center">No Transport Listings published yet</p>';
}

mysqli_close($dbc);

include("includes/service-footer.html"); ?>