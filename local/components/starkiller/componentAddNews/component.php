<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
use \Bitrix\Main\Data\Cache;
CModule::IncludeModule("iblock");

$arGroups = $USER->GetUserGroupArray();

if(in_array(1,$arGroups)||in_array(7,$arGroups)||in_array(8,$arGroups)){ 

  $arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
    "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
    "IBLOCK_ID"      => $_GET["IB"],
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => $_POST["NAME"],
    "ACTIVE"         => "Y",            // активен
    "PREVIEW_TEXT"   => $_POST["PREVIEW_TEXT"],
    "DETAIL_TEXT"    => $_POST["PREVIEW_TEXT"],
    "PREVIEW_PICTURE" => $_FILES['DETAIL_PICTURE']
  );
  
  $el = new CIBlockElement;
  $cache = Cache::createInstance();
  $cachePath = 'componentNews'; // папка, в которой лежит кеш

  if(!empty($_POST["NAME"])){  // записываем в базу данных
    $ELEM = $el->Add($arLoadProductArray); 
    $cache->cleanDir($cachePath); // очищаем кеш
    LocalRedirect("http://localhost/");
  } 
         
    $this->IncludeComponentTemplate();
}?>