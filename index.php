<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Jquery Form Validation with PHP Processing Sample</title>
	<link rel="stylesheet" href="formstyle.css" />
	<script src="modernizr_forms.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<!--[if lt IE 8]>
	<style>
		legend {
			display: block;
			padding: 0;
			padding-top: 30px;
			font-weight: bold;
			font-size: 1.25em;
			color: #FFD98D;
			margin: 0 auto;
		}
	</style>
<![endif]-->

</head>
<body>
	<div style="position: fixed; top: 360px; left:0; width: 60px; height: 130px; opacity: 0.6;z-index: 1000">
  		<a href="https://github.com/zhaopeterson/responsiveBootstrap" target="_blank"><img src="http://jssandboxes.com/img/icon-github.jpg" style="width: 60px; margin-bottom: 10px"></a>
  		<a href="http://www.jssandboxes.com"><img src="http://jssandboxes.com/img/icon-home.jpg" style="width: 60px"></a>
	</div>
	<header>
		<div class="banner">
		<img src="logo-greentea.jpg">
		<h1><span class="price">$15</span> OFF on $30 purchase <span class="vendor">at Island Green Tea</span></h1>
		</div>
	</header>

	<section id="regform-container">
<form id="regform" name="regform" class="group" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" novalidate>

		<h2>Please fill in the form below to get the deal</h2>
		<span id="formerror" class="error"></span>
		<ol>

			<li>
				<label for="email">Email *</label>
				<input type="email" name="email" pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" value="<?php if(isset($email)) {echo $email;} ?>" required id="email" autocomplete="off" placeholder="joe@example.com" novalidate/>
				<?php if(isset($err_email)) {echo $err_email;} ?>
			</li>
			<li>
				<label for="telephone">Telephone</label>
				<input type="tel" name="telephone" id="telephone" value="<?php if(isset($telephone)) {echo $telephone;} ?>" pattern="\d{3}[\-]\d{3}[\-]\d{4}" placeholder="xxx-xxx-xxxx" novalidate/>
			</li>
			<li>
				<label for="creditcard">Credit Card Number *</label>
				<input type="text" name="creditcard" pattern="\d{13,16}" value="<?php if(isset($creditcard)) {echo $creditcard;} ?>" placeholder="xxxxxxxxxxxxxx" required id="creditcard" novalidate/>
				<?php if(isset($err_creditcard)) {echo $err_creditcard;} ?>
			</li>
			<li>
				<label for="creditcard">Expiration Date</label>
				<select name="month">
					<option value="">Month</option>
  					<option value="01" <?php if($month == "01") echo 'selected="selected"'; ?>>01</option>
  					<option value="02">02</option>
  					<option value="03">03</option>
  					<option value="04">04</option>
  					<option value="05">05</option>
  					<option value="06">06</option>
  					<option value="07">07</option>
  					<option value="08">08</option>
  					<option value="09">09</option>
  					<option value="10">10</option>
  					<option value="11">11</option>
  					<option value="12">12</option>
				</select>
				<select name="year">
					<option value="">Year</option>
  					<option value="2016">2016</option>
  					<option value="2017">2017</option>
  					<option value="2018">2018</option>
  					<option value="2019">2019</option>
  					<option value="2020">2020</option>
  					<option value="2021">2021</option>
				</select>
			</li>			
		</ol>
		<button type="submit" name="action" value="submit">Send</button>
</form>
</section>
<script src="formscript.js"></script>
</body>
</html>