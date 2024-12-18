<?php
class Sanitizer {
    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }
    public static function validate_email($email) {
        $email = self::test_input($email); // Sanitize first
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function validate_date($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public static function validate_phone($phone) {
        $phone = self::test_input($phone);
        return preg_match('/^\+?[0-9]{7,15}$/', $phone) ? $phone : null;
    }
    
    
}
?>