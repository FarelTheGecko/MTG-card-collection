<style>
	/* Style the tab */
.tab {
  overflow: hidden;
  <!-- border: 1px solid #ccc; -->
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
border-bottom: 3px solid #1bb09b;
 <!--  background-color: #ddd; -->
}

/* Create an active/current tablink class */
.tab button.active {
border-bottom: 3px solid #1bb09b;
 <!--  background-color: #ccc; -->
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 16px 12px 6px 12px;
  <!-- border: 1px solid #ccc; -->
  border-top: none;
}

.tabcontent {
  animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}


.card  {
height:375px;
}

.card img {
width:223px;
max-width:100%;
margin-bottom:8px;
}


.card .cardname big {
font-size:16px;
}

@media (max-width: 480px) {
.card  {
height:320px;
}
}
</style>



<h2>MTG card collection</h2>

<div class="tab">
  
	<button class="tablinks" onclick="openCity(event, 'Selling')" id="defaultOpen">
		Selling
	</button>
	
	<button class="tablinks" onclick="openCity(event, 'Wishlist')">
		Wishlist
	</button>

</div>

<div id="Selling" class="tabcontent">
  <div class="row">

<?php
	$tasks = mysqli_query($db, "SELECT * FROM mtg_mycards WHERE CardStatus=-1 ORDER BY 
	FIELD (Color,
	'M5BRWUG',
	'M4RWUG','M4BWUG','M4BRUG','M4BRWG','M4BRWU',
	'M3BRW','M3BRU','M3BWU','M3RWU','M3BRG',
	'M3BWG','M3RWG','M3BUG','M3RUG','M3WUG',
	'M2UG','M2WG','M2RG','M2BG','M2WU',
	'M2RU','M2BU','M2RW','M2BW','M2BR',
	'G','U','W','R','B','A','L','Unknown'),
	FIELD (Rarity,'M','R','U','C','S','L'),
	CardType,CMC desc,ManaCost,Name, Foil desc");

	
	$i = 1; while ($row = mysqli_fetch_array($tasks)) { 
				$multiver=$row['MultiverseID'];
				$cardname=$row['Name'];
				$rarity=$row['Rarity'];
				$quantity=$row['Quantity'];

				$foil='';
				if ($row['Foil']=='Foil') 
				$foil='<b>[FOIL]</b>';
				else $foil='';
				echo "
				<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6 card'>
					<img src='https://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=$multiver&type=card'><br>
					<a href='https://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=$multiver' target='_blank'>
					<span class='cardname'><big>$cardname </big>
					</a>
					$foil 
					x$quantity ($rarity) </span>
				</div>
				"; 
$i++; } ?>	
</div>

</div>


<div id="Wishlist" class="tabcontent">
  <div class="row">
<?php
$wishlist = array
  (
	array("Gyre Sage",460771,"R"),
	array("Chasm Skulker",420702,"R"),
	array("Mycoloth",174975,"R")
  );
	
	foreach ($wishlist as list($cardname,$multiver,$rarity)){
		echo" 
	<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6 card'>
					<img src='https://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=$multiver&type=card'><br>
					<a href='https://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=$multiver' target='_blank'>
					<span class='cardname'><big>$cardname </big>
					</a>
					x1 ($rarity)</span>
				</div>
	";
	}
	
?>
</div>
</div>








<script>
document.getElementById("defaultOpen").click();


function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>