<div class="wrapper pull-left">
 <div class="detail_item">
        		<div class="thumbnail">
    	           	<img src="<?= SITE ?>/public/images/items/<?= $data[0]['foto'] ?>" width="236" height="200" />
                </div>
            	<h1><?= ucwords($data[0]['nama_item']) ?></h1>
                <?php
				
				$diskon = $data[0]['harga'] * $data[0]['diskon'] / 100;
				$harga = $data[0]['harga'] - $diskon;
				
				if($data[0]['diskon'] != 0){
				?>
					<p>Rp.<?= number_format($data[0]['harga'],"0",".",".") ?></p>
                <?php
				} else {
				?>
                <p><strike>Rp.<?= number_format($data[0]['harga'],"0",".",".") ?></strike> &nbsp; 
                		   Rp.<?= number_format($harga,"0",".",".") ?></p>
                <?php
				}
				?>
	            
                
                <br/>
                
                <table cellpadding="10" class="m">
                	<tr>
                    	<td width="100"><b>Merk</b></td>
                    	<td> : <?= ucwords($data[0]['merk']) ?></td>
                    </tr>
                	<tr>
                    	<td><b>Kategori</b></td>
                    	<td> : <?= ucwords($data[0]['kategori']) ?></td>
                    </tr>
                	<tr>
                    	<td><b>Lokasi</b></td>
                    	<td> : <?= ucwords($data[0]['lokasi']) ?></td>
                    </tr>
                    <?php
					if($data[0]['diskon'] != 0){
					?>
                	<tr>
                    	<td><b>Diskon</b></td>
                    	<td> : <?= $data[0]['diskon'] ?>%</td>
                    </tr>
                    <?php
					}
					?>
                </table>
                
	            <a href="<?= SITE ?>/cart/add/<?= $data[0]['id_item'] ?>" class="btn pull-left">Beli Sekarang</a>
                
                <div style="width:100%;" class="pull-left">
                	<b style="margin-bottom:10px; display:block;">Deskripsi</b>
                    <p style="position:static"><?= $data[0]['deskripsi'] ?></p>
                </div>
                
        </div>
</div>