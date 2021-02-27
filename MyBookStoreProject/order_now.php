<?php
$page_title = 'Order Now';
include('includes/header.html');

require('mysqli_connect.php');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
	$id = $_GET['id'];
}
elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
	$id = $_POST['id'];
}
else {
	echo '<p class="error">Unexpected error!</p>';
	include('includes/footer.html');
	exit();
}

if(!empty($id)){
    session_start();
    $_SESSION['bookId'] = $id;
}

$q = "SELECT book_name, author, category, price, quantity_available FROM bookinventory WHERE book_id = '$id'";
$r = @mysqli_query($dbc, $q);

if(mysqli_num_rows($r) == 1){
    $row = mysqli_fetch_array($r, MYSQLI_NUM);

    $_SESSION['bookName'] = $row[0];
    $_SESSION['author'] = $row[1];
    $_SESSION['category'] = $row[2];
    $_SESSION['price'] = $row[3];
    $_SESSION['quantity'] = $row[4];
}



echo "<h2>Order Details</h2>";

echo '<table width="60%">
    <thead>
    <tr>
        <th align="left">Name</th>
        <th align="left">Author</th>
        <th align="left">Category</th>
        <th align="left">Price</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td align="left">' . $_SESSION['bookName'] . '</td>
        <td align="left">' . $_SESSION['author'] . '</td>
        <td align="left">' . $_SESSION['category'] . '</td>
        <td align="left">$' . $_SESSION['price'] . '</td>
    </tr>
    </tbody></table><br><br>';


echo '<form action="checkout.php" method="post">
    <p><label>First Name: <input type="text" name="fname" size="15" maxlength="60" required></label></p>
    <p><label>Last Name: <input type="text" name="lname" size="15" maxlength="60" required></label></p>
    <p><label>Card Type: <select name="cardType"><option value="Credit" selected>Credit</option><option value="Debit">Debit</option></select></label></p>
    <p><label>Card Number: <input type="number" name="cardNo" size="15" maxlength="16" required></label></p>
    <p><label>Expiry: <select name="month"><option value="01" selected>01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>

    <select name="year"><option value="2019" selected>2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option></select>
    </label></p>
    <input type="submit" value="Submit">
</form>';

include('includes/footer.html');
?>