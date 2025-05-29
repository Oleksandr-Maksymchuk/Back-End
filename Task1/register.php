<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { max-width: 400px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input, select, button { width: 100%; padding: 8px; margin-top: 5px; }
    </style>
</head>
<body>

<h2>Реєстрація користувача</h2>

<form method="post" action="register_user.php">
    <label for="username">Логін</label>
    <input id="username" name="username" required>

    <label for="password">Пароль</label>
    <input id="password" name="password" type="password" required>

    <label for="email">Email</label>
    <input id="email" name="email" type="email" required>

    <label for="first_name">Ім’я</label>
    <input id="first_name" name="first_name">

    <label for="last_name">Прізвище</label>
    <input id="last_name" name="last_name">

    <label for="gender">Стать</label>
    <select id="gender" name="gender">
        <option value="">Оберіть стать</option>
        <option value="male">Чоловіча</option>
        <option value="female">Жіноча</option>
        <option value="other">Інше</option>
    </select>

    <label for="birthdate">Дата народження</label>
    <input id="birthdate" name="birthdate" type="date">

    <label for="phone">Телефон</label>
    <input id="phone" name="phone">

    <label for="address">Адреса</label>
    <input id="address" name="address">

    <button type="submit">Зареєструватись</button>
</form>

<p style="text-align: center; margin-top: 20px;">
    <a href="index.php">Повернутись на головну</a>
</p>

</body>
</html>

