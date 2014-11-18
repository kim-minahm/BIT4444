function validate_order(){
	console.log("Fucking a");
	//use getelementid
	//firebug
	var cust = document.getElementById("customer").value;
	var ord  = document.getElementById("orderstatus").value;
	var sale = document.getElementById("salesagent").value;
	//check if filled
	if (cust == null || cust == "") {//numeric
        alert("Customer Number name must be filled out");
        return false;
    }
	if (ord == null || ord == "") {//numeric
        alert("Order Status must be filled out");
        return false;
    }
	if (sale == null || sale == "") {//numeric
        alert("First name must be filled out");
        return false;
    }
	//check if correct data type
	if(cust === parseInt(cust,10)){
		alert("Customer must be a numeric value");
		return false;
	}
	if(ord === parseInt(ord,10)){
		alert("order number must be a numeric value");
		return false;
	}
	if(sale === parseInt(sale,10)){
		alert("sales agent must be a numeric value");
		return false;
	}
	return true;
}

function validate_customer(){
	var region = document.getElementById("id").value;
	var company = document.getElementById("company").value;
	var lname = document.getElementById("lname").value;
	var fname = document.getElementById("fname").value;
	var address = document.getElementById("addr").value;
	var city = document.getElementById("city").value;
	var state = document.getElementById("state").value;
	var zip = document.getElementById("zip").value;
	var phone = document.getElementById("phone").value;
	var fax = document.getElementById("fax").value;
	var email = document.getElementById("email").value;
}