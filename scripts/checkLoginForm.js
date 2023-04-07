function ifEmptyTurnRed() {
	console.log("Checking for fields");
	var elementList = document.getElementsByTagName("input");
	var message = document.getElementById("message");
	//elementList.append(document.getElementsByTagName("textarea"));
	var oneisEmpty = false;
	for (var i = 0; i < elementList.length; i++){
		var element = elementList[i];
		if (element.value == "" || element.value == null) {
			element.style.backgroundColor = "red";
			oneisEmpty = true;
		} else {
			element.style.backgroundColor = "#EBF4FB";
		}
	}

	

	
}

document.getElementsByName("mainForm").onsubmit = function (e){
	var isValid = ifEmptyTurnRed();

	if (!isValid) {
		e.preventDefault();
		console.log("Form is invalid");
	} else {
		console.log("Form is valid");
	}
}