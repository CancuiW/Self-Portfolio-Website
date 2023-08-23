<!-- 
@Author: Can Cui
@Date: April 18, 2023
@PHP Version: PHP 8.0
@Purpose: 1.Deal with the content of form(make sure the if all of them were filled out)
          2.Sent a email to connect the author
          3.Connect the Mysql database


-->


<?php
/* 
Aim to this PHP file:

*/

// WHere we send the information back after processing and mailing 
$pageOfForm = "../index.php?go=c3";


/* 1) CHECK for $_POST data */
if (isset($_POST) && ($_POST['checkMe'] == "12345")) {
    
    /* 2) CHECK for required fields here (||-->or) */
    if ( (trim($_POST['first-name']) == "") 
        || (trim($_POST['last-name']) == "") 
        || (trim($_POST['zip-code']) == "") 
        || (trim($_POST['city']) == "")
        || (trim($_POST['email']) == "")
        || (trim($_POST['state']) == ""))  { 
        
        /* Set an errorMessage variable to return to form page */
        $message = 1; 

        /* 3) SEND THEM BACK WITH header() */
        // https://www.php.net/manual/en/function.header.php
        header('Location: '.$pageOfForm.'&message='.$message);

    } else { 
        
        /* 3) We have data!  Let's trim it and mail it */
       // FYI: these keys come from our form <input> elment 'name' attribute values
        $firstName = trim($_POST['first-name']); 
        $lastName = trim($_POST['last-name']); 
        $zip_code = trim($_POST['zip-code']); 
        $city = trim($_POST['city']); 
        $email= trim($_POST['email']);
        $state = trim($_POST['state']); 
        

        /* 4) CREATE MAIL MESSAGE with variable values from form
        发出的邮件格式和内容
        
        */

        $mail_msg = "<html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <table>";
        
        $mail_msg .= "<tr><td>First Name:</td><td>".$firstName."</td></tr>";
        $mail_msg .= "<tr><td>Last Name: ".$lastName."</td></tr>";
        $mail_msg .= "<tr><td>Zip Code: ".$zip_code."</td></tr>";
        $mail_msg .= "<tr><td>City: ".$city."</td></tr>";
        $mail_msg .= "<tr><td>Email: ".$email."</td></tr>";
        $mail_msg .= "<tr><td>State: ".$state."</td></tr>";

        $mail_msg .= "</table>
        </body>
        </html>";



        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // send mail to
        $to = "hk2100@wayne.edu";

        // subject line
        $subject = "MY WEBSITE CONTACT FORM";

        /* 5) MAIL YOURSELF with PHP mail() function */
        mail($to, $subject, $mail_msg, $headers);

/*-----------------------------------------connect the database--------------------------------------------*/ 


        $server =	'127.0.0.1'; // hostname of our MySQL system
        $user =		'hk2100';    // username - your accessID
        $pass =		'hk2100884'; // password - password from your email
        $db =		'hk2100';    // database name - your accessID

        // initialize MySQLi in PHP
        $mysqli = mysqli_init();
        /* Check to see if we have initialized $mysqli from above */
        if (!$mysqli) {
            die('mysqli_init failed');
        }
        /* Set the connection time out to 20 seconds */
        if (!$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 20)) {
            die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
        }
        /* Pass the host, username, password, and database name  
        and try to connect to the database */
        if (!$mysqli->real_connect($server, $user, $pass, $db)) {
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
        // ensure characterset encoding
        $mysqli->set_charset("utf8mb4");

        $firstName_df= trim($_POST['first-name']); 
        $lastName_df= trim($_POST['last-name']); 
        $city_df =trim($_POST['city']); 
        $email_df =trim($_POST['email']); 
        $state_df =trim($_POST['state']); 
        $zip_code_df = trim($_POST['zip-code']); 


        #transfer the information data to Mysql datbase
        $insert="INSERT INTO visitor(firstName, lastName, city,email,state,zip) VALUES ('$firstName_df','$lastName_df','$city_df','$email_df','$state_df','$zip_code_df')";
                
        if ($mysqli->query($insert)===TRUE){
            $records="I will connect you as soon as possible!";
        }else {
            $records="Error: ".$insert."<br>".$mysqli->error;
        }


        $mysqli->close();

        session_start();
        $_SESSION['records']=$records;

        










        $message = 2;
        /* 6) SEND THEM BACK WITH header() */
        header( 'Location: '.$pageOfForm.'&message='.$message);
    } 
} else {
    header( 'Location: '.$pageOfForm);
}
?>