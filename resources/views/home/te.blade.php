<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@foreach ($carts as $cart)
		<p>{{$cart->id}}</p>
		<p>{{$cart->name}}</p>
		<p>{{$cart->slug}}</p>
	@endforeach
	<p></p>
</body>
</html>