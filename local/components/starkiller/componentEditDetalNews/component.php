<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
use \Bitrix\Main\Data\Cache;
CModule::IncludeModule("iblock");

$arGroups = $USER->GetUserGroupArray();

if(in_array(1,$arGroups)||in_array(7,$arGroups)||in_array(8,$arGroups)){ 
    $el = new CIBlockElement;

    $arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
    "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
    "NAME"           => $_POST["NAME"],
    "ACTIVE"         => "Y",            // активен
    "PREVIEW_TEXT"   => $_POST["PREVIEW_TEXT"],
    "DETAIL_TEXT"    => $_POST["PREVIEW_TEXT"],
    "DETAIL_PICTURE" => $_FILES['PREVIEW_PICTURE'],
    "PREVIEW_PICTURE"=> $_FILES['PREVIEW_PICTURE']
    );

    if(!empty($_POST["NAME"])){
        $NEWS_ID = $_GET['id'];  // изменяем элемент с кодом (ID)

        $res = $el->Update($NEWS_ID, $arLoadProductArray);

        $cache = Cache::createInstance();
        $cachePath = 'componentNewsDetal';
        $cache->cleanDir($cachePath);
    }

    $res = CIBlockElement::GetByID($_GET['id']);
    $arNews = $res->GetNext();

    $arResult['IB']=$_GET['IB'];
    $arResult["ID"]=$arNews["ID"];
    $arResult["NAME"]=$arNews["NAME"];
    $arResult["PODROBNOSTI"]=$arNews["PREVIEW_TEXT"];
    $arResult["IMG"]=CFile::GetPath($arNews["PREVIEW_PICTURE"]);
    $arResult["DATE_CREATE"]=$arNews["DATE_CREATE"];
    $arResult["IBLOCK_NAME"]=$arNews["IBLOCK_NAME"];
         
    $this->IncludeComponentTemplate();
}?>