
<?php include "model.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lab 10</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


	<style>

		.err-message {
			color: red;
		}

		td, th, tr {
			text-align: center;
		}

	</style>

</head>
<body>


	<div class="container py-5">
		
		<h1 class="text-center">Welcome</h1>
		<h3 class="mt-5 mb-4" style="border-bottom: 1px solid black;">Add Data</h3>

		<div class="row" id="insert-form">
			<div class="col-lg-7 col-md-8 col-sm-9">
				<form>
					<div class="form-group">
						<label for="id" class="mb-2 mr-sm-2">Id:</label>
						<input type="text" class="form-control mb-1 mr-sm-2" v-model="id" id="id" name="id" placeholder="Enter Id">
					</div>
					<div class="form-group">
						<label for="name" class="mb-2 mr-sm-2">Name:</label>
						<input type="text" class="form-control mb-1 mr-sm-2" v-model="name" id="name" name="name" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label for="year" class="mb-2 mr-sm-2">Year:</label>
						<input type="text" class="form-control mb-1 mr-sm-2" v-model="year" id="year" name="year" placeholder="Enter Year">
					</div>
					<button class="btn btn-primary form-control mb-2" @click.prevent="insertData">Add</button>
				</form>
			</div>
		</div>
		
	  	<h3>Table Data</h3>

	  	<table class="table table-striped" id="cars">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Name</th>
		        <th>Year</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="tbody">
		    	<tr v-for="(value, key) in cars" :key="value.id">
		    		<td>{{value.id}}</td>
		    		<td>{{value.name}}</td>
		    		<td>{{value.year}}</td>
		    		<td>
		    			<button @click="deleteCar(key)">delete</button>
		    			<button @click="selectCar(key)" class="myBtn">update</button>
		    		</td>
		    	</tr>
		    </tbody>
		</table>

	</div>

	<!-- The Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Modal Heading</h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
				  	<div class="container py-5">

						<div class="row" id="car-info">
							<div class="col-lg-7 col-md-8 col-sm-9">
								<div class="form-group">
									<p for="email2" class="mb-2 mr-sm-2" id="modal-id">Id: {{id}}</p>
								</div>
								<div class="form-group">
									<label for="pwd2" class="mb-2 mr-sm-2">Name:</label>
									<input type="text" class="form-control mb-1 mr-sm-2" v-model="name" id="modal-name" name="name"  placeholder="Enter Name">
								</div>
								<div class="form-group">
									<label for="pwd2" class="mb-2 mr-sm-2">Year:</label>
									<input type="text" class="form-control mb-1 mr-sm-2" id="modal-year" v-model="year" name="year" placeholder="Enter Year">
								</div>
								<button class="btn btn-primary form-control mb-2" @click="updateCar()">Save</button>
						</div>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
				  	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$(".myBtn").click(function(){
				$("#myModal").modal();
			});
		});
	</script>

	<script src="main.js"></script>

</body>
</html>