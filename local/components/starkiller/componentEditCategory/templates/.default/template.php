<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){die();}?>

<div class="container" style="margin-top:100px;">
    <div style="margin-top: 100px;">
        <h3>Список категорий</h3>
        <?foreach ($arResult as $item) {?>
            <div style="display: flex;">
                <p>ID инфоблока: <span style="text-decoration:underline;"><?=$item["ID"]?> <?=$item['NAME']?>:</span></p>
                <a style='margin-left:10px;' href="..\..\local\components\starkiller\componentEditCategory\deleteCategory.php?IB=<?=$item["ID"]?>">удалить инфоблок</a>
            </div>
        <?}?>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <h3>Изменение категории</h3>
        <p><input name="ID_INFO_BLOCKS" type="text"> ID инфоблока</p>
        <p><input name="RENAME_INFO_BLOCK" type="text"> Имя инфоблока</p><br/>
        <input type="submit" value="обновить" />
    </form>
</div>