<?php 
    require __DIR__ . '/db.php';
    require __DIR__ . '/uris.php';
    require __DIR__ . '/redirect.php';
    require __DIR__ . '/dataemail.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require __DIR__ . '/PHPMailer/Exception.php';
    require __DIR__ . '/PHPMailer/PHPMailer.php';
    require __DIR__ . '/PHPMailer/SMTP.php';
    
    
    //Obtenemos datos de empleados de la empresa
    $id_company = $_POST['select_company'];

    $name_users = [];
    $email_users = [];
    $companies = [];

    $query = "SELECT * FROM users_companires_rol WHERE CompanieID = $id_company;";
    $result = connectDB()->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $user_id = $row["UserID"];
            $user_Name = $row["Name"];
            $user_Email = $row["Email"];
            $user_Companie = $row["Companie"];
            array_push($name_users, $user_Name);
            array_push($email_users, $user_Email);
            array_push($companies, $user_Companie);
        }
    } else {
        $redirect_to = sys_domain().'/new-email.php?company=novalid';
        sys_redirect( $redirect_to );
        exit;   
    }

    //Data a utilizar
    $company_name = $companies[0];
    $user1_name = $name_users[0];
    $user1_email = $email_users[0];
    (!empty($name_users[1])) ? $user2_name = $name_users[1] : '';
    (!empty($email_users[1])) ? $user2_email = $email_users[1] : '';

    //Archivos Adjuntos
    $uploads_dir = '/uploads';
    foreach ($_FILES["document"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            
            $name = basename($_FILES["document"]["name"][$key]);
            $allowedFileTypes = array("pdf" => "text/pdf", "xml" => "text/xml");
            $extension = pathinfo($name, PATHINFO_EXTENSION);

            $filename = $_FILES["document"]["name"][$key];
            $filetype = $_FILES["document"]["type"][$key];
            $filesize = $_FILES["document"]["size"][$key];
 
            if(!array_key_exists($extension, $allowedFileTypes)) {
                $redirect_to = sys_domain().'/new-email.php?file=novalid-'.$key;
                sys_redirect( $redirect_to );
                exit;  
            }

            $maxsize = 25 * 1024 * 1024;
            if($filesize > $maxsize){
                $redirect_to = sys_domain().'/new-email.php?file=filesize-'.$key;
                sys_redirect( $redirect_to );
                exit;  
            }

            if(file_exists("uploads/" . $filename)){
                $redirect_to = sys_domain().'/new-email.php?file=uploated-'.$key;
                sys_redirect( $redirect_to );
                exit; 
            }
            else {
                // move_uploaded_file($_FILES["document"]["tmp_name"][$key], "uploads/" . $filename);
                echo '<p>subido!</p>';
            }
        }
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try{
        //Server settings
        $mail->SMTPDebug  = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = emailHost();                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = emailUsername();                     //SMTP username
        $mail->Password   = emailPassword();                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(emailUsername(), 'FACTURA');
        $mail->addAddress('projects@jenner.pe', 'Jenner Acosta');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>