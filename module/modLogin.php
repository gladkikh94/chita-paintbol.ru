<?php
include_once 'modMain.php';


//Заносит в сессию данные пользователя. Пользователь индефецируеться по телефону или логину или e-mail
function fnLoginProverka($sLogin, $sPas){
    $sol1="##GReN38tEA**";
    $sol2="@@ReD27tEA&&";
    $query=mysql_query("SELECT sPas FROM tbUser WHERE sPhone='$sLogin' or sEmail='$sLogin' or sLogin='$sLogin' LIMIT 1;");
    $data=mysql_fetch_array($query);
    if (md5($sol1.md5($sPas).$sol2)===$data['sPas']){
        return true;
    }
    else{
        return false;
    }
}

//Заносит в сессию данные пользователя. Пользователь индефецируеться по телефону или логину или e-mail
function fnLoginStart($sLogin){
    $query=mysql_query("SELECT * FROM tbUser WHERE sPhone='$sLogin' or sEmail='$sLogin' or sLogin='$sLogin' LIMIT 1;");
    $data=mysql_fetch_array($query);
    session_start();
    $_SESSION=$data;
}

//Отображает все управляющие элементы администратору
function fnCheckAdmin(){
    $bAdmin=$_SESSION['bAdmin'];
    if ($bAdmin){
        echo "
            <script type='text/javascript'>
                $(document).ready(function(){
                    fnPanelAdminVisible();
                })
            </script>
        ";
    }
}

