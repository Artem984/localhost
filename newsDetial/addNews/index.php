<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Добавление новости");    ?>

<?$APPLICATION->IncludeComponent("starkiller:componentAddNews","",array());?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>