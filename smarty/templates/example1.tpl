<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 1</title>

    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <script type="text/javascript" src="script/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="script/example1.js"></script>
</head>
<body>

<h1>Example 1 - some fun with AJAX</h1>
{if isset($subTitle)}
<h2>{$subTitle}</h2>
{/if}
<div class="formContainer">
	<form name="input" action="?" method="get">
		Username: <input id="userName" type="text" name="user" />
		<input id="submit" type="button" value="Submit" />
	</form>
</div>

<div id="ajaxResultContainer">
	Content goes here!
</div>

</body>
</html>