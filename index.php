<?php
include_once 'module/modMain.php';
фвцф

$htmlHeader=htmlHeader($iniArray);
$htmlMenuMain=htmlMenuMain($iniArray, 0);
$htmlBoardMain=htmlBoardMain();
$htmlFooter=htmlFooter($iniArray);
$htmlScript=htmlScript();


htmlStart('Колизей- спортивный пейнтбольный клуб в Чите');
echo"
    <div class='winStandart'>
        <!--блок контактов и названия сайта -->
        $htmlHeader
        $htmlMenuMain
        <div class='slaider'>
        </div>
        $htmlBoardMain
        $htmlFooter
    </div>
        $htmlScript
";
fnCheckAdmin();
htmlEnd();

