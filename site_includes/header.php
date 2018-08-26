<?php $base = "http://localhost/solestory/"; ?>
<header>
	<?php $base = "http://localhost/solestory/"; ?>
	<script>
		$('#sidebar').affix({
			offset : {
				top : $('header').height()
			}
		});
	</script>

	<div class="sidebar">
		<nav class="navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">SoleStore.</a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">

				<ul class="nav navbar-nav nav-stacked">

					<li>
						<a class="logoonli" href="<?php echo $base; ?>"><img class="img-responsive logo" src="<?php echo $base; ?>admin/images/logo.png"> </a>

					</li>

					<li class="userNav">
						<a href="<?php echo $base; ?>site/arrivals.php">New Arrivals</a>
					</li>

					<li class="dropdown userNav">
						<a  href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown">Shoes <span class="glyphicon glyphicon-plus"></span></a>
						<ul class="dropdown-menu dropside">
							<li class="dropSideList">
								<a class="ddList" href="<?php echo $base; ?>site/shopall.php" >All Shoes</a>
							</li>
							<?php $query = "SELECT * FROM style;";
								$result = mysqli_query($conn, $query);
								while ($rs = mysqli_fetch_assoc($result)) {
									$styleID = $rs['StyleID'];
									echo "<li class='dropSideList'><a class='ddLinks' href='" . $base . "site/shop.php?id=$styleID'>" . $rs['StyleName'] . "</a></li>";

								}
							?>
						</ul>
					</li>
					<li class="userNav">
						<a href="<?php echo $base; ?>site/about.php">About us</a>
					</li>
					<li class="userNav">
						<a href="<?php echo $base; ?>site/sale.php">Sale</a>
					</li>
					<li class="userNav">
						<a href="<?php echo $base; ?>site/giftcard.php">Gift Cards</a>
					</li>
				</ul>
			</div>
			</form>
		</nav>
	</div>