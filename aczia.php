<?php
include_once 'module/modMain.php';


$htmlHeader=htmlHeader($iniArray);
$htmlMainMenu=htmlMenuMain($iniArray ,2);
$htmlBoardAciza=htmlBoardAciza();
$htmlFooter=htmlFooter($iniArray);
$htmlScript=htmlScript();



htmlStart('Колизей- акции');
echo"

    <div class='winStandart'>
        $htmlHeader
        <nav class='menu menu5'>
            <ul>
                $htmlMainMenu
            </ul>
        </nav>

        $htmlBoardAciza

        $htmlFooter
    </div>
    $htmlScript
";
fnCheckAdmin();

htmlEnd();
