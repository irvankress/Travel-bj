	<nav class="navigation-bar dark">
        <nav class="navigation-bar-content container">
        	<a href="index.html" class="element"><span class="icon-home"></span> BERANDA &trade;</a>
            <span class="element-divider"></span>
                
			<a class="element1 pull-menu" href="#"></a>
			<ul class="element-menu">
				<li>
					<a class="element brand" href="booking.php"> pesan </a>
					
				</li>
				<li>
					<a class="element brand" href="rekomendasi.php"> Rekomendasi </a>
					
				</li>
				<li>
					<a class="element brand" href="bookingList.php"> Cek pesan </a>
					
				</li>
				
				<a class="element brand" href="profil.php">Profil</a>
				<!-- -------------------------MENU KANAN---------------------------- -->
					 
				<!-- <a class="element place-right" href="#">
						<span class="icon-facebook" style="background: white;
						   color: black;
						   padding: 3px;
						   border-radius: 50%">
						</span>
				</a>
				<a class="element place-right" href="#">
						<span class="icon-twitter" style="background: white;
						   color: black;
						   padding: 3px;
						   border-radius: 50%">
						</span>
				</a>
				<a class="element place-right" href="#">
						<span class="icon-google-plus" style="background: white;
						   color: black;
						   padding: 3px;
						   border-radius: 50%">
						</span>
				</a> -->
				
	<?php session_start();

	if(isset($_SESSION['username'])){
	?>
				<span class="element-divider place-right"></span>
				<a href="logout.php" class="element" style="float: right;">Log Out</a>

				<!-- <div class="element place-right">                    -->
					<!-- <a class="dropdown-toggle icon-cog" href="#"></a> -->
					<!-- <ul class="dropdown-menu" data-role="dropdown"> -->
						<!-- <li><a href="logout.php">Keluar</a></li> -->
					<!-- </ul> -->
				<!-- </div> -->
				<a href="profil.php" class="element place-right">Selamat datang, <?php echo "$_SESSION[username]"; ?></a>
				
	<?php
	}else{
	?>
				<span class="element-divider"></span>
				<a href="formRegistrasi.php" class="element">Log in</a>
	<?php
	}
	?>
				
            </ul>
        </nav>
    </nav>

<?php
// include"chat.php";
?>
