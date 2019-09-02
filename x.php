<?php
require_once('./PHPMailer_5.2.0/class.phpmailer.php');
$val=2420;
if (($file = fopen("data.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($file, 1000, ",")) !== FALSE){
		  		$mail = new PHPMailer(); // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true; // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 465; // or 587
				$mail->IsHTML(true);
				$mail->Username = "vatsal.eliot@gmail.com";
				$mail->Password = "mkaqaumuchffjcmh";
				$mail->SetFrom("vatsal.singhal.vs@gmail.com", "TEDxIITPatna");
				$mail->ClearReplyTos();
    			$mail->addReplyTo("team@tedxiitpatna.com", 'TEDxIITPatna');
				$mail->Subject = "Invitation to TEDxIITPatna";
				$mail->Body = '<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;box-shadow: 3px 3px 10px #D2D0D0">
					<tr>
						<td style="padding: 30px 0 0 0;">
							<img src="https://www.tedxiitpatna.com/images/mail/header.PNG" width="100%">
						</td>
					</tr>
					<tr>
						<td style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="font-size: 25px;font-weight: 600;color: #1f1f1f;">
										Hello '.$data[0].'<br><br>
									</td>
								</tr>
								<tr>
									<td style="padding: 5px 0 5px 0;font-size: 14px; color: #1f1f1f;" >
										Greetings from TEDxIITPatna.<br>
										We are happy to inform you that your entry to TEDxIITPatna has been confirmed. Your unique registration ID is <strong>TEDx'.$val.'</strong>. Please use this ID for any future reference. The tentative schedule for the event is as follows.
										<br>
										<br>
										<table border="1">
										<tr><th> 9:30 A.M.</th><th>Reporting Time</th></tr>
										<tr><td> 10:00 A.M.</td><td>Opening Ceremony</td></tr>
										<tr><td> 10:30 A.M.</td><td>Tea Snacks</td></tr>
										<tr><td> 11:00 A.M.</td><td>Talk by Speaker 1</td></tr>
										<tr><td> 11:35 A.M.</td><td>Talk by Speaker 2</td></tr>
										<tr><td> 12:10 P.M.</td><td>Recorded TED Talk 1</td></tr>
										<tr><td> 12:35 P.M.</td><td>Lunch</td></tr>
										<tr><td> 1:35 P.M.</td><td>Talk by Speaker 3</td></tr>
										<tr><td> 2:10 P.M.</td><td>Recorded TED Talk 2</td></tr>
										<tr><td> 2:35 P.M.</td><td>Recorded TED Talk 3</td></tr>
										<tr><td> 3:00 P.M.</td><td>Tea</td></tr>
										<tr><td> 3:15 P.M.</td><td>Talk by Speaker 5</td></tr>
										<tr><td> 3:50 P.M.</td><td>Closing Ceremony</td></tr>
										<tr><td> 4:15 P.M.</td><td>End of Program</td></tr></table><br>

										<strong>Event Date: Sunday, 1st September 2019<br> 
										Event Venue: Senate Hall, IIT Patna<br></strong>
										Looking forward to hosting you at the weekend!<br><br>
										Regards<br>
										Team TEDxIITPatna<br>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<img src="https://www.tedxiitpatna.com/images/mail/footer.PNG" width="100%">
						</td>
					</tr>
					<tr>
						<td bgcolor="#1f1f1f">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
							 <tr align="center">
							  <td style="padding: 20px 10px 10px 10px;">
							   <table border="0" cellpadding="0" cellspacing="0">
							   	<tr align="center">
							   		<td style="padding: 10px;">
							   			<a href="https://www.facebook.com/tedxiitpatna/" target="_blank">
							   			<!-- <i class="fab fa-facebook-f" style="color: #fff;font-size: 20px;"></i> -->
							   			<img src="https://www.tedxiitpatna.com/images/mail/fb.png" width="30">
							   			</a>
							   		</td>
							   		<td style="padding: 10px;">
							   			<a href="https://www.linkedin.com/company/tedxiitpatna/" target="_blank">
							   			<img src="https://www.tedxiitpatna.com/images/mail/linkedin.png" width="30">
							   			</a>
							   		</td>
							   		<td style="padding: 10px;">
							   			<a href="https://twitter.com/TEDxIITPatna" target="_blank">
							   			<img src="https://www.tedxiitpatna.com/images/mail/twitter.png" width="30">
							   			</a>
							   		</td>
							   	</tr>
							   </table>
							  </td>
							 </tr>
							 <tr>
							  <td align="center">
							   <a href="mailto:team@tedxiitpatna.com" style="color: #fff; text-decoration: none; font-size: 20px;">
							   	team@tedxiitpatna.com
							   </a>
							  </td>
							 </tr>
							 <tr>
							  <td style="color: #fff; padding: 20px;" align="center">
							   This Independent TEDx Event Is Operated Under License From TED | Copyright © 2019 All Rights Reserved
							  </td>
							 </tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		<tr>
	</table>';
				$mail->AddAddress($data[1]);
				if(!$mail->Send()){
				 echo "error".$data[1]." - ".$val."<br>";
				}
				else
				{
					echo "success ".$data[1]." - ".$val."<br>";
					$val=$val+1;
				}
	} 		
		  fclose($file);
	}
?>