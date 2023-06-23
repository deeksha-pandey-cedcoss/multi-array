<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
   input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

label {
	cursor: pointer;
	text-indent: -9999px;
	width: 200px;
	height: 100px;
	background: grey;
	display: block;
	border-radius: 100px;
	position: relative;
}

label:after {
	content: '';
	position: absolute;
	top: 5px;
	left: 5px;
	width: 90px;
	height: 90px;
	background: #fff;
	border-radius: 90px;
	transition: 0.3s;
}

input:checked + label {
	background: Brown;
}

input:checked + label:after {
	left: calc(100% - 5px);
	transform: translateX(-100%);
}

label:active:after {
	width: 130px;
}

body {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}
  </style>
</head>

<body>
<input type="checkbox" id="switch" checked="on"/><label for="switch">Toggle</label>
</body>
<script src="./js/main.js"></script>
<script>

  </script>
</html>