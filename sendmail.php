<?php
ob_start(); // ensure no output sent before header

// // (1) Verify ReCaptcha
// $secret = "6LexO3grAAAAAFR--Z0JFh8rRzz7FGLJKIjEA4Dw";
// $response = $_POST["g-recaptcha-response"] ?? "";
// $verify = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response"));

// if (!$verify || !$verify->success) {
//   // Fail: Redirect back to form with an error (optional)
//   header("Location: contact.html?error=captcha", true, 303);
//   exit();
// }

// (2) Send email
$mailTo = "royw.rwave@gmail.com";
$mailSubject = "Contact Form";
$mailBody = "";

foreach ($_POST as $k => $v) {
  // if ($k != "g-recaptcha-response") {
    $mailBody .= "$k: $v\r\n";
  }


if (@mail($mailTo, $mailSubject, $mailBody)) {
  // ✅ Redirect to Thank You page
  header("Location: thank-you.html", true, 303);
  exit();
} else {
  // ❌ Mail failed
  header("Location: contact.html?error=mail", true, 303);
  exit();
}
?>
