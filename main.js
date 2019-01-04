var cars = new Vue({
	el: "#cars",
	data: {
		cars: []
	},
	watch: {
		cars: function () {
			//alert("insert successfull!!!");
		}
	},
	created: function () {
		this.cars = this.getCars()
	},
	methods: {
		getCars() {
			self = this
			$.get("http://localhost:8080/lab10_DuongHoaiPhong_1512432/lab10/get-cars.php", function(data, status){
			    self.cars = JSON.parse(data)
			})
		},
		deleteCar(ind) {
			self = this
			$.get(
				"http://localhost:8080/lab10_DuongHoaiPhong_1512432/lab10/delete-car.php?id=" + this.cars[ind].id,
				function(data, status){
			    if (data == 1) {
			    	alert("delete successfull!!!")
			    	self.cars.splice(ind, 1);
			    }
			})
		},
		selectCar(ind) {
			carInfo.id = this.cars[ind].id
			carInfo.name = this.cars[ind].name;
			carInfo.year = this.cars[ind].year;
			carInfo.ind = ind
		}
	}
});

var carInfo = new Vue({
	el: "#car-info",
	data: {
		ind: -1,
		id: '',
		name: '',
		year: 0
	},
	methods: {
		updateCar() {
			self = this
			$.post("http://localhost:8080/lab10_DuongHoaiPhong_1512432/lab10/edit-car.php",
			    {
			    	id: self.id,
			    	name: self.name,
			    	year: self.year
			    },
			    function(data,status){
			    	if (data == 1) {
			    		alert("update successfull!!!")
			    		cars.cars[self.ind] = {
					    	id: self.id,
					    	name: self.name,
					    	year: self.year
					    };
					    cars.$forceUpdate()
			    	} else {
			    		alert("update false!!!")
			    	}
			  	}
			)
		}
	},
});

var insertForm = new Vue({
	el: "#insert-form",
	data: {
		id: '',
		name: '',
		year: 1992
	},
	methods: {
		insertData() {
			var sendData = {
			      id: this.id,
			      name: this.name,
			      year: this.year
			    };
			$.post("http://localhost:8080/lab10_DuongHoaiPhong_1512432/lab10/add-car.php",
			    sendData,
			    function(data,status){
			    	if (data == 1) {
			    		cars.cars.push(sendData);
			    		alert("insert successfull!!!")
			    	} else {
			    		alert("insert false!!!")
			    	}
			  	}
			)
		}
	}
})

