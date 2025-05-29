<?php
session_start();

// Обробка зміни мови
if (isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + 180 * 24 * 3600, '/');
    $_COOKIE['lang'] = $_GET['lang'];
}

// Визначення поточної мови
$lang = $_COOKIE['lang'] ?? 'uk';

// Масив текстів для мов
$texts = [
    'uk' => [
        'title' => 'Реєстрація',
        'login' => 'Логін',
        'password' => 'Пароль',
        'password_confirm' => 'Пароль (ще раз)',
        'gender' => 'Стать',
        'male' => 'Чоловік',
        'female' => 'Жінка',
        'city' => 'Місто',
        'favorite_games' => 'Улюблені гри',
        'football' => 'Футбол',
        'basketball' => 'Баскетбол',
        'volleyball' => 'Волейбол',
        'chess' => 'Шахи',
        'checkers' => 'Шашки',
        'photo' => 'Фотографія',
        'register' => 'Зареєструватися',
        'selected_language' => 'Вибрана мова: Українська'
    ],
    'eng' => [
        'title' => 'Registration',
        'login' => 'Login',
        'password' => 'Password',
        'password_confirm' => 'Password (again)',
        'gender' => 'Gender',
        'male' => 'Male',
        'female' => 'Female',
        'city' => 'City',
        'favorite_games' => 'Favorite games',
        'football' => 'Football',
        'basketball' => 'Basketball',
        'volleyball' => 'Volleyball',
        'chess' => 'Chess',
        'checkers' => 'Checkers',
        'photo' => 'Photo',
        'register' => 'Register',
        'selected_language' => 'Selected language: English'
    ]
];

$currentTexts = $texts[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $currentTexts['title']; ?></title>
</head>
<body>
    <form action="submit.php" method="post" enctype="multipart/form-data">
        <?php echo $currentTexts['login']; ?>: <input type="text" name="login" value="<?php echo $_SESSION['login'] ?? ''; ?>"><br>
        <?php echo $currentTexts['password']; ?>: <input type="password" name="password"><br>
        <?php echo $currentTexts['password_confirm']; ?>: <input type="password" name="password_confirm"><br>
        <?php echo $currentTexts['gender']; ?>:
        <input type="radio" name="gender" value="чоловік" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'чоловік') ? 'checked' : ''; ?>> <?php echo $currentTexts['male']; ?>
        <input type="radio" name="gender" value="жінка" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'жінка') ? 'checked' : ''; ?>> <?php echo $currentTexts['female']; ?><br>
        <?php echo $currentTexts['city']; ?>: <input type="text" name="city" value="<?php echo $_SESSION['city'] ?? ''; ?>"><br>
        <?php echo $currentTexts['favorite_games']; ?>:<br>
        <input type="checkbox" name="games[]" value="футбол" <?php echo (isset($_SESSION['games']) && in_array('футбол', $_SESSION['games'])) ? 'checked' : ''; ?>> <?php echo $currentTexts['football']; ?><br>
        <input type="checkbox" name="games[]" value="баскетбол" <?php echo (isset($_SESSION['games']) && in_array('баскетбол', $_SESSION['games'])) ? 'checked' : ''; ?>> <?php echo $currentTexts['basketball']; ?><br>
        <input type="checkbox" name="games[]" value="волейбол" <?php echo (isset($_SESSION['games']) && in_array('волейбол', $_SESSION['games'])) ? 'checked' : ''; ?>> <?php echo $currentTexts['volleyball']; ?><br>
        <input type="checkbox" name="games[]" value="шахи" <?php echo (isset($_SESSION['games']) && in_array('шахи', $_SESSION['games'])) ? 'checked' : ''; ?>> <?php echo $currentTexts['chess']; ?><br>
        <input type="checkbox" name="games[]" value="шашки" <?php echo (isset($_SESSION['games']) && in_array('шашки', $_SESSION['games'])) ? 'checked' : ''; ?>> <?php echo $currentTexts['checkers']; ?><br>
        <?php echo $currentTexts['photo']; ?>: <input type="file" name="photo"><br>
        <input type="submit" value="<?php echo $currentTexts['register']; ?>">
    </form>
    <div>
        <a href="index.php?lang=uk"><img src="images\ua-flag.png" alt="Українська" style="width: 30px; height: 30px;"></a>
        <a href="index.php?lang=eng"><img src="images\uk-flag.png" alt="Англійська" style="width: 30px; height: 30px;"></a>
    </div>
    <?php echo $currentTexts['selected_language']; ?>
</body>
</html>