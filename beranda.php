<?php
include "config/koneksi.php";
?>

<div class="container">
	<div class="grid">
		<div class="row">
            <div class="border padding20 span10" style="background-color: #F5F5F5;">
				<div class="panel no-border">
					<?php
						$comot=	mysqli_query($connect,"SELECT * FROM setup_dasboard ORDER BY id_dasboard DESC LIMIT 5");   
						while($ngisi=	mysqli_fetch_array($comot)){
					?>
                    <div class="panel-header ribbed-amber fg-white"><strong><?php echo $ngisi['nama']; ?></strong></div>
                    <div class="panel-content fg-dark nlp nrp">
						<?php
							if ($ngisi['gambar']!=""){ ?>
						<img src="images/<?php echo $ngisi['gambar']; ?>" class="place-right margin10 nlm ntm size3">
						<?php	}?>
                        
						<?php echo $ngisi['konten'];?>
                    </div>
					<?php
						}
					?>
				</div>
				
            </div>
			<div class="padding20 span4" style="background-color: #F1F1F1;">
				<div class="panel no-border">
                    <div class="panel-header ribbed-cyan fg-white">Waktu Sekarang</div>
                    <div class="panel-content fg-dark nlp nrp">
						<center><div class="calendar" data-role="calendar"></div></center> <br />
						<div class="times" data-role="times" data-style-background="bg-lightBlue" data-style-divider="fg-lightBlue"></div>
                    </div>
				</div>
				
				
				
				<div class="panel no-border">
                    <div class="panel-header ribbed-cyan fg-white">Slider</div>
                    <div class="panel-content fg-dark nlp nrp">
						<div class="tile double live" data-role="live-tile">
							<div class="tile-content image">
								<img src="images/galeri/harau4.jpg" class="cover1" />
							</div>
							<div class="tile-content image">
								<img src="images/galeri/harau5.jpg" class="cover1" />
							</div>
							<div class="tile-content image">
								<img src="images/galeri/sianok4.jpg" class="cover1"/>
							</div>
							<div class="tile-content image">
								<img src="images/galeri/jam gadang1.jpg" class="cover1" />
							</div>
                        </div>
                    </div>
				</div>
				
            </div>
		</div>
	</div>
</div>