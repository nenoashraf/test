<!DOCTYPE html>
<html lang="Arabia">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Swap Jo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css">
  <link rel="stylesheet" type="text/css" href="anas.css">
</head>
<body>
  <div class="container">
    <img class="image" src="jow.jpg" alt="">
    
    <div class="question">
      <h3>اجب علي سؤال حلقة اليوم</h3>
    </div>
    
    <div class="separator"></div>
    <div class="form-container">
      <form action="send_email.php" method="post" enctype="multipart/form-data">
        <label for="tel">رقم الهاتف</label>
        <input type="tel" id="tel" name="tel" value="+962" required><br><br>
        
        <label for="message">اجب علي السؤال</label>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        
        <label for="video">Attach Video:</label>
        <input type="file" id="video" name="video"><br><br>
        <input type="submit" value="ارسل الان">

      </form>
    </div>
  </div>
 
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $tel = $_POST["tel"];
      $message = $_POST["message"];
  
      $video = $_FILES["video"];
      $videoName = $video["name"];
      $videoTmpName = $video["tmp_name"];
  
      // Process the video (you can save it, validate its format, etc.)
  
      $to = "ahmedahmedrm322@gmail.com    "; // Change this to the recipient's email address
      $subject = "New Contact Form Submission";
      $headers = "From: $tel"; // Using the phone number as the "From" address for demonstration purposes
  
      $emailMessage = "Phone: $tel\n";
      $emailMessage .= "Message: $message\n";
  
      // Send the email
      if (mail($to, $subject, $emailMessage, $headers)) {
          // Redirect after sending the email
          header("Location: thank_you.html");
          exit();
      } else {
          echo "Error sending email. Please try again later.";
      }
  }
  ?>
  
</body>
</html>
