<?php

include("includes/service-header.php");
include("includes/housing-info.html");
require 'mysqli_connect.php';

$display = 10;

if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
	$pages = $_GET['p'];
} else { // Need to determine.
 	// Count the number of records:
	$q = "SELECT COUNT(hlistingid) FROM housing_listing";
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

echo '<h3 style="font-weight: bold;position: relative;color: #2f4d5a;z-index: 2;text-align:center;margin-top:3%">Listings</h3>';

$q = "SELECT hlistingid, type, leaseOption, rent, rooms, occupancyPerRoom, parking, utilities, description, status, userId, quarantineRooms, address, postCode, washrooms, moveinDate FROM housing_listing where status = 'confirmed' AND userId != '$s_userId'";
$r = @mysqli_query($dbc, $q);

$hcount = 0;

	echo '<table width="100%" style="margin-top: 1%; margin-bottom: 2%">
	<tbody>
	';

	$bg = '#eeeeee';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$hcount += 1;
		$highlight = "";
		if($row['quarantineRooms'] == "Available"){
			$highlight = "font-weight:bold";
		}
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr><td style="padding-top:1%"></td><td></td></tr>
		<tr bgcolor="' . $bg . '"><td></td><td></td></tr><tr>
		<td style="padding-top:1%"></td><td></td></tr><tr>
		<td width="20%">Accomodation Type:</td><td align="left">' . $row['type'] . '</td></tr><tr>
		<td>Address:</td><td align="left">' . $row['address'] . ', ' . $row['postCode'] . '</td></tr><tr>
		<td>Rent:</td><td align="left">$' . $row['rent'] . '</td></tr><tr>
		<td>Move-in Date:</td><td align="left">' . $row['moveinDate'] . '</td></tr><tr>
		<td>Lease:</td><td align="left">' . $row['leaseOption'] . '</td></tr><tr>
		<td>Rooms:</td><td align="left">' . $row['rooms'] . '</td></tr><tr>
		<td>Occupancy per Room:</td><td align="left">' . $row['occupancyPerRoom'] . '</td></tr><tr>
		<td style="'. $highlight .'">Quarantine Rooms:</td><td align="left" style="' . $highlight . '">' . $row['quarantineRooms'] . '</td></tr><tr>
		<td>Washrooms:</td><td align="left">' . $row['washrooms'] . '</td></tr><tr>
		<td>Parking:</td><td align="left">' . $row['parking'] . '</td></tr><tr>
		<td>Utilities:</td><td align="left">' . $row['utilities'] . '</td></tr><tr>
		<td>Description:</td><td align="left">' . $row['description'] . '</td></tr><tr>
		<td align="left" style="padding-top:2%"><a href="housing_request.php?hid=' . $row['hlistingid'] . '" style="text-decoration:none; color:#ffffff"><button class="btn btn-primary">Send Request</button></a></td><td></td>
		</tr>
		';
	} // End of WHILE loop.

	echo '</tbody></table>';

mysqli_free_result($r);

if($hcount == 0){
	echo '<p style="text-align:center">No Housing Listings published yet</p>';
}

mysqli_close($dbc);

?>

<?php include("includes/service-footer.html"); ?>