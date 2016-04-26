<?php
	require_once('../libs/phpmailer/PHPMailerAutoload.php');

	$webmasterMail = 'jaylee@hatiolab.com'; // 받을 사람 메일 주소로 수정
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = 'Online 문의 메일';
	$message = $_POST['message'];
	$template = "<table>
        	            <tr>
                	        <td>보낸사람: </td>
                        	<td>".$name."</td>
                            </tr>
                    	    <tr>
                        	<td>E-Mail: </td>
                        	<td>".$email."</td>
                    	    </tr>
                    	    <tr>
                        	<td>문의내용: </td>
                        	<td width=\"900\">".$message."</td>
                    	    </tr>
                     </table>";

	$mail = new PHPMailer(true); // create a new object

	$mail->IsSMTP(); // enable SMTP
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->isHTML(true);
	$mail->CharSet = 'utf-8';
	$mail->Username = 'jaylee@hatiolab.com'; // 유효한 메일인지 확인을 위해 gmail 계정을 입력
	$mail->Password = '1q2w3e4r~!';			 // 유효한 메일인지 확인을 위해 gmail 비밀번호를 입력 
	$mail->SetFrom($email, $name);
	$mail->AddAddress($webmasterMail);
	$mail->Subject = $subject;
	$mail->Body = $template;

	if($mail->Send()) {
		echo 'Successfully sent';
	} else {
		echo 'Failed to send';
	}
?>
