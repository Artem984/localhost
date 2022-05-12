<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
use \Bitrix\Main\Data\Cache;
CModule::IncludeModule("iblock");

$arGroups = $USER->GetUserGroupArray();

if(in_array(1,$arGroups)||in_array(7,$arGroups)||in_array(8,$arGroups)){ 

  //--- Start Получаем инфоблок ---//
  $res = CIBlock::GetList( Array(), Array("TYPE" => "My_infoblock"));

  for($i=0; $ar_res = $res->Fetch(); $i++){
    $arResult[$i]["ID"] = $ar_res["ID"];
    $arResult[$i]["NAME"] = $ar_res["NAME"];
  }

    $nameInfoBlock = $_POST["NAMEINFOBLOCK"];
    $codeInfoBlock = $_POST["CODEINFOBLOCK"];
    
    $ib = new CIBlock;
    $arFields = Array(
      "ACTIVE" => 'Y',
      "NAME" => $nameInfoBlock,
      "CODE" => $codeInfoBlock,
      "LIST_PAGE_URL" => '#SITE_DIR#/catalog/list.php?SECTION_ID=#SECTION_ID#',
      "DETAIL_PAGE_URL" => '#SITE_DIR#/catalog/detail.php?ID=#ELEMENT_ID#',
      "IBLOCK_TYPE_ID" => 'My_infoblock',
      "SITE_ID" => Array("s1"),
      "SORT" => 500,
      "PICTURE" => '',
      "DESCRIPTION" => '',
      "DESCRIPTION_TYPE" => '',
      "GROUP_ID" => Array("2"=>"D", "3"=>"R"),
    );
    
    if((!empty($nameInfoBlock)) and (!empty($codeInfoBlock))){
      $res = $ib->Add($arFields);
    }
    //--- End Получаем инфоблок ---//
         
    $this->IncludeComponentTemplate();
}?>