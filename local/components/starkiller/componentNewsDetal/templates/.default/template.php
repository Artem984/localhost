<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){die();}
$arGroups = $USER->GetUserGroupArray();
?>

<div style="margin-top: 40px;" class="container">
    <h1>Категория: <?= $arResult["IBLOCK_NAME"]?></h1>
    <div style="display:flex;">
        <div >
            <img style="width: 500px;" src="<?= $arResult["IMG"]?>" 
                alt="Изображение">
        </div>
        <div style="margin-left: 20px;">
            <h2>Заголовок: <?= $arResult["NAME"]?></h2>
            <h6>Дата публикации: <?= $arResult["DATE_CREATE"]?></h6>
            <p>Описание: <?= $arResult["PODROBNOSTI"]?></p>
            <a href="/">На главную</a><br>
        </div>
    </div>
    <? if(in_array(1,$arGroups)||in_array(7,$arGroups)||in_array(8,$arGroups)) { ?>
        <a style="color: blue; display: block; text-align: center; margin: 10px;" 
            href="editNews\index.php?IB=<?=$arResult["IB"]?>&id=<?=$arResult["ID"]?>">
            Редактирование новости
        </a>
    <?}?>
</div>