@extends('layouts.library')

@section('content')
<!-- Start of Content -->
<div class="container">
	<h2>Toy Management</h2>
	<div class="row">		
		<div class="col-lg-11 col-lg-offset-1">
			<form action="store" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
			<table>
				<tr>
					<td><label for="name">Name: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td><label for="description">Description: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td><label for="brand">Brand: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="brand"></td>
				</tr>
				<tr>
					<td><label for="age_group_id">Age Group ID: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="age_group_id"></td>
				</tr>
				<tr>
					<td><label for="toy_group_id">Toy Group ID: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="toy_group_id"></td>
				</tr>
				<tr>
					<td><label for="loan_type_id">Loan Type ID: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="loan_type_id"></td>
				</tr>
				<tr>
					<td><label for="image">Image: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="file" name="image"></td>
				</tr>
				<tr>
					<td><label for="shelf">Shelf: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="shelf"></td>
				</tr>
				<tr>
					<td><label for="quantity">Quantity: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="quantity"></td>
				</tr>
				<tr>
					<td><label for="purchased_date">Purchased Date: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="purchased_date"></td>
				</tr>
				<tr>
					<td><label for="purchased_from">Purchased From: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="purchased_from"></td>
				</tr>
				<tr>
					<td><label for="purchased_price">Purchased Price: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="purchased_price"></td>
				</tr>
				<tr>
					<td><label for="donated_by">Donated By: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="donated_by"></td>
				</tr>
				<tr>
					<td><label for="note">Note: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="note"></td>
				</tr>
				<tr>
					<td><label for="alert">Alert: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="alert"></td>
				</tr>
				<tr>
					<td><label for="status">Status: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="status"></td>
				</tr>
				<tr>
					<td><label for="linked_toys">Linked Toys: </label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><input type="text" name="linked_toys"></td>
				</tr>
				</table>
				<div>
					<input class="btn btn-success" type="submit" name="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection