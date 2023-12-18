<?php
include "../connection.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paisa Do</title>
    <link rel="stylesheet" type="text/css" href="payment.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="center">
                <h3>PAYMENT</h3>
                <form method="post" action="">
                    Full name
                    <input type="text" name="name" value="<?php echo $_SESSION['name']?>" disabled>
                    Email
                    <input type="text" name="email" value="<?php echo $_SESSION['email']?>" placeholder="Enter email" disabled>
                    Accepted Card <br>
                    <img src="image/card1.png" width="100">
                    <img src="image/card2.png" width="50">
                    <br><br>

                    Credit card number
                    <input type="text" name="" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>

                    Exp month
                    <input type="text" name="" placeholder="Enter Month" required>
                    <div id="zip">
                        <label>
                            Exp year
                            <select>
                                <option>Choose Year..</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </label>
                        <label>
                            CVV
                            <input type="number" name="" placeholder="CVV" size="3" required>
                        </label>
                    </div>
                    <input type="submit" name="submit" value="Proceed to Checkout">
                </form>
            </div>
        </div>
    </header>
</body>

</html>
<?php

$pay = 500;
if (isset($_POST['submit'])) {
    $count = 0;
    $res = mysqli_query($link, "select * from fee_paid where email='$_SESSION[email]'");
    $count = mysqli_num_rows($res);
    if ($count ==0) {
        mysqli_query($link, "insert into fee_paid values (NULL,'$pay','$_SESSION[email]') ");
    }
    else {
?>
        <script>
            window.location.href = "../index.php";
        </script>
<?php
    }
}
?>