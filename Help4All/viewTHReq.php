<?php
                require 'mysqli_connect.php';
                function redirect_user($page = 'index.php'){
                    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                    $url = rtrim($url, '/\\');
                    $url .= '/'.$page;
                    header("Location: $url");
                    exit();
                }
                session_start();

                $s_userId = $_SESSION['userId'];

                $q = "SELECT s.serviceName, tr.trequestId, tr.userId, u.name, u.email, tr.tlistingid, tr.PickupAddr, tr.DestAddr, tr.PickupDate, tr.PickupTime, tr.phone, tr.comments, tr.returnJour, tr.status, tl.baseCharge, tl.chargePerKM, tl.luggage, tl.description, tl.userId from transport_service_request tr inner join transport_listing tl on tr.tlistingid = tl.tlistingId inner join services s on tl.serviceType = s.serviceId inner join users u on tr.userId = u.userId WHERE tl.userId = '$s_userId'";
                $r = @mysqli_query($dbc, $q);

                $tcount = 0;

                echo '<h3 style="font-weight: bold;position: relative;color: #2f4d5a;z-index: 2;text-align:center;">Transportation</h3>';
                echo '<table width="100%" style="margin-top: 1%; margin-bottom: 2%">
                <tbody>
                ';

                $bg = '#eeeeee';

                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    $tcount += 1;
                    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
                    echo '<tr><td style="padding-top:1%"></td><td></td></tr>
                    <tr bgcolor="' . $bg . '"><td></td><td></td></tr><tr>
                    <td style="padding-top:1%"></td><td></td></tr><tr>
                    <td width="20%">Service Type:</td><td align="left">' . $row['serviceName'] . '</td></tr><tr>
                    <td width="20%">Requested By:</td><td align="left">' . $row['name'] . ', ' . $row['email'] . ', ' . $row['phone'] . '</td></tr><tr>
                    <td>Pickup Address:</td><td align="left">' . $row['PickupAddr'] . '</td></tr><tr>
                    <td>Destination Address:</td><td align="left">' . $row['DestAddr'] . '</td></tr><tr>
                    <td>Pickup Date:</td><td align="left">' . $row['PickupDate'] . '</td></tr><tr>
                    <td>Pickup Time:</td><td align="left">' . $row['PickupTime'] . '</td></tr><tr>
                    <td>Return:</td><td align="left">' . $row['returnJour'] . '</td></tr><tr>
                    <td>Base Charge:</td><td align="left">$' . $row['baseCharge'] . '</td></tr><tr>
                    <td>Charge Per KM:</td><td align="left">$' . $row['chargePerKM'] . '</td></tr><tr>
                    <td>Luggage Capacity:</td><td align="left">' . $row['luggage'] . '</td></tr><tr>
                    <td>Comments:</td><td align="left">' . $row['comments'] . '</td></tr><tr>
                    <td align="left" style="padding-top:2%"><a href="requestReply.php?trid=' . $row['trequestId'] . '" style="text-decoration:none; color:#ffffff"><button class="btn btn-primary">Reply</button></a></td><td></td>
                    </tr>
                    ';
                }

                echo '</tbody></table>
                <input type="hidden" id="trequestCount" value="' . $tcount .'">';
                mysqli_free_result($r);

                if($tcount == 0){
                    echo '<p style="text-align:center;margin-bottom:4%">No Transport requests received yet</p>';
                }

                $q = "SELECT hr.hsrequestId, hr.userId, hr.numOfOccupants, hr.parking, hr.quarantine, hr.phone, hr.comments, hr.status, hs.address, hs.postCode, u.name, u.email, hs.type, hs.rent, hs.moveinDate, hs.userId FROM housing_service_request hr inner join housing_listing hs on hr.hlistingId = hs.hlistingid inner join users u on hr.userId = u.userId WHERE hs.userId = '$s_userId'";
                $r = @mysqli_query($dbc, $q);

                $hcount = 0;

                echo '<h3 style="font-weight: bold;position: relative;color: #2f4d5a;z-index: 2;text-align:center;margin-top:3%">Housing</h3>';
                echo '<table width="100%" style="margin-top: 1%; margin-bottom: 2%">
                <tbody>
                ';

                $bg = '#eeeeee';
                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    $hcount += 1;
                    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
                    echo '<tr><td style="padding-top:1%"></td><td></td></tr>
                    <tr bgcolor="' . $bg . '"><td></td><td></td></tr><tr>
                    <td style="padding-top:1%"></td><td></td></tr><tr>
                    <td width="20%">Accomodation Type:</td><td align="left">' . $row['type'] . '</td></tr><tr>
                    <td>Address:</td><td align="left">' . $row['address'] . ', ' . $row['postCode'] . '</td></tr><tr>
                    <td>Rent:</td><td align="left">$' . $row['rent'] . '</td></tr><tr>
                    <td>Move-in Date:</td><td align="left">' . $row['moveinDate'] . '</td></tr><tr>
                    <td>Requested By:</td><td align="left">' . $row['name'] . ', ' . $row['email'] . ', ' . $row['phone'] . '</td></tr><tr>
                    <td>Number of Occupants:</td><td align="left">' . $row['numOfOccupants'] . '</td></tr><tr>
                    <td>Parking:</td><td align="left">' . $row['parking'] . '</td></tr><tr>
                    <td>Quarantine:</td><td align="left">' . $row['quarantine'] . '</td></tr><tr>
                    <td>Comments:</td><td align="left">' . $row['comments'] . '</td></tr><tr>
                    <td>Status:</td><td align="left">' . $row['status'] . '</td></tr><tr>
                    <td align="left" style="padding-top:2%"><a href="requestReply.php?hrid=' . $row['hsrequestId'] . '" style="text-decoration:none; color:#ffffff"><button class="btn btn-primary">Reply</button></a></td><td></td>
                    </tr>
                    ';
                } // End of WHILE loop.

                echo '</tbody></table>
                <input type="hidden"  id="hrequestCount" value="' . $hcount .'">';
                $_SESSION['tcount'] = $tcount;
                $_SESSION['hcount'] = $hcount;
                mysqli_free_result($r);

                if($hcount == 0){
                    echo '<p style="text-align:center;margin-bottom:4%">No Housing Request received yet</p>';
                }

                mysqli_close($dbc);

                ?>