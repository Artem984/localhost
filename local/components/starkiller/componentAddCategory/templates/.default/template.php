<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){die();}?>
<div class="container">
    <div style="margin-top: 100px;">
        <h3>Список категорий</h3>
        <?foreach ($arResult as $item) {?>
            <div style="display: flex;">
                <p>ID инфоблока: <span style="text-decoration:underline;"><?=$item["ID"]?> <?=$item['NAME']?></span></p>
            </div>
        <?}?>
    </div>

    <div class="container" style="margin-top:50px;">
        <h3>Созднание категории</h3>
        <form method="post" enctype="multipart/form-data">
            <p><input name="NAMEINFOBLOCK" type="text"> Имя инфоблока</p>
            <p><input name="CODEINFOBLOCK" type="text"> Код инфоблока</p><br/>
            <input type="submit" value="Создать" />
            <a href="..\..\index.php">На главную</a>
        </form>
    </div>
</div>
