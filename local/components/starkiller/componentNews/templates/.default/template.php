<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){die();}
$arGroups = $USER->GetUserGroupArray();?>

<section class="page-section bg-dark text-white" id="news">
    <div class="container text-center">
      <h2 class="mb-0"><?=$arResult[0]["IBLOCK_NAME"]?></h2>
		<hr class="divider my-4">
    </div>
    <div class="container text-center">
		<div class="row justify-content-center">

			<?foreach ($arResult as $item) {?>
				<div class="col-lg-4 text-center">
					<div class="card bg-secondary border border-dark">
						<img class="card-img-top" src="<?=$item["PREVIEW_PICTURE"]?>" alt="News image cap">
						<div class="card-body ">
							<h5 class="card-title">Имя<?=$item["NAME"]?></h5>
							<h6>Дата публикации:<?= $item["ACTIVE_FROM"]?></h6>
							<p class="card-text"><?=$item["PREVIEW_TEXT"]?></p>
							<a href="/newsDetial/?IB=<?=$item["IB"]?>&id=<?=$item["ID"]?>" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
			<? } ?>
				
		</div>
    </div>
	<?if(in_array(1,$arGroups)||in_array(7,$arGroups)||in_array(8,$arGroups)){?>
		<div class="container" style="margin-top: 50px;display: flex;justify-content: space-around;">
			<a href="/newsDetial/addNews/index.php?IB=<?=$item["IB"]?>" class="btn btn-primary">Добавление новости</a>
			<a href="/newsDetial/addCategory/index.php?IB=<?=$item["IB"]?>" class="btn btn-primary">Добавление Категории</a>
			<a href="/newsDetial/editCategory/index.php?IB=<?=$item["IB"]?>" class="btn btn-primary">Добавление Категории</a>
		</div>
	<? } ?>
  </section>