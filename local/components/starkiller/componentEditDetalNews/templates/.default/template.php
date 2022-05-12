<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){die();}
        $arGroups = $USER->GetUserGroupArray();?>

<div style="margin-top: 40px;" class="container">
    <p>Категория: <?= $arResult["IBLOCK_NAME"]?></p>
    <div style="display:flex;">
        <div >
            <img style="width: 200px;" src="<?= $arResult["IMG"]?>" alt="Изображение">
        </div>
        <div style="margin-left: 20px;">
            <p>Заголовок: <?= $arResult["NAME"]?></p>
            <p>Дата публикации: <?= $arResult["DATE_CREATE"]?></p>
            <p>Описание: <?= $arResult["PODROBNOSTI"]?></p>
            <a href="/">На главную</a>
        </div>
    </div>
</div>

<div class="container">
    <form style="border:2px solid red;padding: 10px;margin:10px;" method="post" enctype="multipart/form-data">
        <p><input name="NAME" type="text" value='<?= $arResult["NAME"]?>'> Заголовок новости</p>
        <p><input name="PREVIEW_TEXT" type="text" value='<?= $arResult["PODROBNOSTI"]?>'> Текст новости</p>
        Выберите файл: <input type="file" name="PREVIEW_PICTURE" size="10" /><br /><br />
        <input type="submit" value="Обновить" />
        <a href='/local\components\starkiller\componentEditDetalNews\deleteElement.php?IB=<?=$arResult["IB"]?>&id=<?=$arResult["ID"]?>'
            style="margin-left: 20px;">Удалить новость</a>   
    </form>
</div>