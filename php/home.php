<!-- 
@Author: Can Cui
@Date: April 18, 2023
@PHP Version: PHP 8.0
@Purpose: Realize automatic photos replacement function, display the author's basic information,
 click the skills section can go to the corresponding position on other pages.

-->

    <h1 class="hidden">Home</h1>
    <section class="home_page">
        
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="./images/lavender.jpg" alt="A picture of me crouching in lavender." style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="./images/joshua.jpg"  alt="A view of Joshua Tree National Park." style="width:100%">

            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="./images/desert.jpg"  alt="A tourist photo of me in Grand Canyon National Park." style="width:100%">

            </div>

            <!-- Next and previous buttons -->
            <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
            <button class="next" onclick="plusSlides(1)">&#10095;</button>
        </div>
        
        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <!-- use"class='page_title'" to unify the style of all headings -->
        <h2 class="page_title"><em>|</em> Education And Career Experience</h2>
        <table class="experience">
            <tr>
                <td class="underline">2021-2023</td>
                <td>Information Management, Wayne State University,US</td>
                <td>Utilize and assess technologies for the creation,analysis, access and use of information</td>

            <tr>
                <td class="underline">2016-2018</td>
                <td>Yichang Three Gorges Inspection and Testing Center,China</td>
                <td>Focus on food product inspection technology and business learning.</td>
            </tr>

            <tr>
                <td class="underline">2014-2016</td>
                <td>Food Sience and Engineering, JiMei University</td>
                <td>Published 1 journal article and 3 patents,
                    and served as the vice president of the Student Union.</td>
            </tr>

            <tr>
                <td class="underline">2010-2014</td>
                <td>Food Sience and Engineering, Wuhan Institute of Design and sciences</td>
                <td>Learned food inspection and food safety
                    and other related knowledge and won scholarships continuously.</td>
            </tr>

        </table>
        
        <h2 class="page_title"><em>|</em> Personal Skills</h2>
        <ul class="bold">
            <!--use internal anchors so that the browser takes the user to the appropriate heading on another page-->
            <li><a href="./index.php?go=c4#web_design">Web Design</a></li>
            <li><a href="./index.php?go=c4#project_management">Project Management</a></li>
            <li><a href="./index.php?go=c4#database">Database</a></li>
            <li><a href="./index.php?go=c4#food_testing">Food Testing</a></li>
        </ul>
    </section>

    <script src="./javascript/script.js"></script>


       