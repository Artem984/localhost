<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){die();}
        $arGroups = $USER->GetUserGroupArray();?>

<div class="container" style="margin-top:100px;">
    <form style="border:2px solid red;padding: 10px;margin:10px;" method="post" enctype="multipart/form-data">
        <p><input name="NAME" type="text" value='<?= $arResult["NAME"]?>'> Заголовок новости</p>
        <p><input name="PREVIEW_TEXT" type="text" value='<?= $arResult["PREVIEW_TEXT"]?>'> Текст новости</p>
        Выберите файл: <input type="file" name="DETAIL_PICTURE" size="10" /><br /><br />
        <input type="submit" value="Добавить"/>
        <a href="..\..\index.php">На главную</a>
    </form>
</div>