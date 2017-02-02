<?php
 
if(isset($_POST['email'])) {
    $email_to = "tutor@navstuitions.com";
    $email_subject = "Nav's Tuitions Website Form";
    $email_origin = "Nav's Tuitions Website Form"; 
 
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $message = $_POST['message'];

	$maths = $_POST['maths'];
	if ($maths != 'Yes') {
		$maths = 'No';
	}
	
	$science = $_POST['science'];
	if ($science != 'Yes') {
		$science = 'No';
	}	
	
	$english = $_POST['english'];
	if ($english != 'Yes') {
		$english = 'No';
	}	
	
	$legal = $_POST['legal'];
	if ($legal != 'Yes') {
		$legal = 'No';
	}
	
	$high_school = 'unchecked';
	$vce = 'unchecked';
	$adult = 'unchecked';	
	
	$selected_radio = $_POST['year'];
	if ($selected_radio == 'HighSchool') {
		$high_school = 'checked';
	}
	else if ($selected_radio == 'VCE') {
		$vce = 'checked';
	}
	else if ($selected_radio == 'Adult') {
		$adult = 'checked';
	}	


    $email_message = "<b>-- FORM DETAILS FROM NAV'S TUITIONS WEBSITE --</b><br><br>";
 
     
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "<b>Customer Details</b> <br>";
    $email_message .= "Name: ".clean_string($name)."<br>";
    $email_message .= "Contact: ".clean_string($contact)."<br>";
    $email_message .= "Email: ".clean_string($email)."<br><br>";
	
    $email_message .= "<b>Subject/s</b> <br>";
    $email_message .= "Maths: ".clean_string($maths)."<br>";
    $email_message .= "Science: ".clean_string($science)."<br>";
    $email_message .= "English: ".clean_string($english)."<br>";		
    $email_message .= "Legal Studies: ".clean_string($legal)."<br><br>";	
	
    $email_message .= "<b>Year Level</b> <br>";
    $email_message .= "High school (Years 7-10): ".clean_string($high_school)."<br>";
    $email_message .= "VCE (Years 11 & 12): ".clean_string($vce)."<br>";	
    $email_message .= "Adult courses/IELTS: ".clean_string($adult)."<br><br>";
 
    $email_message .= "<b>Comments / Message</b> <br>"; 
    $email_message .= "Message: ".clean_string($message)."<br>";
 
   
 
// create email headers
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'CC: nr.naveed@gmail.com'."\r\n";
$headers .= 'BCC: fungleow@gmail.com'."\r\n";
$headers .= 'From: '.$email_origin."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Nav's Tuitions | Affordable friendly tuition that works</title>
        <meta name="description" content="Affordable friendly tuition that works for all students - located in Noble Park">
        <meta name="keywords" content="Nav's Tuitions, Tutoring, Tuition, English, Science, Maths, IELTS, English for Adults, EAL, Further Maths, Methods, Legal Studies, Chemistry, Biology, Noble Park, affordable">
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
        <link rel="manifest" href="img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="js/jquery/themes/base/jquery.ui.all.css" />
        <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>
    <body onload='location.href="#contact"'>
        <a href="#" class="back-to-top">Back to Top</a>
        <div id="main_top_container">
            <div id="header">
                <div class="section_div">
                    <div id="mobile_menu">
                        <div id="mobile_box" class="mobile_dropdown">
                            <div class="mobile_nav_item"><a href="#anchor_tuition">TUITION</a></div>
                            <div class="mobile_nav_item"><a href="#pricing">PRICING</a></div>
                            <div class="mobile_nav_item"><a href="#faq">FAQ</a></div>
                            <div class="mobile_nav_item scrolled_nav_item_last"><a href="#contact">CONTACT</a></div>
                    	</div>
                	</div>
                    <div id="free_session_btn"><a href="#contact">Free Session</a></div>
                    <div id="demo_lectures_btn"><a href="img/demo_videos_placeholder.png" rel="prettyPhoto" id="demo_lectures">Demo Lectures</a></div>
                    <p id="header_phone_text" class="header_text"> 0430 153 489</p>
                    <span id="header_phone_icon"></span>
                    <div id="scrolled_nav">
                        <div id="scrolled_logo" onclick="location.href='index.html';"></div>
                        <div id="sn1" class="scrolled_nav_item"><a href="#anchor_tuition">TUITION</a></div>
                        <div id="sn2" class="scrolled_nav_item"><a href="#pricing">PRICING</a></div>
                        <div id="sn3" class="scrolled_nav_item"><a href="#faq">FAQ</a></div>
                        <div id="sn4" class="scrolled_nav_item scrolled_nav_item_last"><a href="#contact">CONTACT</a></div>
                    </div>
            	</div>
        	</div>
            <div class="mesh">
                <div class="section_div">
                    <div id="home_logo"></div>
                    <div class="main_menu_nav_item main_menu_nav_item_last"><a href="#contact">CONTACT</a></div>
                    <div class="main_menu_nav_item"><a href="#faq">FAQ</a></div>
                    <div class="main_menu_nav_item"><a href="#pricing">PRICING</a></div>
                    <div class="main_menu_nav_item"><a href="#anchor_tuition">TUITION</a></div>
                    <div id="main_top_title">ENGLISH/EAL<span class="dot_divider" /></span>MATHS <span class="dot_divider" /></span>FURTHER MATHS<span class="dot_divider" /></span>MATHS METHODS</div>
                    <div id="main_title_right">NAV'S TUITIONS</div>
                    <div id="main_top_title_btm">SCIENCE<span class="dot_divider" /></span>CHEMISTRY<span class="dot_divider" /></span>BIOLOGY<span class="dot_divider" /></span>LEGAL STUDIES<span class="dot_divider" /></span>ENGLISH FOR ADULTS</div>
                    <div id="main_button_container">
                        <div class="main_button"><a href="#anchor_tuition" onclick="_gaq.push(['_trackEvent', 'button', 'pressed', 'top page main btn']);">AFFORDABLE TUITION THAT WORKS</a></div>
                        <div class="section_div animate_fadeIn fadeInDown delayTwo" id="more_arrow_container">
                            <a href="#anchor_tuition" class="more_arrow_box"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span id="anchor_tuition"></span>
        <div id="process" class="section_container" style="background-color:#364150">
            <div class="section_div">
                <p class="general_text" id="welcome_text">
                <span class="welcome_title">Welcome to Nav's Tutions</span><br><br>
                Situated in Melbourne's south east suburb of Noble Park, Nav's Tuitions is an institute run by qualified teachers, engineeers and law graduates. We tutor mostly because it's our passion and enjoying the satisfaction of helping students succeed. Our three cue cards to your child's success involves:
                </p>
                <div id="pl1" class="pl_container delayOne">
                    <p><span class="pl_title">Teamwork</span><br><br>
                    Incorporating teamwork with tuition. We work like a family. Your problems are ours and we do our best to come up with a solution that fits us both.
                    </p>
                </div>
                <div id="pl2" class="pl_container delayTwo">
                    <p><span class="pl_title">Innovation</span><br><br>
                    Promoting an improved, innovative method of learning without a dint in the pocket.
                    </p>
                </div>
                <div id="pl3" class="pl_container pl_container_last delayThree">
                    <p><span class="pl_title">Qualified</span><br><br>
                    Your child is in the safe hands of our qualified tutors. All of our tutors have extensive tutoring experience and have a certified "working with children’s check".
                    </p>
                </div>
                <div class="row_spacer"></div>
            </div>
        </div>
        <span class="arrow_trigger"></span>
        <div id="expertise_section" class="section_container">
            <div class="section_div">
                <p class="general_text" id="expertise_text">
                <span class="expertise_title">Our Expertise</span><br><br>
                </p>
                <div class="pr_container" id="pr_container_01">
                    <div class="expertise_container_head" id="expertise_container_head_01">
                        <div class="expertise_container_head_text">
                            <p>
                            <span class="expertise_subject">ENGLISH</span><br><br>
                            <b>Maria</b><br>
                            <i class="expertise_education">Bachelor of Education and Post Graduate</i><br>
                            </p>
                        </div>
                    </div>
                    <div class="expertise_container_body_text">
                        <p>Maria has a teaching background comprising of over 20 years including 10 years of VCE experience, working in schools, tuition centres and conducting private/online tutoring. Maria has the experience in most educational fields necessary to lead students to a path of excellence in English. Her main goal is to customise the lesson structure in a way that students acquire individualised assistance.</p>
                    </div>
                </div>
                <div class="pr_container" id="pr_container_02">
                    <div class="expertise_container_head" id="expertise_container_head_02">
                        <div class="expertise_container_head_text">
                            <p>
                            <span class="expertise_subject">MATHS &amp; SCIENCE</span><br><br>
                            <b>Naveed</b><br>
                            <i class="expertise_education">Bachelor of Chemical Engineering / Bachelor of Pharmaceutical Science (with Honors)</i><br>
                            </p>
                        </div>
                    </div>
                    <div class="expertise_container_body_text">
                        <p>Currently working as an engineer for a leading pharmaceutical consulting firm, Naveed has dealt with the requirements of the industry for a while now. With over five years of tutoring experience and having worked for successful tutoring companies, Naveed will introduce his ideologies into our Maths and Science lessons. His purpose is to fill in gaps left by schools while ensuring students enjoy what they are learning.</p>
                    </div>
                </div>
                <div class="pr_container" id="pr_container_03">
                    <div class="expertise_container_head" id="expertise_container_head_03">
                        <div class="expertise_container_head_text">
                            <p>
                            <span class="expertise_subject">LEGAL STUDIES</span><br><br>
                            <b>Cristiana</b><br>
                            <i class="expertise_education">Bachelor of Arts / Bachelor of Law</i><br>
                            </p>
                        </div>
                    </div>
                    <div class="expertise_container_body_text">
                        <p>Cristiana has been teaching and tutoring English for about five years now. She is currently on her way to becoming a lawyer and has decided to dedicate her time to help us out with the Legal Studies lessons for VCE. With a lot of experience in writing and improving essays and reports, she will ensure that students are able to present information as per requirements of the VCE curriculum.</p>
                    </div>
                </div>
                <div class="pr_container pr_container_last" id="pr_container_04">
                    <div class="expertise_container_head" id="expertise_container_head_04">
                        <div class="expertise_container_head_text">
                            <p>
                            <span class="expertise_subject">IELTS / LEGAL STUDIES</span><br><br>
                            <b>Nabila</b><br>
                            <i class="expertise_education">Bachelor of Law / Bachelor of Banking Finance</i><br>
                            </p>
                        </div>
                    </div>
                    <div class="expertise_container_body_text">
                        <p>Nabila has been admitted to court and is now a full-fledged lawyer. For the next few years, she has decided to pursue postgraduate studies and is currently enrolled in a PhD at RMIT. This gives an exclusive opportunity for a limited number of students to join her tuition classes and learn from a practicing professional in the field. Nabila is also an expert at IELTS coaching having achieved a score of 8.5 in each band. 
                        </p>
                    </div>
                </div>
                <div class="regular_button" id="regular_button_expertise"><a href="#contact" onclick="_gaq.push(['_trackEvent', 'button', 'pressed', 'expertise free session btn']);">GET YOUR FREE SESSION</a></div>
            </div>
        </div>
        <div id="pricing" class="section_container">
            <div class="section_div">
                <p class="general_text" id="pricing_text">
                <span class="pricing_title">Affordable Pricing</span><br><br>
                We understand that tuition costs can be very expensive. Here at Nav's Tutions, we believe in the importance of education and strive to keep our pricing affordable as we were once students ourselves. All our students receive a 10% discount per additional subject and a further 10% discount per monthly payment. We also have group discounts.
                </p>
                <div id="pb1" class="pricing_box delayOne">
                    <div class="pricing_title_row"><p>ENGLISH</p></div>
                    <div class="pricing_includes_row"><p>English / EAL / English for Adults</p></div>
                    <div class="pricing_pricea_row"><p>$25 for 1 hr</p></div>
                    <div class="pricing_priceb_row"><p>$35 for 2 hrs</p></div>
                </div>
                <div id="pb2" class="pricing_box delayTwo pricing_box_1100">
                    <div class="pricing_title_row"><p>MATHS</p></div>
                    <div class="pricing_includes_row"><p>Maths / Further Maths / Maths Methods</p></div>
                    <div class="pricing_pricea_row"><p>$25 for 1 hr</p></div>
                    <div class="pricing_priceb_row"><p>$40 for 2 hrs</p></div>
                </div>
                <div id="pb3" class="pricing_box delayThree bottom2">
                    <div class="pricing_title_row"><p>SCIENCE</p></div>
                    <div class="pricing_includes_row"><p>Biology / Chemistry</p></div>
                    <div class="pricing_pricea_row"><p>$25 for 1 hr</p></div>
                    <div class="pricing_priceb_row blank_row"><p></p></div>
                </div>
                <div id="pb4" class="pricing_box delayFour bottom2 pricing_box_last">
                    <div class="pricing_title_row"><p>LEGAL STUDIES</p></div>
                    <div class="pricing_includes_row"><p>Legal Studies</p></div>
                    <div class="pricing_pricea_row"><p>$25 for 1 hr</p></div>
                    <div class="pricing_priceb_row blank_row"><p></p></div>
                </div>
                <div class="regular_button"><a href="#contact" onclick="_gaq.push(['_trackEvent', 'button', 'pressed', 'pricing free session btn']);">TRY A FREE SESSION</a></div>
            </div>
		</div>
        <div id="testimonials_main" class="section_container">
            <div class="mesh">
                <div class="section_div">
                    <p class="main_testimonial_text">
                    I am very grateful for the tutors at Nav's Tuitions who helped me to understand key concepts as well as boosting my confidence in VCE Maths Methods.<br><br>
                    <i>Padmin, VCE Student</i>
                    </p>
                </div>
            </div>
		</div>
        <div id="faq" class="section_container">
            <div id="faq_text_box">
                <p class="general_text" id="faq_text">
                    <span class="faq_title">Frequently Asked Questions</span>
                    <br><br><br>
                    <span class="question">How can you provide the lessons at such a low price?</span><br>
                    At Nav’s Tuitions, our primary focus isn’t to make money. Our goal is to help students without causing any significant financial distress. Besides, most of us do this out of passion, after our regular jobs.
                    <br><br><br>
                    <span class="question">Why haven’t I heard about Nav's Tuitions before?</span><br>
                    We are a new centre founded two years ago. Before that, we were either too busy gathering experience working at other well-known tutoring firms or completing our university degrees.
                    <br><br><br>
                    <span class="question">Am I able to receive individual attention in a group session?</span><br>
                    Absolutely! Our lessons are designed to provide a mixture of teaching a new concept and going through problems faced in school.
                    <br><br><br>
                    <span class="question">Is the first lesson actually free?</span><br>
                    100%! We want you to get to know us and experience the way we tutor before you commit to anything.
                    <br><br><br>
                </p>
                <div class="regular_button" id="faq_btn"><a href="#contact" onclick="_gaq.push(['_trackEvent', 'button', 'pressed', 'faq free session btn']);">TRY A FREE SESSION</a></div>
            </div>
        </div>
        <span id="anchor_contact"></span>
        <div id="contact" class="section_container">
            <div class="section_div">
                <p class="general_text" id="contact_text">
                    <span class="contact_title">Thank you for getting in touch!</span><br><br>
                    We appreciate you contacting us and we will respond as soon as possible.<br><br>
                </p>
                <div id="form_sent"></div>
                <div id="company_contact">
                    <p id="company_contact_details" class="general_text contact_details_text">
                        <img class="contact_icon" src="img/contact.png" />0430 153 489
                        <img class="contact_icon" src="img/location.png" />42 Jellicoe St, Noble Park VIC 3174<br>
                        <img class="contact_icon" src="img/email.png" /><a rel="nofollow" href="mailto:tutor@navstuitions.com?Subject=Navs%20Website" target="_top">tutor@navstuitions.com</a> or <a rel="nofollow" href="mailto:nr.naveed@gmail.com?Subject=Navs%20Website" target="_top">nr.naveed@gmail.com</a>
                        <img class="contact_icon" src="img/fb.png" /><a rel="nofollow" href="https://www.facebook.com/navstuition" target="_blank">facebook.com/navstuition</a><br>
                    </p>
                    <p id="company_contact_details_mob" class="general_text contact_details_text">
                        <img class="contact_icon" src="img/contact.png" />0430 153 489<br>
                        <img class="contact_icon" src="img/location.png" />42 Jellicoe St, Noble Park VIC 3174<br>
                        <img class="contact_icon" src="img/email.png" /><a rel="nofollow" href="mailto:tutor@navstuitions.com?Subject=Navs%20Website" target="_top">tutor@navstuitions.com</a> or <a rel="nofollow" href="mailto:nr.naveed@gmail.com?Subject=Navs%20Website" target="_top">nr.naveed@gmail.com</a><br>
                        <img class="contact_icon" src="img/fb.png" /><a rel="nofollow" href="https://www.facebook.com/navstuition" target="_blank">facebook.com/navstuition</a><br>
                    </p>
				</div>
            </div>
            <div id="main_footer">
                <div class="section_div">
                    <p>Copyright 2016 Nav's Tuitions. &nbsp;&nbsp; <a href="https://www.facebook.com/navstuition" target="_blank" class="footer_links">Facebook</a></p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/config.js"></script>
        <script type="text/javascript" src="js/require.js" async data-main="index"></script>
    </body>
</html>
<?php
}
?>