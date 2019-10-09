<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.main
{
	background-color: #00FFFF;
}
.content
{
	width: 400px; 
	float:left;
}
.info
{
	width: 400px; 
	float:left; 
	margin-top: 10px;
}
.order 
{
  border-collapse: collapse;
  border: 1px solid black;
  table-layout: auto;
  width: 70%;
} 
th,td 
{
  border: 1px solid black;
  text-align: center;
}
</style>
</head>
<body>
	<div class="main">
		<div class="content">
			<h5>THANK YOU FOR YOUR ORDER FROM MY SHOPPING CART</h5>
			<p>Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.</p>
		</div>
		<div class="info">
			<p>Call Us: +91 - 22 - 40500699</p>
			<p>Email: info@shoppingcompany.com</p>
		</div>
	</div><br>
	<h3>YOUR ORDER#</h3>
	<table class="order">
		<tr>
			<th>SR No</th>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
		@foreach($productDetails['userOrders'] as $product)
		<tr>
			<td>{{ $product['order_id'] }}</td>
			<td>{{ $product['product_name'] }}</td>
			<td>{{ $product['product_quantity'] }}</td>
			<td>{{ $product['product_price'] }}</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="3" align="right">Shipping Charges</td>
			<td>{{ $productDetails['shipping_charges'] }}</td>
		</tr>
		<tr>
			<td colspan="3" align="right">Coupon Discount</td>
			<td>{{ $productDetails['coupon_amount'] }}</td>
		</tr>
		<tr>
			<td colspan="3" align="right">Grand Total</td>
			<td>&#8377;{{ $productDetails['grand_total'] }}</td>
		</tr>
	</table>
	<br>
	<h4>BILL TO</h4>
	<table class="order">
		<tr>
			<th>User Address</th>
			<td>{{ $userDetails['address'] }},{{ $userDetails['city'] }},{{ $userDetails['state'] }},{{ $userDetails['country'] }},{{ $userDetails['pincode'] }}</td>
		</tr>
		<tr>
			<th>Billing Address</th>
			<td>{{ $userDetails['address'] }},{{ $userDetails['city'] }},{{ $userDetails['state'] }},{{ $userDetails['country'] }},{{ $userDetails['pincode'] }}</td>
		</tr>
		<tr>
			<th>Shipping Address</th>
			<td>{{ $userDetails['address'] }},{{ $userDetails['city'] }},{{ $userDetails['state'] }},{{ $userDetails['country'] }},{{ $userDetails['pincode'] }}</td>
		</tr>
	</table>
	<br>
	<h6>PAYMENT METHOD</h6>
	<p>{{ $paymentmethod }}</p>
	</div>
	<p>
		When you log in to your account, you will be able to do the following:
		<ul>
			<li>Proceed through checkout faster when making a purchase</li>
			<li>Check the status of orders</li>
			<li>View past orders</li>
			<li>Make changes to your account information</li>
			<li>Change your password</li>
			<li>Store alternative addresses (for shipping to multiple family members and friends!)</li>
		</ul>
		<p>If you have any questions, please feel free to contact us at info@shoppingcompany.com or by phone at +91 –22-40500699.</p>
	</p>

</body>
</html>