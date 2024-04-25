<?php
// Output messages
$response = '';
// Check if the form was submitted
if (isset($_POST['rating'], $_POST['hear_about_us'], $_POST['contact_pref'], $_POST['email'], $_POST['comments'], $_POST['recommend'])) {
	// Process form data 
	// Assign POST variables
	$rating = $_POST['rating'];
	$hear_about_us = $_POST['hear_about_us'];
	$contact_pref = implode(', ', $_POST['contact_pref']);
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	$recommend = $_POST['recommend'];
	// Where to send the mail? It should be your email address
	$to      = 'vaniabao34@gmail.com';
	// Mail from
	$from    = 'noreply@yourwebsite.com';
	// Mail subject
	$subject = 'A user has submitted a survey';
	// Mail headers
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	// Capture the email template file as a string
	ob_start();
	include 'email-template.php';
	$email_template = ob_get_clean();
	// Try to send the mail
	if (mail($to, $subject, $email_template, $headers)) {
		// Success
		$response = '<h3>Thank You!</h3><p>With your help, we can improve our services for all our trusted members.</p>';		
	} else {
		// Fail
		$response = '<h3>Error!</h3><p>Message could not be sent! Please check your mail server settings!</a>';
	}
} 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Survey Form</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="library/three.min.js"></script>
        <script src="library/dat.gui.min.js"></script>
        <script src="library/TrackballControls.js"></script>
        <script src="dotcha/pattern_custom-10.js"></script>
        <script src="dotcha/graph.js"></script>
	</head>
	<body>
		<form class="survey-form" method="post" action="">		
            <h1><i class="far fa-list-alt"></i>CAPTCHA Survey</h1>
            <div class="steps">
                <div class="step current"></div>
                <div class="step"></div>
                <div class="step"></div>
                <div class="step"></div>
                <div class="step"></div>
            </div>

            <div class="step-content" data-step="0">
                <div class="fields">
                    <p> Thanks for your response, you may now exit this webpage </p>
                </div>    
            </div>

            <div class="step-content current" data-step="1">
                <div class="fields">
                    <p> Welcome to the following survey about text-based captcha. By proceeding to the following questions you are agreeing to be a participant in this survey. No personally identifiable information will be shared and information collected will be deleted 4 years after this study is concluded. </p>
                    <p> Do you still want to participate in this survey? </p>
                    <div class="buttons">
                    <a href="#" class="btn" data-set-step="2">Yes</a>
                    <a href="#" class="btn" data-set-step="0">No</a>
                    </div>
                </div>
            </div>
            <div class="step-content" data-step="2">
                <div class="fields">
                    <p> First please fill out some demographic information: </p>
                    <p> How old are you? </p>
                    <div class="group">
                        <label for="younger than 10">
                            <input type="radio" name="ages" id="< 10" value="< 10">
                            < 10
                        </label>
                        <label for="10-20">
                            <input type="radio" name="ages" id="10-20" value="10-20">
                            10-20
                        </label>
                        <label for="20-30">
                            <input type="radio" name="ages" id="20-30" value="20-30">
                            20-30
                        </label>
                        <label for="30-40">
                            <input type="radio" name="ages" id="30-40" value="30-40">
                            30-40
                        </label>		
                        <label for="40-50">
                            <input type="radio" name="ages" id="40-50" value="40-50">
                            40-50
                        </label>
                        <label for="50-60">
                            <input type="radio" name="ages" id="50-60" value="50-60">
                            50-60
                        </label>
                        <label for="older than 60">
                            <input type="radio" name="ages" id=" > 60" value=" > 60">
                            > 60
                        </label>
                        <label for="N/A">
                            <input type="radio" name="ages" id="unspecified" value="unspecified">
                            prefer not to say
                        </label>
                    </div>
                    
                    <p> What is your gender </p>
                    <div class="group">
                        <label for="female">
                            <input type="radio" name="gender" id="female" value="male">
                            female
                        </label>
                        <label for="male">
                            <input type="radio" name="gender" id="male" value="male">
                            male
                        </label>
                        <label for="other">
                            <input type="radio" name="gender" id="other" value="other">
                            other
                        </label>
                        <label for="N/A">
                            <input type="radio" name="gender" id="unspecified" value="unspecified">
                            prefer not to say
                        </label>
                    </div>

                    <p>What is the highest level of education that you have completed?</p>
                    <div class="group">
                        <label for="radio6">
                            <input type="radio" name="hear_about_us" id="radio6" value="Search Engine">
                            Middle School
                        </label>
                        <label for="radio7">
                            <input type="radio" name="hear_about_us" id="radio7" value="Newsletter">
                            High School 
                        </label>
                        <label for="radio8">
                            <input type="radio" name="hear_about_us" id="radio8" value="Advertisements">
                            Associates Degree
                        </label>		
                        <label for="radio9">
                            <input type="radio" name="hear_about_us" id="radio9" value="Social Media">
                            Bachelor's Degree
                        </label>
                        <label for="radio9">
                            <input type="radio" name="hear_about_us" id="radio9" value="Social Media">
                            Master or Graduate Degree
                        </label>	
                        <label for="radio9">
                            <input type="radio" name="hear_about_us" id="radio9" value="Social Media">
                            Doctorate or Professional Degree
                        </label>		
                    </div>	
                    <p>What languages do you know?</p>
                    <div>
                        <input type="text" id="langauges" name="lang">
                    </div>
                    <p>Rate your familiarity with computers</p>
                    <div class="rating">
                        <input type="radio" name="recommend" id="radio10" value="Very Unlikely">
                        <label for="radio10">1</label>
                        <input type="radio" name="recommend" id="radio11" value="Unlikely">
                        <label for="radio11">2</label>
                        <input type="radio" name="recommend" id="radio12" value="Neutral">
                        <label for="radio12">3</label>
                        <input type="radio" name="recommend" id="radio13" value="Likely">
                        <label for="radio13">4</label>
                        <input type="radio" name="recommend" id="radio14" value="Very Likely">
                        <label for="radio14">5</label>
                    </div>
                    <div class="rating-footer">
                        <span>Very Unfamiliar</span>
                        <span>Very Familiar</span>
                    </div>
                    <p>How many years have you been on the internet?</p>
                    <div class="group">
                        <label for="year1">
                            <input type="radio" name="internetyears" id="year1" value="1-5">
                            1 - 5
                        </label>
                        <label for="year2">
                            <input type="radio" name="internetyears" id="year2" value="6-10">
                            6 - 10 
                        </label>
                        <label for="year3">
                            <input type="radio" name="internetyears" id="year3" value="11-15">
                            11 - 15
                        </label>		
                        <label for="year4">
                            <input type="radio" name="internetyears" id="year4" value="16-20">
                            16 - 20
                        </label>
                        <label for="year5">
                            <input type="radio" name="internetyears" id="year5" value="> 20">
                            > 20 years
                        </label>
                    </div>
                    <p>Rate your frequency of interent usage (browsing news, using social media, etc.)</p>
                    <div class="rating">
                        <input type="radio" name="internet usage" id="internet1" value="Not at all">
                        <label for="internet1">1</label>
                        <input type="radio" name="internet usage" id="internet2" value="Sometimes">
                        <label for="internet2">2</label>
                        <input type="radio" name="internet usage" id="internet3" value="Often">
                        <label for="internet3">3</label>
                        <input type="radio" name="internet usage" id="internet4" value="Frequently">
                        <label for="internet4">4</label>
                        <input type="radio" name="internet usage" id="internet5" value="Very frequently">
                        <label for="internet5">5</label>
                    </div>
                    <div class="rating-footer">
                        <span>Not at all</span>
                        <span>Very Frequently</span>
                    </div>
                    <p>What device are you using to complete this survey?</p>
                    <div class="group">
                        <label for="devices">
                            <input type="radio" name="devices" id="phone" value="phone">
                            phone
                        </label>
                        <label for="devices">
                            <input type="radio" name="devices" id="tablet" value="tablet">
                            tablet
                        </label>
                        <label for="devices">
                            <input type="radio" name="devices" id="computer" value="computer">
                            computer
                        </label>
                    </div>				
                </div>
                
                <div class="buttons">
                    <a href="#" class="btn alt" data-set-step="1">Prev</a>
                    <a href="#" class="btn" data-set-step="3">Next</a>
                </div>
            </div>

            <!-- page 3 -->
            <div class="step-content" data-step="3">
                <div class="fields">
                    <p>The following suvery will be testing your ability to complete a few CAPTCHAS. Below is an example of a simple CAPTCHA. Are you familiar with CAPTCHAS?</p>
                    <div class="group">
                        <label for="know CAPTCHA">
                            <input type="radio" name="know" id="yes" value="yes">
                            yes
                        </label>
                        <label for="know CAPTCHA">
                            <input type="radio" name="know" id="yes" value="yes">
                            no
                        </label>
                    </div>

                    <div id="threejscanvas"> 
                    </div>
                    <li id="demo1"><a href="javascript:showDemo(0)">[demo#1]</a></li>
                    <script src="dotcha/dotcha.js"></script>
                    <script>showDemo(0)</script>
                    <h1>CAPTCHA Demo</h1>
                    <p>Drag the slider to display the current value.</p>

                    <div class="slidecontainer">
                    <h2 id="result" style="color:green;"></h2>
                    <input type="range" min="1" max="4" value="2" class="slider" id="myRange">
                    <!--
                    <p>Value: <span id="demo"></span></p>
                    -->
                    </div>

                    <script>
                    // Generate a random CAPTCHA
                    const length = 4;
                    const captcha = generateCaptcha(length);

                    var slider = document.getElementById("myRange");
                    var output = document.getElementById("result");

                    slider.oninput = function() {
                    
                    //let start = new Date();
                    let img = new Image();
                    img.src = 'https://media.geeksforgeeks.org/wp-content/uploads/20190529122828/bs21.png';
                    
                    output.appendChild(img);
                    
                    let display = "";
                    
                    for (let i=1; i < this.value; i++) {
                        display += '-';
                    }
                    display += captcha.charAt((this.value - 1)  % length);
                    output.innerHTML = display;
                    
                    }
                    // time
                    let start = Date.now();

                    // Generates a CAPTCHA of given length
                    function generateCaptcha(n) {
                        
                        // Characters to be included
                        const chrs = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                        let captcha = "";
                        for (let i = 0; i < n; i++) {
                            captcha += chrs[(Math.floor(Math.random() * chrs.length))];
                        }
                        
                        return captcha;
                    }

                    // Returns true if given two strings are same
                    function checkCaptcha() {
                        var user_captcha = document.getElementById("captchText").value;
                        if (captcha.localeCompare(user_captcha) == 0) {
                            alert("Matched!");
                            let end = new Date.now();
                            alert( `CAPTCHA took ${end - start} ms`);
                        } else {
                            //let end = new Date();
                            alert("Not matched!!!" + captcha);
                            //alert( "CAPTCHA took" + ${end - start} + "ms");
                        }
                    }

                    </script>
                    <label for="javascript">Enter above CAPTCHA: </label><br><br>
                    <input type="text" id="captchText" name="capcha">

                    <input type="submit" value="Submit" onclick="return checkCaptcha();">


                    <p>How would you rate the ease of use for this CAPTCHA?</p>
                    <div class="rating">
                        <input type="radio" name="usability" id="1" value="Very dificult">
                        <label for="1">1</label>
                        <input type="radio" name="usability" id="2" value="pretty difficult">
                        <label for="2">2</label>
                        <input type="radio" name="usability" id="3" value="So so">
                        <label for="3">3</label>
                        <input type="radio" name="usability" id="4" value="pretty simple">
                        <label for="4">4</label>
                        <input type="radio" name="usability" id="5" value="Very simple">
                        <label for="5">5</label>
                    </div>
                    <div class="rating-footer">
                        <span>Very difficult to use</span>
                        <span>Very easy to use</span>
                    </div>
                    
                    <div class="group">
                        <label for="check1">
                            <input type="checkbox" name="contact_pref[]" id="check1" value="Email">
                            Email
                        </label>
                        <label for="check2">
                            <input type="checkbox" name="contact_pref[]" id="check2" value="Phone">
                            Phone
                        </label>
                        <label for="check3">
                            <input type="checkbox" name="contact_pref[]" id="check3" value="Post">
                            Post
                        </label>		
                    </div>
                </div> 
                <div class="buttons">
                    <a href="#" class="btn alt" data-set-step="2">Prev</a>
                    <a href="#" class="btn" data-set-step="4">Next</a>
                </div>
            </div>

            <!-- page 4 -->
            <div class="step-content" data-step="4">
                <div class="fields">
                    <label for="email">Your Email</label>
                    <div class="field">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <label for="comments">Additional Comments</label>
                    <div class="field">
                        <textarea id="comments" name="comments" placeholder="Enter your comments ..."></textarea>
                    </div>
                </div>
                <div class="buttons">
                    <a href="#" class="btn alt" data-set-step="3">Prev</a>
                    <a href="#" class="btn" data-set-step="5">Next</a>
                </div>
            </div>

            <!-- page 5 -->
            <div class="step-content" data-step="5">
                <div class="result"><?=$response?></div>
                <div class="buttons">
                    <a href="#" class="btn alt" data-set-step="4">Prev</a>
                    <input type="submit" class="btn" name="submit" value="Submit">
                </div>
            </div>
		</form>
        <script>
        const setStep = step => {
            document.querySelectorAll(".step-content").forEach(element => element.style.display = "none");
            document.querySelector("[data-step='" + step + "']").style.display = "block";
            document.querySelectorAll(".steps .step").forEach((element, index) => {
                index < step-1 ? element.classList.add("complete") : element.classList.remove("complete");
                index == step-1 ? element.classList.add("current") : element.classList.remove("current");
            });
        };
        document.querySelectorAll("[data-set-step]").forEach(element => {
            element.onclick = event => {
                event.preventDefault();
                setStep(parseInt(element.dataset.setStep));
            };
        });
        <?php if (!empty($_POST)): ?>
        setStep(5);
        <?php endif; ?>
        </script>
	</body>
</html>