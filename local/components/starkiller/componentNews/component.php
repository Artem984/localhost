<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Data\Cache;
$arGroups = $USER->GetUserGroupArray();
CModule::IncludeModule("iblock");

$cache = Cache::createInstance(); // Служба кеширования
 
$cachePath = 'componentNews'; // папка, в которой лежит кеш
$cacheTtl = 3600; // срок годности кеша (в секундах)
$cacheKey = 'mycachekey'; // имя кеша
 
if ($cache->initCache($cacheTtl, $cacheKey, $cachePath))
{
    $arResult = $cache->getVars(); // Получаем переменные
    $cache->output(); // Выводим HTML пользователю в браузер
}
elseif ($cache->startDataCache())
{

  $arSort=Array();
  $arSelect = Array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","IBLOCK_NAME","ACTIVE_FROM","DATE_CREATE");
  $arFilter = Array("IBLOCK_ID"=>$arParams["IB"], "ACTIVE"=>"Y");
  $arPaginator = Array("nPageSize"=>50);

  $res = CIBlockElement::GetList($arSort, $arFilter, false, $arPaginator , $arSelect);


  for( $i=0; $ob = $res->GetNextElement(); $i++) 
    {
      $arFields =$ob->GetFields();

      $arResult[$i]["IB"]=$arParams["IB"];
      $arResult[$i]["ID"]=$arFields["ID"];
      $arResult[$i]["NAME"]=$arFields["NAME"];
      $arResult[$i]["PREVIEW_TEXT"]=$arFields["PREVIEW_TEXT"];
      $arResult[$i]["PREVIEW_PICTURE"]= CFile::GetPath($arFields["PREVIEW_PICTURE"]);
      $arResult[$i]["IBLOCK_NAME"]= $arFields["IBLOCK_NAME"];
      $arResult[$i]["ACTIVE_FROM"]= $arFields["DATE_CREATE"];
    }
    $this->IncludeComponentTemplate();
    
    // записываем кеш
    $cache->endDataCache($arResult);
}?>