<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

//Library
include_once(dirname(__FILE__)."/iblock_tools.php");

//Parameters
if(!is_array($arParams)) $arParams = array();
if(strlen($arParams["site_id"]) <= 0)
	$arParams["site_id"] = "s1";

$import = new CIBlockCMLImport();

$_SESSION["DEMO_IBLOCK_BOOKS"] = $import->GetIBlockByXML_ID("books-books");
//Import XML
if($_SESSION["DEMO_IBLOCK_BOOKS"] === false)
{
	$iblock_id = DEMO_IBlock_ImportXML("080_books_books-books_".LANGUAGE_ID.".xml", $arParams["site_id"], false, false);
	if($iblock_id > 0)
	{
		$arLabels = array();
		$rsLanguages = CLanguage::GetList(($b="sort"), ($o="asc"));
		while($arLang = $rsLanguages->Fetch())
		{
			__IncludeLang(GetLangFileName(dirname(__FILE__)."/lang/", "/books-books.php", $arLang["LANGUAGE_ID"]));
			$arLabels[$arLang["LANGUAGE_ID"]] = GetMessage("DEMO_IBLOCK_ESTORE_BOOKS_BROWSER_TITLE");
		}

		$obUserField  = new CUserTypeEntity;
		$obUserField->Add(array(
			"ENTITY_ID" => "IBLOCK_".$iblock_id."_SECTION",
			"FIELD_NAME" => "UF_BROWSER_TITLE",
			"USER_TYPE_ID" => "string",
			"XML_ID" => "books_sections-books-property-browser_title",
			"SORT" => 100,
			"MULTIPLE" => "N",
			"MANDATORY" => "N",
			"SHOW_FILTER" => "S",
			"SHOW_IN_LIST" => "Y",
			"EDIT_IN_LIST" => "Y",
			"IS_SEARCHABLE" => "Y",
			"EDIT_FORM_LABEL" => $arLabels,
			"LIST_COLUMN_LABEL" => $arLabels,
			"LIST_FILTER_LABEL" => $arLabels,
		));

		CUrlRewriter::Add(array(
			"CONDITION" => "#^/e-store/books/#",
			"RULE" => "",
			"ID" => "bitrix:catalog",
			"PATH" => "/e-store/books/index.php"
		));

	}
}
?>