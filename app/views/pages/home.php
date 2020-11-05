 <div class="plus4">
 	<div class="section">
 		<h1>New Items</h1>
 		<?php
			foreach ($new_items as $ni) {

				$nama_item = $ni['nama_item'];
				if (strlen($nama_item) > 25) {
					$ni_item = substr($nama_item, 0, 25) . "...";
				} else {
					$ni_item = $nama_item;
				}

				$diskon = $ni['harga'] * $ni['diskon'] / 100;
				$harga = $ni['harga'] - $diskon;

			?>
 			<div class="item">
 				<div class="thumbnail">
 					<?php
						if ($ni['diskon'] != 0) {
							echo "<div class='label'>" . $ni['diskon'] . "%</div>";
						}
						?>
 					<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
 						<img src="<?= SITE ?>/public/images/items/<?= $ni['foto'] ?>" width="206" height="170" />
 					</a>
 				</div>
 				<a href="<?= SITE ?>/item/<?= $ni['id_item'] ?>">
 					<b><?= ucwords($ni_item) ?></b>
 				</a>
 				<?php
					if ($ni['diskon'] != 0) {
					?>
 					<p><strike>Rp.<?= number_format($ni['harga'], "0", ".", ".") ?></strike> Rp.<?= number_format($harga, "0", ".", ".") ?></p>
 				<?php
					} else {
					?>
 					<p>Rp.<?= number_format($ni['harga'], "0", ".", ".") ?></p>
 				<?php
					}
					?>
 				<a href="<?= SITE ?>/cart/add/<?= $ni['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
 			</div>
 		<?php
			}
			?>
 	</div>

 	<div class="section">
 		<h1>Best Items</h1>
 		<?php
			foreach ($best_items as $bi) {

				$nama_item = $bi['nama_item'];
				if (strlen($nama_item) > 25) {
					$bi_item = substr($nama_item, 0, 25) . "...";
				} else {
					$bi_item = $nama_item;
				}

				$diskon = $bi['harga'] * $bi['diskon'] / 100;
				$harga = $bi['harga'] - $diskon;

			?>
 			<div class="item">
 				<div class="thumbnail">
 					<?php
						if ($bi['diskon'] != 0) {
							echo "<div class='label'>" . $bi['diskon'] . "%</div>";
						}
						?>
 					<a href="<?= SITE ?>/item/<?= $bi['id_item'] ?>">
 						<img src="<?= SITE ?>/public/images/items/<?= $bi['foto'] ?>" width="206" height="170" />
 					</a>
 				</div>
 				<a href="<?= SITE ?>/item/<?= $bi['id_item'] ?>">
 					<b><?= ucwords($bi_item) ?></b>
 				</a>
 				<?php
					if ($bi['diskon'] != 0) {
					?>
 					<p><strike>Rp.<?= number_format($bi['harga'], "0", ".", ".") ?></strike> Rp.<?= number_format($harga, "0", ".", ".") ?></p>
 				<?php
					} else {
					?>
 					<p>Rp.<?= number_format($bi['harga'], "0", ".", ".") ?></p>
 				<?php
					}
					?>
 				<a href="<?= SITE ?>/cart/add/<?= $bi['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
 			</div>
 		<?php
			}
			?>
 	</div>
 	<div class="section">
 		<h1>Promo Items</h1>
 		<?php
			foreach ($promo_items as $pi) {

				$nama_item = $pi['nama_item'];
				if (strlen($nama_item) > 25) {
					$pi_item = substr($nama_item, 0, 25) . "...";
				} else {
					$pi_item = $nama_item;
				}

				$diskon = $pi['harga'] * $pi['diskon'] / 100;
				$harga = $pi['harga'] - $diskon;

			?>

 			<div class="item">
 				<div class="thumbnail">
 					<?php
						if ($pi['diskon'] != 0) {
							echo "<div class='label'>" . $pi['diskon'] . "%</div>";
						}
						?>
 					<a href="<?= SITE ?>/item/<?= $pi['id_item'] ?>">
 						<img src="<?= SITE ?>/public/images/items/<?= $pi['foto'] ?>" width="206" height="170" />
 					</a>
 				</div>
 				<a href="<?= SITE ?>/item/<?= $pi['id_item'] ?>">
 					<b><?= ucwords($pi_item) ?></b>
 				</a>
 				<?php
					if ($pi['diskon'] != 0) {
					?>
 					<p><strike>Rp.<?= number_format($pi['harga'], "0", ".", ".") ?></strike> Rp.<?= number_format($harga, "0", ".", ".") ?></p>
 				<?php
					} else {
					?>
 					<p>Rp.<?= number_format($pi['harga'], "0", ".", ".") ?></p>
 				<?php
					}
					?>
 				<a href="<?= SITE ?>/cart/add/<?= $pi['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
 			</div>
 		<?php
			}
			?>
 	</div>
 </div>