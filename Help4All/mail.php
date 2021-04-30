<?php?>

<script src=
	"https://smtpjs.com/v3/smtp.js">
</script>

<script type="text/javascript">
    Email.send({
        Host: "smtp.gmail.com",
        Username: "help4allnoreply123@gmail.com",
        Password: "MyPs@107",
        To: 'rajatmahajanrm26@gmail.com',
        From: "help4allnoreply123@gmail.com",
        Subject: "New Request",
        Body: "Hi, You have new pending requests",
    })
        .then(function (message) {
        alert("mail sent successfully")
        });
</script>