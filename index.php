<style>
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

@media (min-width: 768px) and (max-width: 991px) {
.card  {height:260px;}
	
}


@media (max-width: 480px) {
.card  {
height:320px;
}
}


* {
  box-sizing: border-box;
}



/* Add padding BETWEEN each column (if you want) */

#cardlist,
#cardlist > .column {
  padding: 0;
}

#cardlist,
#cardlist > .show {
  padding: 8px;
}


/* Create three equal columns that floats next to each other */
.column {
  float: left;
   width: 0%; 
 /* display: none;  Hide columns by default */
  transition: 0.6s; 
	opacity: 0;
	
	visibility: hidden;
}

.column .cardname big {
	font-size:0px;
	transition: 0.6s;
}






/* The "show" class is added to the filtered elements */
.show {
  /*display: block;*/
    width: 25%; 
    opacity: 1;
	visibility: visible;
}

.show .cardname big {
	font-size:16px;
}

/* Style the buttons */
#myBtnContainer .btn {
  border: none;
  outline: none;
  box-shadow:none;
  background-color: white;
  cursor: pointer;
  transition:0.3s;
  border-bottom:5px solid #fff;
}

/* Add a grey background color on mouse-over */
#myBtnContainer .btn:hover {
  background-color: #E1E8EE;
  border-bottom:5px solid #E1E8EE;
}

.legend{
	background-color: #1bb09b;
   color: white;
   padding: 6px 12px;
   border-radius: 4px;
   cursor: context-menu;
   width:100px;
   /*
    cursor: context-menu;
   font-weight:bold;
   */
   display:inline-block;
}

/* Add a dark background color to the active button */
#myBtnContainer .btn.active {
  /*background-color: #1bb09b;
   color: white; */
   border-bottom:5px solid #1bb09b;
   padding: 6px 12px;
}



@media (max-width: 767px) {
.show 	{    width: 50%; }

#myBtnContainer .btn,#myBtnContainer .btn.active	{	padding: 6px 3px;	}
#maincontent .col-sm-12 {padding:0;}
}

@media (max-width: 620px) {
.legend{
		display:block;
		width:100%;
		margin: 13px 0 0 0;
		padding: 3px 12px;
}
#myBtnContainer .btn,#myBtnContainer .btn.active	{	padding: 3px;	}
}

@media (max-width: 510px) {
	#myBtnContainer .btn,#myBtnContainer .btn.active	{	font-size:12px;	}
}
</style>



<?php

if 		($language=="pl") 	{	$cardname 	= "Nazwa karty"; 
								$cardtext 	= "Tekst"; 
								$cardtype 	= "Typ karty"; 
								
								$mtgcardtext=array(
									"color" => "Kolor",
									"rarity" => "Rzadkość",
									"type" => "Rodzaj",
									"set" => "Zestaw",
									"mana" => "Koszt Many",
									"red" => "Czerw.",
									"white" => "Biały",
									"black" => "Czarny",
									"green" => "Ziel.",
									"blue" => "Nieb.",
									"multi" => "Wielokol.",
									"less" => "Bezkol.",
									"allcolor" => "Wszystkie",
									"allrarity" => "Wszystkie",
									"alltypes" => "Wszystkie",
									"allsets" => "Wszystkie",
									"allmana" => "Jakikolwiek"
								);
}
elseif	($language=="en") 	{	$cardname 	= "Card name"; 
								$cardtext 	= "Text"; 
								$cardtype 	= "Card type"; 
								
								$mtgcardtext=array(
									"color" => "Color",
									"rarity" => "Rarity",
									"type" => "Type",
									"set" => "Set",
									"mana" => "Mana Cost",
									"red" => "Red",
									"white" => "White",
									"black" => "Black",
									"green" => "Green",
									"blue" => "Blue",
									"multi" => "Multicolor",
									"less" => "Colorless",
									"allcolor" => "All",
									"allrarity" => "All",
									"alltypes" => "All",
									"allsets" => "All",
									"allmana" => "Any"
								);
}
elseif	($language=="de") 	{	$cardname 	= "Kartenname"; 
								$cardtext 	= "Text"; 
								$cardtype 	= "Kartentyp"; 
								
								$mtgcardtext=array(
									"color" => "Farbe",
									"rarity" => "Seltenheit",
									"type" => "Typ",
									"set" => "Set",
									"mana" => "Manakosten",
									"red" => "Rot",
									"white" => "Weiss",
									"black" => "Schwarz",
									"green" => "Grün",
									"blue" => "Blau",
									"multi" => "Vielfarbig",
									"less" => "Farblos",
									"allcolor" => "Alle",
									"allrarity" => "Alle",
									"alltypes" => "Alle",
									"allsets" => "Alle",
									"allmana" => "Beliebig"
								);
}	
/**/	
	
echo"
<h2 class='pl'>$pagetitle_pl</h2>
<h2 class='en'>$pagetitle_en</h2>
<h2 class='de'>$pagetitle_de</h2>
";

?>
<link rel="stylesheet" href="css/mtg.css" type="text/css">	


<br>
<div id="Selling" class="tabcontent" onload='filterSelection("color","colorall")'>
<div class="row">



<div id="myBtnContainer">
	<div id="color">
		<span class="legend"><?=$mtgcardtext['color'];?></span>
		<button id='colorall' class="btn active" onclick="filterSelection('color','colorall')"><?=$mtgcardtext['allcolor'];?></button>
		
		<button id="ColorRed" class="btn" onclick="filterSelection('color','ColorRed')"><?=$mtgcardtext['red'];?></button>
		<button id="ColorWhite" class="btn" onclick="filterSelection('color','ColorWhite')"><?=$mtgcardtext['white'];?></button>
		<button id="ColorBlack" class="btn" onclick="filterSelection('color','ColorBlack')"><?=$mtgcardtext['black'];?></button>
		<button id="ColorGreen" class="btn" onclick="filterSelection('color','ColorGreen')"><?=$mtgcardtext['green'];?></button>
		<button id="ColorBlue" class="btn" onclick="filterSelection('color','ColorBlue')"><?=$mtgcardtext['blue'];?></button>
		<button id="Multicolor" class="btn" onclick="filterSelection('color','Multicolor')"><?=$mtgcardtext['multi'];?></button>
		<button id="Colorless" class="btn" onclick="filterSelection('color','Colorless')"><?=$mtgcardtext['less'];?></button>		
	</div>

	<div id="rarity">
		<span class="legend"><?=$mtgcardtext['rarity'];?></span>
		<button id='rarityall' class="btn active" onclick="filterSelection('rarity','rarityall')"><?=$mtgcardtext['allrarity'];?></button>
		<button id="RarityCommon" class="btn" onclick="filterSelection('rarity','RarityCommon')">Common</button>
		<button id="RarityUncommon" class="btn" onclick="filterSelection('rarity','RarityUncommon')">Uncommon</button>
		<button id="RarityRare" class="btn" onclick="filterSelection('rarity','RarityRare')">Rare</button>
		<button id="RarityMythic" class="btn" onclick="filterSelection('rarity','RarityMythic')">Mythic</button>	
	</div>

	<div id="type">
		<span class="legend"><?=$mtgcardtext['type'];?></span>
		<button id='typeall' class="btn active" onclick="filterSelection('type','typeall')"><?=$mtgcardtext['alltypes'];?></button>
		<button id="Artifact" class="btn" onclick="filterSelection('type','Artifact')">Artifact</button>
		<button id="Creature" class="btn" onclick="filterSelection('type','Creature')">Creature</button>
		<button id="Enchantment" class="btn" onclick="filterSelection('type','Enchantment')">Enchantment</button>
		<button id="Instant" class="btn" onclick="filterSelection('type','Instant')">Instant</button>
		<button id="Land" class="btn" onclick="filterSelection('type','Land')">Land</button>
		
		<button id="Sorcery" class="btn" onclick="filterSelection('type','Sorcery')">Sorcery</button>
	</div>

	<div id="set">
		<span class="legend"><?=$mtgcardtext['set'];?></span>
		<button id='setall' class="btn active" onclick="filterSelection('set','setall')"><?=$mtgcardtext['allsets'];?></button>
		<button id="Set2015" class="btn" onclick="filterSelection('set','Set2015')">2015</button>
		<button id="SetDominaria" class="btn" onclick="filterSelection('set','SetDominaria')">Dominaria</button>
		<button id="SetGuildsOfRavnica" class="btn" onclick="filterSelection('set','SetGuildsOfRavnica')">GuildsOfRavnica</button>
		<button id="SetRivalsOfIxalan" class="btn" onclick="filterSelection('set','SetRivalsOfIxalan')">RivalsOfIxalan</button>
	</div>
	<div id="cmc">
		<span class="legend"><?=$mtgcardtext['mana'];?></span>
		<button id='cmcall' class="btn active" onclick="filterSelection('cmc','cmcall')"><?=$mtgcardtext['allmana'];?></button>
		<button id="cmc0" class="btn" onclick="filterSelection('cmc','cmc0')">0	</button>
		<button id="cmc1" class="btn" onclick="filterSelection('cmc','cmc1')">1	</button>
		<button id="cmc2" class="btn" onclick="filterSelection('cmc','cmc2')">2	</button>
		<button id="cmc3" class="btn" onclick="filterSelection('cmc','cmc3')">3	</button>
		<button id="cmc4" class="btn" onclick="filterSelection('cmc','cmc4')">4	</button>
		<button id="cmc5" class="btn" onclick="filterSelection('cmc','cmc5')">5	</button>
		<button id="cmc6" class="btn" onclick="filterSelection('cmc','cmc6')">6	</button>
		<button id="cmc7" class="btn" onclick="filterSelection('cmc','cmc7')">7	</button>
		<button id="cmc8" class="btn" onclick="filterSelection('cmc','cmc8')">8	</button>
	</div>
</div>

<!-- Portfolio Gallery Grid -->
<div id="cardlist">

<!-- END GRID -->

<?php
	$tasks = mysqli_query($db, "SELECT * FROM mtg_portfolio  
	WHERE Edition <> 'SetRavnicaAllegiance'
	ORDER BY 
	Color desc,
	CMC desc,
	FIELD (Rarity,'RarityMythic','RarityRare','RarityUncommon','RarityCommon'),
	CardType,Name");
	
if (!$tasks) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
	}

	$i = 1; while ($row = mysqli_fetch_array($tasks)) { 
				$multiver=$row['MultiverseID'];
				$cardname=$row['Name'];
				$type=$row['CardType'];
				$rarity=$row['Rarity'];
				$cardtype=$row['CardType'];
				$cmc=$row['CMC'];
				$edition=$row['Edition'];
				$color=$row['Color'];

				echo "
				<div class='column $type $edition $color $cmc $rarity col-lg-3 col-md-3 col-sm-4 col-xs-6 card'>
						<img src='https://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=$multiver&type=card'><br>
						<a href='https://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=$multiver' target='_blank'>
						<span class='cardname'><big>$cardname </big>
						</a>
						</span>
				</div>
				"; 
$i++; }
?>



</div>
</div>
</div>



<script type="text/javascript" src="intern/jquery.quicksand.js"></script>

<script>
document.getElementById("colorall").click();
document.getElementById("rarityall").click();
document.getElementById("typeall").click();
document.getElementById("setall").click();
document.getElementById("cmcall").click();

var x = 5;

var filtrcolor	=	'colorall';
var filtrrarity	=	'rarityall';
var filtrtype	=	'typeall';
var filtrset	=	'setall';
var filtrcmc	=	'cmcall';



function filterSelection(filtertype,c) {


var btnContainer = document.getElementById(filtertype);
var btns = btnContainer.getElementsByClassName("btn");

for (i = 0; i < btns.length; i++) {
	funkcjaRemoveClass(btns[i], "active");
	
	
}
var activebtn = document.getElementById(c);
funkcjaAddClass(activebtn, "active");

if (filtertype=='color')	filtrcolor=c;
if (filtertype=='rarity')	filtrrarity=c;
if (filtertype=='type')	filtrtype=c;
if (filtertype=='set')	filtrset=c;
if (filtertype=='cmc')	filtrcmc=c;
filterFinal();
}

function filterFinal() {
  var x, i;
  x = document.getElementsByClassName("column");
  
  //=======================
  

   for (i = 0; i < x.length; i++) {
	funkcjaRemoveClass(x[i], "show");
		var isshown='true';
		
	  if ((x[i].className.indexOf(filtrcolor) == -1) && (filtrcolor!='colorall'))   isshown='false';
	  if ((x[i].className.indexOf(filtrrarity) == -1) && (filtrrarity!='rarityall'))   isshown='false';
	  if ((x[i].className.indexOf(filtrtype) == -1) && (filtrtype!='typeall'))   isshown='false';
	  if ((x[i].className.indexOf(filtrset) == -1) && (filtrset!='setall'))   isshown='false';
	  if ((x[i].className.indexOf(filtrcmc) == -1) && (filtrcmc!='cmcall'))   isshown='false';
		
		if (isshown === 'true') funkcjaAddClass(x[i], "show");
	  }

}


function funkcjaAddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}


function funkcjaRemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
</script>
