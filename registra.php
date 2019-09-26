<?php

//connection
$conn = mysql_connect("localhost", "root") or $conn = mysql_connect("localhost", "root", "");
				  mysql_select_db("reg") or die (mysql_error());
                 
				  
              $username =$_POST['username'];
			  $nrow=strlen($username);
			  $email =$_POST['email'];
			  $password = md5($_POST['password']);
			  $pass2 =md5($_POST['pass2']);
			  if($username==""|| $email==""|| $password==""|| $pass2==""){
				 echo"<script type='text/javascript'>alert('Campi di registrazioni vuoti ');
window.location = 'index.html';</script>";
			  }
			  elseif($password!=$pass2){
				echo"<script type='text/javascript'>alert('Password non corrispondenti  ');
window.location = 'index.html';</script>";
			  }
			  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
				  echo"<script type='text/javascript'>alert('Email non valida');
window.location = 'index.html';</script>";
			  }
	  elseif($nrow>=10){  echo"<script type='text/javascript'>alert('Username troppo lungo, max 10 caratteri');
window.location = 'index.html';</script>"; }
			  else{
				  
				  $query3="SELECT username FROM persona WHERE username='$username' ";
			  $result=mysql_query($query3);
			  
if(mysql_num_rows($result)==0)
{


				   
				  $query = mysql_query("INSERT into persona( username, email, password )VALUES('$username','$email','$password') ");
				 
			
			   echo"<script type='text/javascript'>alert('Registrazione andata a buon fine, fai il primo accesso');
window.location = 'index.html';</script>";


    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // MailChimp API credentials
        $apiKey = 'YOUR_APIKEY'; //insert your Apikey
        $listID = 'YOUR_LISTID'; //insert your ListID
        
        // MailChimp API URL
        $memberID = md5(strtolower($email));
        $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
        
        // member information
        $json = json_encode([
            'email_address' => $email,
            'status'        => 'subscribed',
            'merge_fields'  => [
                'FNAME'     =>  $username,
                
            ]
        ]);
		$data = array(
    'apikey'        => $apikey,
    'email_address' => $email,
    'status'        => 'pending'
);
        
        // send a HTTP POST request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // store the status message based on response code
        if ($httpCode == 200) {
            $_SESSION['msg'] = '<p style="color: #34A853">You have successfully subscribed to CodexWorld.</p>';
        } else {
            switch ($httpCode) {
                case 214:
                    $msg = 'You are already subscribed.';
                    break;
                default:
                    $msg = 'Some problem occurred, please try again.';
                    break;
            }
            $_SESSION['msg'] = '<p style="color: #EA4335">'.$msg.'</p>';
        }
    }else{
        $_SESSION['msg'] = '<p style="color: #EA4335">Please enter valid email address.</p>';
    }



} 
else
{
 echo"<script type='text/javascript'>alert('Username esistente, prova con un altro');
window.location = 'index.html';</script>";
}
			  }
				
			 


?>
