<html>
<form action="q2_send_mail.php" method="POST">
    <label for="name">Enter your name: </label><input name="name" required><br><br>

    <label for="email">Enter your email address: </label><input type="email" name="email" required><br><br>

    <label for="feedback">Feedback </label><br><br><textarea name="feedback" required></textarea><br><br>

    <button type="submit">Submit</button>
</form>

<?php
if (isset($_POST['feedback'])) {
    $name = $_POST["name"];
    $to = $_POST["email"];
    $feedback = $_POST["feedback"];
    
    $subject = "Your feedback has been recorded, thank you!";
    $body = "Thank you, $name!";
    $headers = "From: admin@sender.com";
    if(mail($to, $subject, $body,$headers)){
        echo "Email successfully send to $to";
    }else{
        echo "Failed to send email";
    }

    $to_admin = "admin@personal.com";
    $subject = "Feedback from $name";
    $body = "Received new feedback from $name, with email address $email. The feedback given is: $feedback";
    if(mail($to_admin, $subject, $body, $headers)){
        echo "mail sent to admin";
    }else{
        echo "failed to send the mail to admin";
    }
}
?>

</html>