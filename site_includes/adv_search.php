<?php
include "../connection.php";
?>
<form method="post">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title"><a data-toggle="collapse"  href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Search by brand </a></h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					<div class="form-group">
						<?php
						$query = "SELECT * FROM brand;";
						$result = mysqli_query($conn, $query);
						while ($row1 = mysqli_fetch_assoc($result)) {
							echo "<div class='checkbox'>";
							echo "<label class='chkbrandsearch'>";
							echo "<input type='checkbox'  name='searchStyle' value='" . $row1['BrandID'] . "' >" . $row1['BrandName'];
							echo "</label></div>";
						}
						?>
					</div>

				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingTwo">
				<h4 class="panel-title"><a class="collapsed" data-toggle="collapse"  href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Search by style </a></h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
					<div class="form-group">

						<?php
						$query = "SELECT * FROM style;";
						$result = mysqli_query($conn, $query);
						while ($row1 = mysqli_fetch_assoc($result)) {

							echo "<div class='checkbox'>";
							echo "<label class='chkstylesearch'>";
							echo "<input type='checkbox'  name='searchStyle' value='" . $row1['StyleID'] . "' >" . $row1['StyleName'];
							echo "</label></div>";
						}
						?>
						</select>
					</div>

				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingThree">
				<h4 class="panel-title"><a class="collapsed" data-toggle="collapse"  href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Search by color </a></h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				<div class="panel-body">
					<div class="form-group">

						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor "style"color:red" value="Red" >
								Red </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:blue" value="Blue" >
								Blue </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:green" value="Green" >
								Green</label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:gold" value="Gold" >
								Gold </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:silver"value="Silver" >
								Silver </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style="color:grey" value="Multicolor" >
								Multicolor </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:tan" value="Tan" >
								Tan </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:orange" value="Orange" >
								Orange </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:purple" value="Purple" >
								Purple </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:#D0E9C6" value="White" >
								White </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:black" value="Black" >
								Black </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:rgb(225, 201, 157)" value="Cream" >
								Cream </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:grey" value="Grey" >
								Grey </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:pink" value="Pink" >
								Pink </label>
						</div>
						<div class="checkbox">
							<label class="chkcolorsearch">
								<input type="checkbox"  name="searchColor" style"color:brown" value="Pink" >
								Brown </label>
						</div>

					</div>

				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingFour">
				<h4 class="panel-title"><a class="collapsed" data-toggle="collapse"  href="#collapseFour" aria-expanded="false" aria-controls="collapseThree"> Search by price </a></h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
				<div class="panel-body">

					<div class="form-group">
						<select class="adv-search form-control" name="searchPrice">
							<option value="">Search by Price</option>
							<option value="1000">Rs.1000 and below</option>
							<option value="2000">Rs.1000 to Rs.2000</option>
							<option value="2000">Rs.2000 to Rs.3000</option>
							<option value="3000=">Rs.3000 to Rs.4000</option>
							<option value="4000">Rs.4000 to Rs.5000</option>
							<option value="5000">Rs.5000 to Rs.6000</option>
							<option value="6000">Rs.7000 and above</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
