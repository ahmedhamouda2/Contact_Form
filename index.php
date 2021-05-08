<?php
// check if user coming from a request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assign Variables
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $cell = filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // creating errors of Errors
    $formErrors = array();
    if(strlen($user) <= 3){
        $formErrors[]= 'Username Must be Larger Than <strong>3</strong> Characters';
    }
    if(strlen($msg) < 10){
        $formErrors[]= 'Message can\'t be less than <strong>10</strong> Characters';
    }
    // if no errors send the email  [mail(To,subject,message,headers,parameters)]

    $headers = 'From:' . $email . '\r\n';
    $myEmail = 'ahmedhamouda9797@gmail.com';
    $subject = 'Contact Form';
    if(empty($formErrors)){
        mail($myEmail,$subject, $msg, $headers);
        $user = '';
        $email = '';
        $cell = '';
        $msg = '';

        $success = '<div class="alert alert-success">We have Received Your Message</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <!-- start form -->
    <div class="container">
        <h1 class="text-center">Contact Me</h1>
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <?php if (!empty($formErrors)){ ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php 
                            foreach( $formErrors as $error ){
                                echo $error . "<br>" ;               
                            }
                        ?>
                    </div>
                    <?php } ?>
                    <?php if(isset($success)){ echo $success;} ?>
            <div class="form-group">
                <input 
                class="username form-control" 
                type="text" name="username" 
                placeholder="Type your username" 
                value="<?php if(isset($user)){echo $user;} ?>">
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Username Must be Larger Than <strong>3</strong> Characters
                </div>
            </div>
            <div class="form-group">
                <input 
                class="email form-control" 
                type="email" 
                name="email" 
                placeholder="Please Type a Valid Email" 
                value="<?php if(isset($email)){echo $email;} ?>">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Email can\'t Be <strong>empty</strong> 
                </div>
            </div>
            <input 
            class="form-control" 
            type="text" 
            name="cellphone" 
            placeholder="Please Type cellphone"
            value="<?php if(isset($cell)){echo $cell;} ?>">
            <i class="fas fa-phone fa-fw"></i>
            <textarea 
            class="form-control" 
            name="message" 
            placeholder="Your Message!"><?php if(isset($msg)){echo $msg;} ?></textarea>
            <div class="alert alert-danger custom-alert">
                Message can\'t be less than <strong>10</strong> Characters
            </div>
            <input 
            class="btn btn-success" 
            type="submit" 
            name="Sent Message">
            <i class="fas fa-paper-plane fa-fw send-icon"></i>
        </form>
    </div>
    <!-- End form -->
    <script src="js/jQuery-v3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
