//функции которые вызываються после загрузки страницы
$(document).ready(function(){
    //показать/скрыть пароль
    $('#btnEye').click(function(){
        if($('#editPas').prop('type')=='text'){
            $('#editPas').prop('type','password')
        }
        else{
            $('#editPas').prop('type','text')
        }
        $('#editPas').focus();
        return false;
    });

    //вызов слайдера
    $('.grBoardAczia').click(function(){
        $('body').append(
            "<form method='post' id='grModalWindow'>"+
            "<a class='btnKrestik'></a>"+
            "<h3>Добавить акцию</h3>"+
            "<input type='text' id='edAkziaName'  placeholder='название акции' name='edAkziaName'>"+
            "<textarea id='edAkziaOpisanie' placeholder='описание акции' name='edAkziaOpisanie'></textarea>"+
            "<textarea id='edAkziaUslovie' placeholder='условия акции' name='edAkziaUslovie'></textarea>"+
            "<textarea id='edAkziaPriz' placeholder='призы' name='edAkziaPriz'></textarea>"+
            "<input type='text' id='edAkziaYakar'  placeholder='тег' name='edAkziaYakar'>"+
            "<input type='date' id='edAkziaDatePublic'  placeholder='дата публикации' name='edAkziaDatePubliс'>"+
            "<input type='button' id='btnCansel' value='Отмена' name='btnAkziaCansel'>"+
            "<input type='submit' id='btnSubmit' value='Добавить' name='btnAkziaSubmit'>"+
            "</form>"
        );
        return false;
    });

    //проверка полей ввода
    $('.grModalWindow').click(function(){
        alert(1);
        $selectModalWindow=('.grModalWindow');//сохраняем селектор селектор
        $sName=$($selectModalWindow+'#edAkziaName');
        alert($name);
        return false;
    });
});

//отображение панели администратора
function fnPanelAdminVisible(){
    var $jqPlaseInsert=$('.content').find('section');
    $jqPlaseInsert
        .append(
            "<div class='grAdminPanel'>" +
                "<a class='btnAdminDel'></a>"+
                "<a class='btnAdminEdd'></a>"+
                "<a class='btnAdminShow'></a>"+
            " </div>"
        );
    return false;
};

