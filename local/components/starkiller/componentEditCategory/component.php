<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
use \Bitrix\Main\Data\Cache;
CModule::IncludeModule("iblock");

$arGroups = $USER->GetUserGroupArray();

if(in_array(1,$arGroups)||in_array(7,$arGroups)||in_array(8,$arGroups)){ 
  
  $res = CIBlock::GetList( Array(), Array("TYPE" => "My_infoblock"));

  for($i=0; $ar_res = $res->Fetch(); $i++){
    $arResult[$i]["ID"] = $ar_res["ID"];
    $arResult[$i]["NAME"] = $ar_res["NAME"];
  }
  //--- Start Изменение названия инфолока ---//

    $ib = new CIBlock;
    $arFields = Array(
      "NAME" => $_POST['RENAME_INFO_BLOCK'],
    );

    if((!empty($_POST['ID_INFO_BLOCKS'])) && (!empty($_POST['RENAME_INFO_BLOCK']))){
      $res = $ib->Update($_POST['ID_INFO_BLOCKS'],$arFields);
    }
    $this->IncludeComponentTemplate();
  //--- End Изменение названия инфолока ---//
}