<html>
<head>
	<title>Ninja Gold</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/ninjagold.css">
</head>
<body>

	<div id="reset">
		<form action='ninjagold' method='post'>
			<input type="hidden" name="reset" value="reset"/>
			<input type='submit' value='reset'>
		</form>
	</div>

	<p> <?php echo "GOLD: " .$this->session->userdata('goldPerm'); ?>
	<p> <?php echo "ENERGY: " .$this->session->userdata('energy'); ?>

	<div id="bigBox">
		<div id='farm'>
			<form action="<?php echo base_url('ninjagold/farm')?>">
				<h4> Farm</h4>
				<p> (earns 10-20 gold)</p>
				<input type="hidden" name="building" value="farm"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div id='house'>
			<form action="<?php echo base_url('ninjagold/house')?>">
				<h4>House</h4>
				<p> (earns 5-10 gold)</p>
				<input type="hidden" name="building" value="house"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div id='cave'>
			<form action="<?php echo base_url('ninjagold/cave')?>">
				<h4>Cave</h4>
				<p> (earns 2-5 gold)</p>
				<input type="hidden" name="building" value="cave"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>

		<div id='casino'>
			<form action="<?php echo base_url('ninjagold/casino')?>">
				<h4>Casino!</h4>
				<p> (earns/takes 0-50 gold)</p>
				<input type="hidden" name="building" value="casino"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
	</div>

	<div id='textBox'>
		<p>
			<?php 
			echo $this->session->userdata('message');
			?>
		</p>
	</div>


</body>
</html>