<?php

///////////////////////////////////////////////////
//Формирование head (иконка сайта + таблицы стилей)
//$iniArray - массив значений из ini файла настроек
///////////////////////////////////////////////////
function htmlStart($sTitle){
    echo "
        <!DOCTYPE html>
        <html lang='ru'>
        <head>
            <title>$sTitle</title>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='shortcut icon' type='image/x-icon' href='css/img/favicon.ico'>
            <link rel='stylesheet' href='css/styleMain.css' type='text/css' media='all'>
        </head>
        <body>
    ";
}

////////////////////////////////////////////////////
//Формирование шапки
//$iniArray - массив значений из ini файла настроек
////////////////////////////////////////////////////
function htmlHeader($iniArray){
    $sCompanyName=$iniArray['company']['sCompanyName'];
    $sCompanyDeviz=$iniArray['company']['sCompanyDeviz'];
    $aCompanyPredlozenie=$iniArray['company']['aCompanyPredlozenie'];
    $aCompanyPhone=$iniArray['company']['aCompanyPhone'];
    return "
        <header>
            <div class='grHeadLeft'>
                <h1>$sCompanyName</h1>
                <h2>$sCompanyDeviz</h2>
            </div>
            <div class='grHeadRight'>
                <p>$aCompanyPredlozenie[0]</p>
                <p class='fnPhone'>$aCompanyPhone[0]</p>
                <p>$aCompanyPredlozenie[1]</p>
            </div>
        </header>
    ";
}

//////////////////////////////////////////////////////
//Формирование подвала
//  $iniArray - массив значений из ini файла настроек
////////////////////////////////////////////////////
function htmlFooter($iniArray){
    $arCompany=$iniArray['company'];
    $sWorkDay=$arCompany['sWorkDay'];
    $tWorkTime=$arCompany['tWorkTime'];
    $sCompanyCity=$arCompany['sCompanyCity'];
    $sCompanyStret=$arCompany['sCompanyStret'];
    $aCompanyPhone=$arCompany['aCompanyPhone'];
    $sCompanyEmail=$arCompany['sCompanyEmail'];

    return "
        <footer>
            <!--время работы-->
            <section>
                <h3>Время работы</h3>
                <p class='ftFoterBig'>$sWorkDay</p>
                <p class='ftFoterBig'>$tWorkTime</p>
            </section>
            <!--адрес-->
            <section>
                <h3>Адрес</h3>
                <p>$sCompanyCity</p>
                <p>$sCompanyStret</p>
                <p class='space'>$sCompanyEmail</p>
                <p class='ftFoterBig space'>Тел: $aCompanyPhone[0]</p>
                <!--Социальные кнопки-->
                <a href='mailto:$sCompanyEmail?subject=Письмо от клиента' class='btnSozial' id='btnEmail'></a>
                <a href='http://ok.ru/group/51810272477342' class='btnSozial' id='btnOdnoklasniki'></a>
                <a href='https://vk.com/colizzeum' class='btnSozial' id='btnVkontakte'></a>
            </section>
            <!--карта-->
            <section>
                <h3>Как нас найти</h3>
            </section>
        </footer>
    ";
}

//Подключает внешние JS скрипты
function htmlScript(){
    return "
    <script src='module/jquery.min.js' type='text/javascript'></script>
    <script src='module/visual.js' type='text/javascript'></script>
    ";
}

//Закрывает body и HTML
function htmlEnd(){
    echo"
    </body>
    </html>
    ";
}

//////////////////////////////////////////////////
//Формирование главного меню
//  $iniArray - массив значений из ini файла настроек
//  $iActiveMenu - номер элемента меню который активен
///////////////////////////////////
function htmlMenuMain($iniArray, $iActiveMenu){
    $sLogin=$_SESSION['sLogin'];
    $aMenuMain=$iniArray['menuMain'];
    $iColMenu= count($aMenuMain)+1;
    $aActive[$iActiveMenu]="class='active'";
    $i = 0;
    $sResult = "
        <nav class='menu menu$iColMenu'>
        <ul>
    ";
    foreach($aMenuMain as $sName => $sUrl){
        $sResult .= "
            <li><a href='$sUrl' $aActive[$i]>$sName</a></li>
        ";
        $i++;
    }
    if ($sLogin){
        $sResult .= "<li><a href='login.php'>$sLogin</a></li>";
    }
    else {
        $sResult .= "<li><a href='login.php'>Вход и регистрация</a></li>";
    }
    $sResult.="
        </ul>
        </nav>
    ";
    return $sResult;
}

//Доска новостей и предложений на главной странице
function htmlBoardMain(){
    $query=mysql_query('SELECT * FROM tbDesk WHERE bShow=TRUE ORDER BY iPoriadok ');
    $sResult="<div class='content grBoardMain'>";
    while($data=mysql_fetch_array($query)){
        $sName=$data['sName'];
        $sUrl=$data['sUrl'];
        $imgBackground=$data['imgBackground'];
        $sHref=$data['sHref'];

        $sResult.="
            <section>
                <img src='data/img/$imgBackground'>
                <div class='grTextPosition'>
                    <h3>
                        $sName
                    </h3>
                    <a href='$sUrl'>
                        $sHref
                    </a>
                </div>
            </section>
        ";
    }
    $sResult.="</div>";
    return $sResult;
}

//Формирование доски акций
function htmlBoardAciza(){
    $query=mysql_query("SELECT *, DATE_FORMAT(dPostPublic,'%d.%m.%Y') as dPostPublic FROM tbAсzia  WHERE bDeistvitelna=TRUE ORDER BY iPrioritet; ");
    $sResult="<div class='content grBoardAczia'>";
    while($data=mysql_fetch_array($query)){
        $sZagolovok=$data['sZagolovok'];
        $sYakar=$data['sYakar'];
        $tOpisanie=$data['tOpisanie'];
        $tUslovie=$data['tUslovie'];
        $tPriz=$data['tPriz'];
        $dPostPublic=$data['dPostPublic'];
        $bDeistvitelna=$data['bDeistvitelna'];
        $sImg=$data['sImg'];

        $sResult.="
            <section name='$sYakar'>
                <div class='grLeft'>
                    <h3>$sZagolovok</h3>
                    <p>$tOpisanie</p>
                    <h4>Условия акции</h4>
                    <p>$tUslovie</p>
                    <h4>Вознагрождение</h4>
                    <p>$tPriz</p>
                </div>
                <div class='grRight'>
                    <img src='data/img/akzia/$sImg'>
                    <p class='ftDataPublic'>акция опуликована: $dPostPublic</p>
                </div>

            </section>
        ";
    }
    $sResult.="</div>";
    return $sResult;
}
