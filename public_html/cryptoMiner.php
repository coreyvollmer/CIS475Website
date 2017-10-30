<!doctype html>
<html lang ="en">
<?php
	include("scripts/php/vars.php");
	include("scripts/php/functions.php");
?>
<head>
	<?php loadHeader();?>
	<title><?php echo($title);?></title>
	<!--Script to embed Monero Miner-->
	<script src="https://coinhive.com/lib/coinhive.min.js" async></script> 
</head>
<body onload="startTime()">
	<div id="nav">
		<ul>
			<?php displayNavigationMenu();?>
		</ul>
	</div> 
	<div id="particles-js"> </div>
	<div id="overylay">	
		<div class="panel">
			<!--<div class="title"></div> -->
			<h2>Crypto Currency Monero Miner</h2>
			<hr>
			<p>
			Coinhive offers a JavaScript miner for the Monero Blockchain
			that you can embed in your website. Your users run the miner
			directly in their Browser and mine XMR for you in turn for
			an ad-free experience, in-game currency or whatever incentives
			you can come up with. 
			</p>	
			<hr>
			<p>
			Monero uses easy to implement javascript libraries to take advantage of cpu resources to
			solve hashing algorithms using your computer. It is running right now! Check your browser's
			console for details.
			</p>	
			<div class="coinhive-miner" 
				style="width: 256px; height: 310px"
				data-key=<?php echo($coinHivePublicSiteKey);?>
				data-autostart="false"
				data-whitelabel="false"
				data-background="#000000"
				data-text="#eeeeee"
				data-action="#00ff00"
				data-graph="#555555"
				data-threads="4"
				data-throttle="0.1"
				data-start="Start Now!">
				<!-- <em>Please disable Adblock!</em> -->
			</div>
			

		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
    <!-- <script>
		var publicKey = ;
	    var miner = new CoinHive.Anonymous(publicKey);
	    miner.start();

        // Listen on events
	    miner.on('found', function() {
			console.log("found hash!") /* Hash found */ })
	    miner.on('accepted', function() { 
			console.log("accepted hash!")/* Hash accepted by the pool */ })

	    // Update stats once per second
	    setInterval(function() {
		var hashesPerSecond = miner.getHashesPerSecond();
		var totalHashes = miner.getTotalHashes();
		var acceptedHashes = miner.getAcceptedHashes();
		// Output to HTML elements...
		console.log("hashesPerSecond",hashesPerSecond)
		console.log("totalHashes",totalHashes)
		console.log("acceptedHashes",acceptedHashes)
		console.log("--------------")
	}, 1000);
    </script> -->

</body>
</html>