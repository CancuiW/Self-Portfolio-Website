 <!-- 
@Author: Can Cui
@Date: April 18, 2023
@PHP Version: PHP 8.0
@Purpose: 1.Store and call the uses' information in the Mysql database
          2.Sent message =1 or message=2 to form_example to display different textual outcome.


-->
 
 
 
 
 <?php 
     /* FOR FORM PROCESSING MESSAGES */
     /* message==1 or ==2 will execute different statements */

    //A session is a way to store information (in variables) to be used across multiple pages. 
    session_start();

        echo "<div class='reply'>";
            
                    
            if ($message == 1) {
                echo "<p class='replyMessage'>PLEASE FILL IN ALL THE REQUIRED FIELDS! </p>";
                
            } elseif ($message == 2) {
               

                
                    echo'<p>'.$_SESSION['records'].'</p>';
                    echo'<h3>Here Is Your Information</h3>';
                    echo"<table class='display_form'>";
                        echo'<tr>';
                            
                            echo'<th>First Name</th>';
                            echo'<th>Last Name</th>';
                            echo'<th>City</th>';
                            echo'<th>Email</th>';
                            echo'<th>State</th>';
                            echo'<th>Zip Code</th>';
                        echo'</tr>';


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
                
                //Execute a SQL query to get the last row in the table
                $sql="SELECT * FROM visitor ORDER BY id DESC LIMIT 1;";
                $result=mysqli_query($mysqli,$sql);

                if ($result->num_rows>0){
                    while ($row=mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        
                        echo "<td>".$row['firstName']."</td>";
                        echo "<td>".$row['lastName']."</td>";
                        echo "<td>".$row['city']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['state']."</td>";
                        echo "<td>".$row['zip']."</td>";
                        
                        echo '</tr>';}

                }else{
                    echo "No results";
                }
                //Close the database connection
                $mysqli->close();








                echo'</table>';
                
            } else {
                echo "<p class='replyMessage'>THERE WAS A PROBLEM.  PLEASE TRY AGAIN! <br> (CLICK THE 'CONTACT ME' BUTTON)</p>";
            }

                    
            
        echo "</div>"
   
             
 ?>           
         