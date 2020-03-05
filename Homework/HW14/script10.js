window.onload = initForms;

function clearform() {
	window.location = "index.php";
}

function selectLO() {
	document.getElementById("residence2").checked="checked";
}

function initForms() {
	for (var i=0; i< document.forms.length; i++) {
		document.forms[i].onsubmit = function() {return validForm();}
	}

}

function validForm() {
	var allGood = true;
	var allTags = document.getElementsByTagName("*");

	for (var i=0; i<allTags.length; i++) {
		if (!validTag(allTags[i])) {
			allGood = false;
		}
	}
	return allGood;

	function validTag(thisTag) {
		var outClass = "";
		var allClasses = thisTag.className.split(" ");
	
		for (var j=0; j<allClasses.length; j++) {
			outClass += validBasedOnClass(allClasses[j]) + " ";
		}
	
		thisTag.className = outClass;
	
		if (outClass.indexOf("invalid") > -1) {
			invalidLabel(thisTag.parentNode);
			thisTag.focus();
			if (thisTag.nodeName == "INPUT") {
				thisTag.select();
			}
			return false;
		}
		return true;
		
		function validBasedOnClass(thisClass) {
			var classBack = "";
		
			switch(thisClass) {
				case "":
				case "invalid":
					break;
				case "reqd":
					if (allGood && thisTag.value == "") {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "radio":
					if (allGood && !radioPicked(thisTag.name)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "isNum":
					if (allGood && !isNum(thisTag.value)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "isState":
					if (allGood && !isState(thisTag.value)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "isZip":
					if (allGood && !isZip(thisTag.value)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "isCell":
					if (allGood && !isCell(thisTag.value)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "email":
					if (allGood && !validEmail(thisTag.value)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				case "email2":
					if (allGood && !validEmail2(thisTag.value, allTags[i-3].value)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
					break;
				default:
					if (allGood && !crossCheck(thisTag,thisClass)) {
						classBack = "invalid ";
					}
					classBack += thisClass;
			}
			return classBack;
		}
				
		function crossCheck(inTag,otherFieldID) {
			if (!document.getElementById(otherFieldID)) {


				return false;
			}
								//alert("Cross check: " + inTag.value + " versus " );
			return (inTag.value == document.getElementById(otherFieldID).value);
		}
		
		function radioPicked(radioName) {
			var radioSet = "";

			for (var k=0; k<document.forms.length; k++) {
				if (!radioSet) {
					radioSet = document.forms[k][radioName];
				}
			}
			if (!radioSet) {
				return false;
			}
			for (k=0; k<radioSet.length; k++) {
				if (radioSet[k].checked) {
					return true;
				}
			}
			return false;
		}
		
		function isState(inState) {
			switch(inState) {
				case "AL":
					return true;
				case "AK":
					return true;
				case "AS":
					return true;
				case "AZ":
					return true;
				case "AR":
					return true;
				case "CA":
					return true;
				case "CO":
					return true;
				case "CT":
					return true;
				case "DE":
					return true;
				case "DC":
					return true;
				case "FM":
					return true;
				case "FL":
					return true;
				case "GA":
					return true;
				case "GU":
					return true;
				case "HI":
					return true;
				case "ID":
					return true;
				case "UK":
					return true;
				case "IN":
					return true;
				case "IA":
					return true;
				case "KS":
					return true;
				case "KY":
					return true;
				case "LA":
					return true;
				case "ME":
					return true;
				case "MH":
					return true;
				case "MD":
					return true;
				case "MA":
					return true;
				case "MI":
					return true;
				case "MN":
					return true;
				case "MS":
					return true;
				case "MO":
					return true;
				case "MT":
					return true;
				case "NE":
					return true;
				case "NV":
					return true;
				case "NH":
					return true;
				case "NJ":
					return true;
				case "NM":
					return true;
				case "NY":
					return true;
				case "NC":
					return true;
				case "ND":
					return true;
				case "MP":
					return true;
				case "OH":
					return true;
				case "OK":
					return true;
				case "OR":
					return true;
				case "PW":
					return true;
				case "PA":
					return true;
				case "PR":
					return true;
				case "RI":
					return true;
				case "SC":
					return true;
				case "SD":
					return true;
				case "TN":
					return true;
				case "TX":
					return true;
				case "UT":
					return true;
				case "VT":
					return true;
				case "VI":
					return true;
				case "VA":
					return true;
				case "WA":
					return true;
				case "WV":
					return true;
				case "WI":
					return true;
				case "WY":
					return true;
				case "AE":
					return true;
				case "AA":
					return true;
				case "AP":
					return true;
			}
			return false;
		}

		function isNum(passedVal) {
			if (passedVal == "") {
				return false;
			}
			for (var k=0; k<passedVal.length; k++) {
				if (passedVal.charAt(k) < "0") {
					return false;
				}
				if (passedVal.charAt(k) > "9") {
					return false;
				}
			}
			return true;
		}
		
		function isZip(inZip) {
			if (isNum(inZip)) {
				if (inZip.length == 5) {
					return true;
				}
			}
			return false;
		}

		function isCell(inCell) {
			if (isNum(inCell)) {
				if (inCell.length == 10) {
					return true;
				}
			}
			return false;
		}
		
		function validEmail(email) {
			var invalidChars = " /:,;";
		
			if (email == "") {
				return false;
			}
			for (var k=0; k<invalidChars.length; k++) {
				var badChar = invalidChars.charAt(k);
				if (email.indexOf(badChar) > -1) {
					return false;
				}
			}
			var atPos = email.indexOf("@",1);
			if (atPos == -1) {
				return false;
			}
			if (email.indexOf("@",atPos+1) != -1) {
				return false;
			}
			var periodPos = email.indexOf(".",atPos);
			if (periodPos == -1) {	
				return false;
			}
			if (periodPos+3 > email.length)	{
				return false;
			}
			return true;
		}

		function validEmail2(email, email2) {
			if (email == email2) {
				return true;
			}
			return false;
		}
		
		function invalidLabel(parentTag) {
			if (parentTag.nodeName == "LABEL") {
				parentTag.className += " invalid";
			}
		}
	}
}


