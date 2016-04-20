<article class="hreview open special">
    <link rel="stylesheet" href="/Projekt-K/view/css/style.css">
	<?php 
    
    if (empty($waren)): ?>
		<div class="dhd">
			<h2 class="item title">Keine Waren vorhanden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($waren as $ware): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $ware->name;?></div>
				<div class="panel-body">
					<p class="description">In der Datenbank existiert eine Ware mit dem Namen <?= $ware->name;?></p>
					<p>
						<a title="Löschen" href="/Projekt-K/waren/delete?id=<?= $ware->id ?>">Löschen</a>
					</p>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</article>
