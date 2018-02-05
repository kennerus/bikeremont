<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'])) {$name = $_POST['username'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['textarea'])) {$text = $_POST['textarea'];}
    if (isset($_POST['user-feedback'])) {$feedback = $_POST['user-feedback'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}
 
    $to = "bikedn@yandex.ru"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "bikeremont@yandex.ru"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "От кого: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Кому ответить: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    if ($feedback && $email && $text) {
        $message = "$formData
            Имя: $feedback \r\n

            Почта: $email \r\n

            Текст отзыва: $text";
    }
    else {
        $message = "$formData
         Имя: $name \r\n

        Телефон: $phone";
    }
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center>
 
В ближайшее время вам перезвонят. 
</center>';
    }
    else
    {
    echo '<center>
 
<b>Ошибка. Сообщение не отправлено!</b>
 
</center>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}?>