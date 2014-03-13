<?
	// parameter from input url
	$url = $_REQUEST['s'];
	$welcome = false;
	if (empty($url)){
		$url = 'intro.php';
		$welcome = true;	
	}

?>
<!DOCTYPE html>
<head>
<style type='text/css'>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-family: "Arial Narrow", Arial, sans-serif;
	vertical-align: baseline;
	text-align: center;

}

html{}

body{
	height: 100%;
	width: 100%;
	overflow: hidden;
}

#header{
	padding-top: 10px;
	height: 110px;
	overflow: hidden;
	border-bottom: 2px solid orange;
	min-width: 1090px;
}

#header div{
	display: inline-block;
}

#donate{
	position: relative;
	margin-left: 20px;
}

#input{
	width: 550px;
	font-size: 15px;
	border: 2px solid orange;
	box-shadow: 2px 2px grey;
	margin: 7px;
}

#submit{
	width: 100px;
	font-family: "Arial Narrow", Arial, sans-serif;
	font-size: 20px;
	border: 2px solid orange;
	border-radius: 5px;
	box-shadow: 2px 2px grey;
	padding: 1px;
}

#submit:hover{
	cursor:pointer;
	background-color: #F9F1A8;
}

#donateA{
	display: inline-block;
	font-size: 15px;
	width: 55px;
	height: 100px;
	word-wrap: break-word;
	font-family: monospace;
	text-align: justify;
}

#title{
	margin-left: 20px;
	text-align: right;
}

#title1{
	text-align:center;
}

#target{
	display: block;
	width:100%;
}

#about{
	font-size: 20px;
	color: orange;
	position: absolute;
	top: 10px;
	left: 10px;
}

#about:hover{
	cursor: pointer;
	background-color: #F9F1A8;
}


</style>
	<title>This is actually good news!</title>
</head>
<body>
	<div id="header">
		<div id="about" onclick="gotoIntro()">
			<i>(about)</i>
		</div>	
		<div id="logo">
			<img src="btclogo.png">
		</div>	
		<div id="title">
			<h1 id="title1">This is actually good news!</h1>
				Enter bad news &#8594;&nbsp;<input type="text" id="input" value="<?= ($welcome ? '' : $url) ?>" onkeydown="if (event.keyCode == 13){opto();}"></input><br>
				Click here &#8594;&nbsp;<div id="submit" onclick="opto()">Optimisticize!</div>
		</div>
		<div id="donate">		
			<a href="bitcoin://163Ky9GqH13EoCET5T7N9L5FBAQJm9aocj"><img src="goodnews.png"></a>
			<div id="donateA">163Ky9GqH13EoCET5T7N9L5FBAQJm9aocj</div>
		</div>
	</div>
	
<script type="text/javascript">
	function opto(){
		var url = document.getElementById('input').value;
		if (url.indexOf("http://") == -1)
			url = "http://" + url;
		document.getElementById('target').src = "getgoodnews.php?s=" + url;
	}
	
	function gotoIntro(){
		document.getElementById('target').src = "intro.php";
	}
</script>
	
	<iframe id="target" src="<?= ($welcome ? 'intro.php' : 'getgoodnews.php?s=' . $url) ?>" width="100%" height="100%">
	</iframe>
</body>
</html>