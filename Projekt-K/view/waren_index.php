<article class="hreview open special">
    <link rel="stylesheet" href="/Projekt-K/view/css/style.css">
	<form action="/Projekt-K/waren/search" method="post">
        <div class="component" data-html="true">
        <input name="suchen" type="text" placeholder="Ware suchen">
        <input name="suchensubmit" type="submit" value="Suchen">
        </div>
    </form>
    <?php 
    
    if (empty($waren)): ?>
		<div class="dhd">
			<h2 class="item title">Keine Waren vorhanden.</h2>
		</div>
    <?php else: ?>
        <?php foreach ($waren as $ware): ?>
                      <?php require_once 'model/FilialenModel.php';
      $filialenModel = new FilialenModel();
      if($ware->filialenid != null)
      {$filiale = $filialenModel->readById($ware->filialenid);
    $filialenname = $filiale->name ;}
      else{$filialenname = "";}?>
      <form>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $ware->name;?></div>
				<div class="panel-body">
					<p class="description"><?= $ware->name;?><br><?= $ware->preis;?><br><?= $filialenname;?><br><?= $ware->menge;?></p>
					<p>
						<a title="Löschen" href="/Projekt-K/waren/delete?id=<?= $ware->id ?>">Löschen</a>
                        <a title="Bearbeiten" href="/Projekt-K/waren/edit?id=<?= $ware->id ?>">Bearbeiten</a> 
                        <a title="hinzufügen" href="/Projekt-K/einkaufslisten/additem?id=<?= $ware->id ?>">Zur Einkaufsliste hinzufügen</a>

                    </p>
				</div>
			</div>
    					   </form>
		<?php endforeach ?>

	<?php endif ?>
</article>
