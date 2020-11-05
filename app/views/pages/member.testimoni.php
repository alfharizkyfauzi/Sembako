<?php
	if($total != 0){
		$judul = 'Testimoni Dari Anda Untuk Kami';	
		$sub = 'Terima kasih telah mengirimkan testimoni kepada kami';
	} else {
		$judul = 'Kirminkan Testimoni Kepada Kami';	
		$sub = 'Buatlah testimoni untuk kami sebagai member yang bahagia';
	}
?>
<div class="wrapper pull-left m">
    
    	<div class="page-title">
        	<h1><?= $judul ?></h1>
            <p><?= $sub ?></p>
        </div>
        
        <?php
    	if($total != 0){
		?>
        <b>Testimoni Anda</b> <br/><br/>
        <p><?= $data[0]['testimoni'] ?></p>
        <?php
		}
		else {
		?>
    	<form action="<?= SITE ?>/member/testimoni" method="post" class="form">
        	<label class="block">
            	<b>Kolom Testimoni</b>
                <textarea name="testimoni" class="form-control" rows="5" required="required"></textarea>
            </label>
	        <button type="submit" name="submit" class="btn btn-large pull-left">Submit</button>
        </form>
        <?php
		}
		?>
    </div>
    
    <div style="height:30px; width:100%" class="pull-left"></div>
    
</div>