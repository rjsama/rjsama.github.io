<?php
$page_title = "View Books";
include('includes/header.html');

require('mysqli_connect.php');

$q = "SELECT * FROM bookinventory";
$r = @mysqli_query($dbc, $q);

$num = mysqli_num_rows($r);

if($num > 0){
    echo '<table width="60%">
    <thead>
    <tr>
        <th align="left">Name</th>
        <th align="left">Author</th>
        <th align="left">Category</th>
        <th align="left">Price</th>
        <th align="left">Quantity Available</th>
        <th align="left">Order</th>
    </tr>
    </thead>
    <tbody>
    ';

    $bg = '#eeeeee';
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
            echo '<tr bgcolor="' . $bg . '">
            <td align="left">' . $row['book_name'] . '</td>
            <td align="left">' . $row['author'] . '</td>
            <td align="left">' . $row['category'] . '</td>
            <td align="left"> $' . $row['price'] . '</td>
            <td align="left">' . $row['quantity_available'] . '</td>
            <td align="left"><a href="order_now.php?id=' . $row['book_id'] . '">Order Now</a></td>
        </tr>
        ';
    } // End of WHILE loop.

    echo '</tbody></table>';
    mysqli_free_result($r);
}
else{
    echo '<p class="error">Unable to retrieve data. Please try again later!</p>';
}
mysqli_close($dbc);

include('includes/footer.html');
?>