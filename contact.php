<?php
/* Set e-mail recipient */
$myemail  = "christianmatthews55@gmail.com";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['yourname'], "Enter your name");
$phone  = check_input($_POST['phone'], "Enter Your Phone Number");
$email    = check_input($_POST['email']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* message for e-mail */
$message = "

contact form details

Name: $yourname
PhoneL $phone
E-mail: $email

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>