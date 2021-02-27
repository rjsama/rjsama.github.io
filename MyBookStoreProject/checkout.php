<?php
$page_title = "Checkout";
include('includes/header.html');

require('mysqli_connect.php');

session_start();

if(!isset($_SESSION['bookId'])){
    echo '<p class="error">Unexpected error! Session not set.</p>';
}
else{
    $id = $_SESSION['bookId'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = [];

    if (empty($_POST['fname'])) {
		$errors[] = 'You forgot to enter your first name.';
	} 
    else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['fname']));
	}

    if (empty($_POST['lname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} 
    else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lname']));
	}

    if (empty($_POST['cardNo'])) {
		$errors[] = 'You forgot to enter your card number.';
	} 
    else {
		$cn = mysqli_real_escape_string($dbc, trim($_POST['cardNo']));
	}

    $ct = mysqli_real_escape_string($dbc, trim($_POST['cardType']));
    $mn = mysqli_real_escape_string($dbc, trim($_POST['month']));
    $yr = mysqli_real_escape_string($dbc, trim($_POST['year']));
    $expiry = $mn.$yr;

    $fn = strip_tags($fn);
    $ln = strip_tags($ln);
    $cn = strip_tags($cn);

    if(strlen($cn) != 16){
        $errors[] = "Please enter a valid card number!";
    }

    if(empty($errors)){
        $q_p = "INSERT INTO payment (card_no, card_type, expiry) VALUES ('$cn', '$ct', '$expiry')";
        $r_p = @mysqli_query($dbc, $q_p);
        if($r_p){
            $q_ps = "SELECT payment_id from payment order by payment_id desc limit 1";
            $r_ps = @mysqli_query($dbc, $q_ps);
            if(mysqli_num_rows($r_ps) == 1){
                $row_ps = mysqli_fetch_array($r_ps, MYSQLI_NUM);
                $pId = $row_ps[0];
            }

            $q_oi = "INSERT INTO bookinventoryorder_item (order_date, book_id, payment_id) VALUES (NOW(), '$id', '$pId')";
            $r_oi = @mysqli_query($dbc, $q_oi);
            if($r_oi){
                $q_oi_s = "SELECT order_item_id from bookinventoryorder_item order by order_item_id desc limit 1";
                $r_oi_s = @mysqli_query($dbc, $q_oi_s);
                if(mysqli_num_rows($r_oi_s) == 1){
                    $row_oi_s = mysqli_fetch_array($r_oi_s, MYSQLI_NUM);
                    $oiId = $row_oi_s[0];
                }

                $q_o = "INSERT INTO bookinventoryorder (first_name, last_name, order_item_id) VALUES ('$fn', '$ln', '$oiId')";
                $r_o = @mysqli_query($dbc, $q_o);
                if($r_o){
                    $new_quantity = $_SESSION['quantity'] - 1;
                    $q_u = "UPDATE bookinventory SET quantity_available = '$new_quantity' where book_id = '$id'";
                    $r_u = @mysqli_query($dbc, $q_u);
                    if (mysqli_affected_rows($dbc) == 1){
                        //do nothing
                    }
                    
                    echo "Thank you for ordering from our My Book Store!<br>";
                    echo "Your order number is <strong>#MBS" . rand(1425, 8999) . "</strong>";
                }
                else {
                    echo '<h1>System Error</h1>
                    <p class="error">Order could not be processed. Please try again later!</p>';
                }
            }
            else {
                echo '<h1>System Error</h1>
                <p class="error">Order could not be processed. Please try again later!</p>';
            }
        }
        else {
			echo '<h1>System Error</h1>
			<p class="error">Order could not be processed. Please try again later!</p>';
		}
    }
    else {

		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) {
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p>';
	}
    mysqli_close($dbc);
}
include('includes/footer.html');
?>