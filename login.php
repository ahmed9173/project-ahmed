<?php
// تأكد من أن لديك قاعدة بيانات ومستخدمين فيها
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة مرور قاعدة البيانات
$dbname = "login"; // اسم قاعدة البيانات

$conn = new mysqli($servername, $username, $password, $dbname);

// تحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // استعلام للتحقق من المستخدم
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "تسجيل الدخول ناجح!";
        // يمكنك توجيه المستخدم إلى صفحة أخرى
    } else {
        echo "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }
}

$conn->close();
?>