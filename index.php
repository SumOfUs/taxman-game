<?php

  //grab url and split
  $url = $_SERVER[REQUEST_URI];
  $parts = explode("/", $url);


  $title = "Play Taxman: the online tax avoidance game!";

  if($parts[1] && $parts[1] != "" && $parts[1][0] != "?"){
    
    $secs = urldecode(htmlspecialchars($parts[1]));

    $title = "I made &pound;".$secs." playing Taxman: the online tax avoidance game!";
  }

?>   

<!DOCTYPE html>

<html lang="en">
<!--<html lang="en" manifest="/static/cache.manifest">-->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="/static/style.css">
	<link rel="stylesheet" href="/static/pacman-canvas.css">

	
	<!-- SEO Stuff -->
    <meta name="description" content="Play the online tax avoidance game to find how much tax you can avoid." />

   	<!-- Facebook Open Graph Information -->
	<meta property="og:image" content="http://taxman.sumofus.org/static/img/og.png"/>
    <meta property="og:title" content="<?php echo $title ?>" />
	<meta property="og:description" content="Play the online tax avoidance game to find how much tax you can avoid." />

	<!-- site icons -->
	<link rel="shortcut icon" href="/static/img/google2.png" />
	<link rel="apple-touch-icon" href="/static/img/google2.png" />

    <meta property="og:image" content="http://taxman.sumofus.org/static/img/og.png"/>
	
	<!-- Mobile Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	
	<!-- Apple Mobile Web Capability -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<!-- Script -->
	<script src="/static/js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="/static/js/jquery.hammer.min.js" type="text/javascript"></script>
    <script src="https://storage.googleapis.com/fa-assets/source-min.js"></script>
    <script src="https://storage.googleapis.com/fa-assets/jquery.scrollTo.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>	
	<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68864316-6', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body>

<div class="container-fluid">
	<div class="slide row">
		<div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-10">
				<div id="quote-container-mobile">
					<!--- <div class="triangle-right" id="quote-bubble-mobile">Another competitor!</div>
					<img src="/static/img/osborne2.png" id="quote-image-mobile"> -->
					<img src="/static/img/game-shot.png" id="game-shot" style="margin-left:auto; margin-right:auto; width:100%; max-width:500px">
				</div>

		</div>
		<div class="col-md-6 col-md-offset-0 col-sm-offset-1 col-sm-10" id="get-started">
			 <p>How much tax will George Osborne let you dodge?</p><p class="yellow">Enter your details to get started:</p>
			 <form action="/game.php" method="post" id="game-signup" class="form1" novalidate="novalidate">

                <input type="hidden" name="source" class="source" value="">
                <input type="hidden" name="subsource" class="subsource" value="">
                <input type="hidden" name="sub" class="sub" value="">
                <input type="hidden" name="variation" class="variation" value="">
                <input type="hidden" name="akid" class="akid" value="">
                <input type="hidden" name="alt" class="alt" value="">
                  <div class="fieldset" id="firstname-cont">
                                  <div class="formLabel" style="display: none;">
                                      <label class="field">Full name<span class="required" aria-required="true">*</span></label>
                                  </div>
                                  <div class="input">
                                      <div class="form-group has-feedback">
                                          <input size="16" id="firstname" name="name" type="text" class="text form-control firstname" placeholder="Player 1 name*" required="required" aria-required="true">
                                          
                                      </div>
                                  </div>
                              </div>
                  <div class="fieldset" id="email-cont">
                                  <div class="formLabel" style="display: none;">
                                      <label class="field">Email address<span class="required" aria-required="true">*</span></label>
                                  </div>
                                  <div class="input">
                                      <div class="form-group has-feedback">
                                          <input type="email" class="text form-control email" size="48" id="email" name="email" placeholder="Player 1 email*" required="required" aria-required="true">
                                         
                                      </div> 
                                  </div>
                              </div>
                <button type="submit" class="petition-button cta-button with-arrow submit pre-click" id="first-submit">Play!</button>
                <p class="footer-top">SumOfUs will <a href="http://sumofus.org/privacy/">protect your privacy</a>, and keep you updated our campaigns.</p>
              </form>

		</div>
	</div>

	<div class="slide row">
			<div class="col-md-7 col-sm-7">

<div class="main">


<!-- Display this message if Javascript is disabled -->
<noscript>
<h2>Enable Javascript!</h2>
<p>This HTML 5 app requires Javascript to run. Please check that Javascript is enabled in your browser.</p>
</noscript>

<!-- Highscore -->
<div class="content" id="highscore-content">
	<div class="button" id="back">&lt; back</div>
	<div>
		<h1>Highscore</h1>
		<p>
			<ol id="highscore-list">
				
			</ol>
		</p>
	</div>
</div>
<img src="/static/img/google2.png" id="google-image" style="display:none; height:30px; width:30px;">
<img src="/static/img/pound.png" id="coin-image" style="display:none; height:30px; width:30px;">
<!-- INSTRUCTIONS -->
<div class="content" id="instructions-content">
	<div class="button" id="back">&lt; back</div>
	<div>
		<h1>Instructions</h1>
		<div class="nomobile">
			<h2>Controls</h2>
			<p>Use your arrow keys or [W,A,S,D] keys to navigate pacman.</p>
			<p>To pause / resume the game press [SPACE] or [ESC] or just click into the game area.</p>
		</div>
		<div class="mobile">
			<h2>Controls</h2>
			<p>Use swipe gestures to navigate pacman.</p>
			<p>Alternatively use the Arrow Buttons underneath the game area to navigate pacman.</p>
			<p>To pause / resume the game, touch the game area once.</p>
		</div>

		<div style="display:none;">
			<h2>Ghosts</h2>
			<p>Ghosts are creatures that hunt pacman and will kill him if they catch him.</p>
			<p>Every ghost has its own strategy to chase down pacman.</p>
			<h3>Inky<img src="/static/img/inky.svg" class="pull-right"></h3>
			Inky will stay in the ghost house until pacman has eaten at least 30 pills.	His home is the bottom right corner.
			<h3>Blinky <img src="/static/img/blinky.svg" class="pull-right"></h3>
			Blinky is the most agressive of the 4 ghosts. He will start chasing pacman right away, and aim directly at him. His home is the upper right corner.
			<h3>Pinky<img src="/static/img/pinky.svg" class="pull-right"></h3>
			Pinky will start chasing pacman right away, he will always aim 4 fields ahead and 4 fields left of pacman. His home is the upper left corner.
			<h3>Clyde<img src="/static/img/clyde.svg" class="pull-right"></h3>
			Inky will stay in the ghost house until pacman has eaten at least 2/3 of all pills. His home is the bottom left corner.
		</div>

		<div style="display:none;">
			<h2>Ghost moods</h2>
			The ghosts have two different moods that change the way they act during the game.
			<h3>Scatter mood</h3>
			<p>This is the default mood. When ghosts are in scatter mood, they will just go to their home corner and stay there.</p>
			<img src="/static/img/instructions/instructions_scatter.PNG">
			<h3>Chase mood</h3>
			<p>After a certain time the ghosts change their mood and want to go chasing pacman. This is indicated through the walls turning red.</p>
			<img src="/static/img/instructions/instructions_chase.PNG">
		</div>

		<div style="display:none;">
			<h2>Items</h2>
			<h3>Pills</h3>
			<p>The goal of every level is, to eat all the white pills without getting catched by the ghosts. One pill results in 10 points.</p>
			<h3>Powerpills</h3>
			<p>In every level there are 4 powerpills, which are a bit bigger than the regular ones. If Pacman eats those, he will get strong enough to eat the ghosts. You can see this indicated by the ghosts turning blue. One powerpill results in 50 points.</p>
			<img src="/static/img/instructions/instructions_powerpill.PNG">
			<p>Eating a ghost results in 100 points. The soul of the ghost will return to the ghost house before starting to chase Pacman again.</p>
		</div>

	</div>
</div>

<!-- Info -->
<div class="content" id="info-content">
	<div class="button" id="back">&lt; back</div>
	<div>
		<h1>Info</h1>
		<p>This game was made by adapting Pacman Canvas. Pacman Canvas is Open Source, written by <a href="http://platzh1rsch.ch">platzh1rsch</a>. You can get the code on <a target="_blank" href="https://github.com/platzhersh/pacman-canvas" target="_blank">github</a>.</p>
		<p>
	</div>
</div>


<!--<div class="mobile" style="text-align: center;" id="mobile-play">
	<br>
  TAXMAN GAME

	<div id="quote-container-mobile">
		<div class="triangle-right" id="quote-bubble-mobile">Certain corporations avoid paying their fair share of tax - and the government cuts deals with them when they get caught.<br /><br />See how much profit you can pocket before the taxman catches up with you.</div>
		<img src="/static/img/osborne2.png" id="quote-image-mobile">
		 <a href="javascript:;" class="button">PLAY <span class="glyphicon glyphicon-chevron-down"></span></a>
	</div>
</div> main game content -->
<div class="content" id="game-content">
	
	<!-- main game content -->
	<div class="game wrapper">
	
		<div class="score">Profits: £</div>
		<div class="tax">Tax: £0</div>
		<div class="lives">Sweetheart deals: </div>
		<div class="level">Lvl:</div>
		<div class="controlSound">
			<img src="/static/img/audio-icon-mute.png" id="mute">
		</div>
		<!-- canvas is splitted into 18x13 fields -->
		<div id="canvas-container">
			<div id="canvas-overlay-container">
				<div id="canvas-overlay-content">
					<div id="title">Taxman: The online tax avoidance game</div>
					<div>
						<p id="text"><br />
							You are a multinational corporation. Collect as much profit as you can without paying taxes.
							<br /><br />
							CLICK TO BEGIN
						</p>
					</div>
				</div>
			</div>
			<canvas id="myCanvas" width="540" height="390">
			<p>Canvas not supported</p>
			</canvas>
		</div>

		<div class="controls" id="game-buttons">

		<!-- Will be moved to Instructions 
		<p class="nomobile">Use W-A-S-D keys to navigate Pac-Man</p>
		-->
		
			<!-- OLD Buttons -->
			<div>
				<span id="up" class="controlButton">&uarr;</span>
			</div>
			<div>
				<span id="left" class="controlButton">&larr;</span>
				<span id="down" class="controlButton">&darr;</span>
				<span id="right" class="controlButton">&rarr;</span>
			</div>
			
		</div>
			<div class="bored-yet sm">
				<div class="button-container">
					<a href="javascript:;" class="button next">Made enough? Click here...</a>
				</div>
			</div>
		<!-- inGame Controls End -->
		
		<!-- Game Menu -->		
		<div class="controls" id="menu-buttons">
			<ul>
				<li class="button" id="newGame">Restart</li>
				<li class="button" id="instructions">Instructions</li>
				<li class="button" id="info">Info</li>
			</ul>
			
		</div>
		<!-- Game Menu End -->
		
	</div>
		
	<div class="description nomobile">
		<p>This whole thing was written in HTML5, CSS3 and Javascript (using small bits of jquery). For the basics I was following the <a href="http://devhammer.net/blog/exploring-html5-canvas-part-1---introduction" target="_blank">"Exploring HTML5 Canvas"</a> Tutorials (Part 1 - 6) by Devhammer. Thanks for the great Tutorial!</a>
		<p>For some other stuff, like how to write objectorientated javascript I was following the tutorials over at <a href="http://www.codecademy.com/" target="_blank">http://www.codecademy.com/</a>, which is a really great site to learn Javascript and also other languages.</a>
		<p>If you understand German you can also read my blogpost about this site: <a href="http://blog.platzh1rsch.ch/2012/08/pacman-in-html5-canvas.html">"Pacman in HTML5 Canvas"</a>.</p>
		
		<span id="audio">
			<audio id="theme" preload="auto">
				<source src="/static/wav/theme.wav" type="audio/wav">
				<source src="/static/mp3/theme.mp3" type="audio/mpeg">
			</audio>
			<audio id="waka" preload="auto">
				<source src="/static/wav/waka.wav" type="audio/wav">
				<source src="/static/mp3/waka.mp3" type="audio/mpeg">
			</audio>
			<audio id="die" preload="auto">
				<source src="/static/wav/die.wav" type="audio/wav">
				<source src="/static/mp3/die.mp3" type="audio/mpeg">
			</audio>
			<audio id="powerpill" preload="auto">
				<source src="/static/wav/powerpill.wav" type="audio/wav">
				<source src="/static/mp3/powerpill.mp3" type="audio/mpeg">
			</audio>
		</span>
		
		
	</div>

	</div>
   </div>
  </div><!-- col-md-8 -->
<div class="col-md-4 col-sm-4 nomobile">
	<div id="quote-container">
		<div class="triangle-right" id="quote-bubble">Certain corporations avoid paying their fair share of tax - and the government cuts deals with them when they get caught.<br /><br />See how much profit you can pocket before the taxman catches up with you.</div>
		<img src="/static/img/osborne2.png" id="quote-image">

	</div>
	<div class="bored-yet nosm">
		<div class="button-container">
			<a href="javascript:;" class="button next">Made enough? Click here...</a>
		</div>
	</div>
</div>

</div> <!-- row -->
  <div class="slide other-slide row" id="petition-slide">
            <div class="col-md-12 col-xs-12 hazed-container">

                <!-- <img src="/static/dog.jpg" id="dog-pic" />
                
               -->
                  <div class="row petition-row">
                    <div class="alert">
                      <h3>Google recently struck a deal with HMRC that caps its UK tax rate at just 3% – whilst all other UK businesses pay 20%.</h3>
                      <h2>Help us hold them to account:</h2>
                    </div>
                      <div class="col-md-7 col-sm-7">
                          <img src="https://sumofus-production-media.s3.amazonaws.com/a/img/9d313162-fcc4-4a68-b25a-3be62d28039b.jpg" id="dog-pic" />
                         <span class='hidden-goal' style="display:none;">
                          <div class="text-right margin-bottom-5 goal"><strong>Goal:</strong> 2,000,000</div>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100" style="width: 84.5%;">
                                  1,694,635
                              </div>
                            </div>
                          </span>  
                          <h3>Sign our open letter asking the EU Competition Commissioner to investigate Google's shady UK tax deal.</h3>
                          <p>George Osborne recently struck a deal with Google that lets the tech firm off a staggering £1.6 billion in taxes – enough to cover the costs of 14m NHS hospital appointments.</p>
                          <p>Osborne's cosy relationship with big business means he'll never hold Google to account. But the European Competition Commission has openly said it will – as long as there is enough public support.</p>
                      	  <p>If we can get the European Commission to investigate Google, we can finally get Google to pay the UK taxes it owes.</p>
                      	  <p>Will you add your name to our open letter asking the European Commission to investigate Google's UK tax deal?</p>
                      </div>
                      <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1">
                        <h3 class="strong">Sign our open letter to the European Competition Commissioner</h3>
                        <p class="petition-text">Open Letter Text:</p>
                        <div class="well">"We believe Google's recent tax agreement with the UK government should be investigated. While ordinary companies doing business in the UK pay corporation tax at a 20% rate, under this deal, Google is paying around 3%. As such, the agreement disadvantages smaller corporations and sets a dangerous precedent."</div>
                        <form action="/petition.php" method="post" id="initial-signup" class="form1" novalidate="novalidate">

                <input type="hidden" name="source" class="source" value="">
                <input type="hidden" name="subsource" class="subsource" value="">
                <input type="hidden" name="sub" class="sub" value="">
                <input type="hidden" name="variation" class="variation" value="">
                <input type="hidden" name="akid" class="akid" value="">
                <input type="hidden" name="alt" class="alt" value="">
                  <div class="fieldset" id="firstname-cont">
                                  <div class="formLabel" style="display: none;">
                                      <label class="field">Full name<span class="required" aria-required="true">*</span></label>
                                  </div>
                                  <div class="input">
                                      <div class="form-group has-feedback">
                                          <input size="16" id="firstname" name="name" type="text" class="text form-control firstname" placeholder="Your fullname*" required="required" aria-required="true">
                                          
                                      </div>
                                  </div>
                              </div>
                  <div class="fieldset" id="email-cont">
                                  <div class="formLabel" style="display: none;">
                                      <label class="field">Email address<span class="required" aria-required="true">*</span></label>
                                  </div>
                                  <div class="input">
                                      <div class="form-group has-feedback">
                                          <input type="email" class="text form-control email" size="48" id="email" name="email" placeholder="Your email address*" required="required" aria-required="true">
                                         
                                      </div> 
                                  </div>
                              </div>
                  <div class="fieldset" id="zip-cont">
                                <div class="formLabel" style="display: none;">
                                    <label class="field">Postcode</label>
                                </div>
                                <div class="input">
                                    <div class="form-group has-feedback">
                                        <input size="8" id="zip" name="zip" type="text" class="text form-control zip" placeholder="Your postcode">
                                        
                                    </div>
                                </div>
                            </div>
      
                  </div>

                <button type="submit" class="petition-button cta-button with-arrow submit pre-click" id="first-submit">Sign the petition</button>
              </form>
                      </div>
                  </div>
                </div>

      </div>
      <div class="slide other-slide row" id="donation-slide">
        <div class="row donation-row">
          <div class="alert alert-success" role="alert">
          <p><strong>Thanks</strong> - your name's been added to the petition.</p></div>
          <h2>Your small donation helps ensure multinationals are accountable for their actions.</h2>
          <h3 class="strong">Together, we've changed factory conditions in Bangladesh and bought about the ethical sale of Angora fur. Now it's time to make sure Google pays what it owes:</h3>
          <a href="https://action.sumofus.org/a/donate-to-sumofus-general/" class='petition-button' id='donation-button'>Donate</a>
      		<p class="flickr-footer">Image courtesy of Marcin Wichary: https://www.flickr.com/photos/mwichary/</p></div>
      </div>
</div> <!-- container -->

	<script src="/static/pacman-canvas.js" type="text/javascript"></script>


</body>
</html>
