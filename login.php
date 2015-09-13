<?php
include_once 'module/modMain.php';


$htmlHeader=htmlHeader($iniArray);
$htmlMenuMain=htmlMenuMain($iniArray, 0);
$htmlFooter=htmlFooter($iniArray);
$htmlScript=htmlScript();


$sLogin=$_SESSION['sLogin'];

//при попытки  аутификации
if ($_POST['btnSubmit']=='Войти'){
    $sLogin=$_POST['edLogin'];
    $sPas=$_POST['edPas'];

    if (fnLoginProverka($sLogin,$sPas)) {
        fnLoginStart($sLogin);
        header ('Location: index.php');
    }
    else{

    }
}

//если нажата кнопка выйти-чистим сессию
if ($_POST['btnSubmit']=='Выйти'){
    foreach ($_SESSION as $i => $value) {
        unset($_SESSION[$i]);
    }
    header('Location:login.php');
    exit();
}

//выбрана вкладка регистрации
if($_GET['menu']=='registration'){
    htmlStart('Колизей- вход и регистрация');
    echo "
        <div class='winStandart'>
            $htmlHeader
            <div class='winSmall'>
                    <nav class='menu menu3'>
                        <ul>
                            <li><a href='login.php?menu=login' >Вход</a></li>
                            <li><a href='login.php?menu=registration' class='active'>Регистрация</a></li>
                            <li><a href='index.php'>Главная</a></li>
                        </ul>
                    </nav>
                     <form class='fmLogin border' name='fmReg' method='post'>
                        <h2>Регистрация</h2>
                        <input type='text' class='edLogin' autofocus placeholder='укажете ваше имя' name='edName'>
                        <input type='text' class='edLogin' autofocus placeholder='придумайте логин' name='edLogin'>
                        <input type='password' class='edLogin' placeholder='придумайте пароль' name='edPas'>
                        <input type='password' class='edLogin' placeholder='повторите пароль' name='edPas2'>
                        <input type='submit' class='btnLogin' value='Регистрация' name='btnSubmit'>
                    </form>
            </div>
        </div>
    ";
    htmlEnd();
}
//вход в систему уже был выполнен
elseif($sLogin){
    htmlStart('Колизей- вход и регистрация');
    echo "
        <div class='winStandart'>
            $htmlHeader
            <div class='winSmall'>
                    <nav class='menu menu2'>
                        <ul>
                            <li><a href='login.php?menu=login' class='active'>Профиль</a></li>
                            <li><a href='index.php'>Главная</a></li>
                        </ul>
                    </nav>
                    <form class='fmLogin' name='fmLogin' method='post'>
                        <h2>Здравствуйте, $sLogin</h2>
                        <input type='submit' class='btnLogin' value='Выйти' name='btnSubmit'>
                    </form>
            </div>
        </div>
    ";
    htmlEnd();
}
//вход в систему ещё не был выполнен
else{
    htmlStart('Колизей- вход и регистрация');
    echo "
        <div class='winStandart'>
            $htmlHeader
            <div class='winSmall'>
                    <nav class='menu menu3'>
                        <ul>
                            <li><a href='login.php?menu=login' class='active'>Вход</a></li>
                            <li><a href='login.php?menu=registration'>Регистрация</a></li>
                            <li><a href='index.php'>Главная</a></li>
                        </ul>
                    </nav>
                    <form class='fmLogin' name='fmLogin' method='post'>
                        <h2>Вход в систему</h2>
                        <input type='text' id='editLogin' placeholder='логин или e-mail' name='edLogin'>
                        <div class='grImgEdit'>
                            <input type='password'  id='editPas'  placeholder='пароль' name='edPas'>
                            <a id='btnEye'></a>
                        </div>
                        <input type='submit'  id='editPas' class='btnLogin' value='Войти' name='btnSubmit'>
                    </form>
            </div>
        </div>
        $htmlScript
    ";
    htmlEnd();
}

