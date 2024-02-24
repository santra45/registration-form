<?php
require 'vendor/autoload.php';
require 'vendor/setasign/fpdf/fpdf.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

function generate_pdf($data) {
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Cell(0, 10, 'Registration Form', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 12);

    foreach ($data as $key => $value) {
        $pdf->Cell(0, 10, ucfirst(str_replace('_', ' ', $key)) . ': ' . $value, 0, 1);
    }

    ob_start();
    $pdf->Output('registration_form.pdf', 'F');
    $pdfContent = ob_get_clean();

    return $pdfContent;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = sanitize_input($_POST["first_name"]);
    $last_name = sanitize_input($_POST["last_name"]);
    $mobile = sanitize_input($_POST["mobile"]);
    $email = sanitize_input($_POST["email"]);
    $address = sanitize_input($_POST["address"]);

    $sql = "INSERT INTO users_data (first_name, last_name, mobile, email, address) VALUES ('$first_name', '$last_name', '$mobile', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        $pdf_content = generate_pdf($_POST);

        // $mail = new PHPMailer\PHPMailer\PHPMailer();
        // $mail->isSMTP();
        // $mail->Host = '';
        // $mail->SMTPAuth = true;
        // $mail->Username = '';
        // $mail->Password = '';
        // $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port = 587;
        // $mail->setFrom('your_email@example.com', 'Your Name');
        // $mail->addAddress('admin@example.com', 'Admin Name');
        // $mail->Subject = 'New Registration';
        // $mail->Body = 'A new registration has been submitted.';

        // $mail->addStringAttachment($pdf_content, 'registration_form.pdf', 'base64', 'application/pdf');

        // if ($mail->send()) {
            if(true){
            header("Location: success.html");
            exit();
        } else {
            header("Location: failure.html");
            exit();
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
