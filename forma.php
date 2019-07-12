<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Lesson 26</title>
    <meta charset='utf-8'>
</head>

<body>
<?php if (!isset($_POST['push'])) { ?>
    <form action="" method='POST'>
        <p>Login: <input type="text"
                         pattern="[A-Za-zА-Яа-яЁё0-9]{1,15}"
                         name="login" value=""
                         maxlength="15"
                         placeholder="Input Login"
                         autofocus required>
        </p>
        <p>Password: <input type="password"
                            pattern="[[A-Za-zА-Яа-яЁё0-9-_]{8,}"
                            name="password" value=""
                            placeholder="Input password"
                            required>
        </p>
        <p>e-mail: <input type="email"
                          pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                          name="email" value=""
                          placeholder="Input email"
                          required>
        </p>
        <label for="about">Enter your information:</label><br/>
        <p><textarea rows="10" cols="45" name="about_me"  maxlength="1000" required> </textarea></p>
        <input type="submit" name="push" value="Send">
    </form>

<?php } else {
    if (isset($_POST['login']) &&
        isset($_POST['password']) &&
        isset($_POST['email']) &&
        isset($_POST['about_me'])) {
        $initial_text = (string)$_POST['about_me'];
        echo "Исходный текст поля \"Enter your information\": " . "<br>";
        echo $initial_text . "<br>";
        $text_lower = preg_replace_callback('/[A-Za-zА-Яа-яЁё]+/su',
            function ($matches) {
                return mb_strtolower(reset($matches));
            }, $initial_text);
        echo "Исходный текст поля \"Enter your information\" после преобразования в нижний регистр :" . "<br>";
        echo $text_lower . "<br>";
    }
}
?>
</body>
</html>