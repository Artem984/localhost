<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
use \Bitrix\Main\Data\Cache;
CModule::IncludeModule("iblock");

$arGroups = $USER->GetUserGroupArray();

$cache = Cache::createInstance(); // Служба кеширования
$cachePath = 'componentNewsDetal'; // папка, в которой лежит кеш
$cacheTtl = 3600; // срок годности кеша (в секундах)
$cacheKey = 'componentNewsDetal'; // имя кеша

if ($cache->initCache($cacheTtl, $cacheKey, $cachePath))
{
    $arResult = $cache->getVars(); // Получаем переменные
    $cache->output(); // Выводим HTML пользователю в браузер
}
elseif ($cache->startDataCache())
{
    $res = CIBlockElement::GetByID($_GET['id']);
    $arNews = $res->GetNext();

    $arResult['IB']=$_GET['IB'];
    $arResult["ID"]=$arNews["ID"];
    $arResult["NAME"]=$arNews["NAME"];
    $arResult["PODROBNOSTI"]=$arNews["PREVIEW_TEXT"];
    $arResult["IMG"]=CFile::GetPath($arNews["PREVIEW_PICTURE"]);;
    $arResult["DATE_CREATE"]=$arNews["DATE_CREATE"];
    $arResult["IBLOCK_NAME"]=$arNews["IBLOCK_NAME"];
         
    $this->IncludeComponentTemplate();
    // Всё хорошо, записываем кеш
    $cache->endDataCache($vars);
}?>