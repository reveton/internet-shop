<?php
$register .= '<html>
    <body>
        <form action ="includes/verification.php" method = "post">
            Логин: <input type ="text" name="login" />
                <br />
            Имя: <input type ="text" name="name" />
            <br />
            Фамилия: <input type ="text" name="surname" />
            <br />
            Пароль: <input type ="Password" name="passwd">
            <br />
            Подтверждение пароля: <input type ="password" name="pass2" />
            <br />
            Email: <input type ="text" name="email" />
            <br />
            <input type="submit" name="submit" value="OK">
        </form>
    </body>
</html>';