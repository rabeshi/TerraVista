<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please complete the form and provide a valid email address.";
        exit;
    }

    $recipient = "info@terravistagroups.com";
    $email_subject = "Contact Form Submission: $subject";
    $email_content = "You have received a new message from the contact form.\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";
    $email_headers = "From: $name <$email>";

    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        // Output the success HTML page
        ?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">
  
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Mail Success - TerraVista Capital Group.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg"/>
    <!-- Place favicon.ico in the root directory -->
	
	<!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/responsive.css"/>
	
</head>

<body>

    <!-- Start Mail Success Area -->
    <section class="mail-success">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <!-- Success Image -->
                            <div class="success-image">
                                <img src="assets/images/mail-success.svg" alt="#">
                            </div>
                            <!--/ End Success Image -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <!-- Success Text -->
                            <div class="success-text">
                                <h2>Your Mail Sent Successfully!</h2>
                                <p>Thank you for contacting with us, We will send you feedback as soon as possible.</p>
                                <div class="button">
                                    <a href="index-2.html" class="btn mouse-dir white-bg">Go Homepage <span class="dir-part"></span></a>
                                </div>
                            </div>
                            <!--/ End Success Text -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Mail Success Area-->

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
  </body>

</html>
<?php
    } else {
        http_response_code(500);
        echo "Sorry, your message could not be sent. Please try again later.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission. Please try again.";
}
?>