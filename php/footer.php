<!-- 
@Author: Can Cui
@Date: April 18, 2023
@PHP Version: PHP 8.0
@Purpose: Display the local time in real time and unify the footer content of all pages.

-->


<footer class="footer">
    <div class='left-footer'>
         <ul>
            <li>&copy;2023 CanCui</li>
            <li><a href="mailto:can.cui@wayne.edu">Contact Me</a></li> 
            
        </ul>

    </div>

    <div class='right-footer'>
        <?php
            //Set the time zone to Western Standard Time 
            date_default_timezone_set('America/Detroit'); 
            //The date() function is used to format a Unix timestamp into a date and time string in the specified format
            echo $data->name.' '.date("D M j g:iA", $currentTime); 
            
        ?>
    </div>
       
</footer>
 