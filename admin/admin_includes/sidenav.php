<?php $base = "http://localhost/solestory/"; ?>

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
					<a class="logoonli" href="<?php echo $base; ?>admin/dashboard/"><img class="img-responsive logo" src="<?php echo $base; ?>admin/images/logo.png"> </a>

				</li>
				<li>
					<a  href="<?php echo $base; ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="dropdown userNav">
					<a  href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown">Products <span class="glyphicon glyphicon-plus"></span></a>
					<ul class="dropdown-menu dropside">
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/product/product_list.php" >Show Products</a>
						</li>
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/product/product_add.php" >Add Product</a>
						</li>

					</ul>
				</li>
				<li class="dropdown userNav">
					<a  href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown">Styles <span class="glyphicon glyphicon-plus"></span></a>
					<ul class="dropdown-menu dropside">
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/style/style_list.php" >Show Styles</a>
						</li>
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/style/style_add.php" >Add Style</a>
						</li>

					</ul>
				</li>
				<li class="dropdown userNav">
					<a  href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown">Brand <span class="glyphicon glyphicon-plus"></span></a>
					<ul class="dropdown-menu dropside">
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/brand/brand_list.php" >Show Brands</a>
						</li>
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/brand/brand_add.php" >Add Brand</a>
						</li>

					</ul>
				</li>

				<li>
					<a  href="<?php echo $base; ?>admin/customer/customer_list.php">Show Users</a>
				</li>
				<li class="dropdown userNav">
					<a  href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown">Banner <span class="glyphicon glyphicon-plus"></span></a>
					<ul class="dropdown-menu dropside">
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/banner/banner_list.php" >Show Banners</a>
						</li>
						<li class="dropSideList">
							<a class="ddList" href="<?php echo $base; ?>admin/banner/banner_add.php" >Add Bannner</a>
						</li>

					</ul>
				</li>
			</ul>
		</div>
		</form>
		
	<a href="http://localhost/solestory/"><button class="btn addtocart"> Go to front-end </button></a>
	</nav>
</div>