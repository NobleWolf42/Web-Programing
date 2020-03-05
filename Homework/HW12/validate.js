// JavaScript Document
function isNumber(obj) {
	return !isNaN(parseFloat(obj));
}

function moveOK(loc,proposed) {
	alert("Loc: " + loc + " Former: " + myBoard[loc] + " New: " + proposed);
	var ok = true; // until proven guilty
	var row = 0;
	var collum = 0;
	if (!isNumber(proposed)) {
		ok = false;
		alert("You did not enter a number, Try a number between 1 and 9.");
	}
	else if (proposed < 1) {
		ok = false;
		alert("The number you entered was too low, Try a number between 1 and 9.");
	}
	else if (proposed > 9) {
		ok = false;
		alert("The number you entered was too hig, Try a number between 1 and 9.");
	}
	if (myBoard[loc] != 0) {
		ok = false;
		alert("The spot you tried to place a number in was alredy used, Try different spot.");
	}
	if (loc < 9) {
		sectionrow = 1;
		row = 1;
		collum = loc + 1;
		var collumarray = [myBoard[loc + 9], myBoard[loc + 18], myBoard[loc + 27], myBoard[loc + 36], myBoard[loc + 45], myBoard[loc + 54], myBoard[loc + 63], myBoard[loc + 72]];
	}
	else if (loc < 18) {
		sectionrow = 1;
		row = 2;
		collum = loc + 1 - 9;
		var collumarray = [myBoard[loc + 9], myBoard[loc + 18], myBoard[loc + 27], myBoard[loc + 36], myBoard[loc + 45], myBoard[loc + 54], myBoard[loc + 63], myBoard[loc - 9]];
	}
	else if (loc < 27) {
		sectionrow = 1;
		row = 3;
		collum = loc + 1 - 18;
		var collumarray = [myBoard[loc + 9], myBoard[loc + 18], myBoard[loc + 27], myBoard[loc + 36], myBoard[loc + 45], myBoard[loc + 54], myBoard[loc - 18], myBoard[loc - 9]];
	}
	else if (loc < 36) {
		sectionrow = 2;
		row = 4;
		collum = loc + 1 - 27;
		var collumarray = [myBoard[loc + 9], myBoard[loc + 18], myBoard[loc + 27], myBoard[loc + 36], myBoard[loc + 45], myBoard[loc - 27], myBoard[loc - 18], myBoard[loc - 9]];
	}
	else if (loc < 45) {
		sectionrow = 2;
		row = 5;
		collum = loc + 1 - 36;
		var collumarray = [myBoard[loc + 9], myBoard[loc + 18], myBoard[loc + 27], myBoard[loc + 36], myBoard[loc - 36], myBoard[loc - 27], myBoard[loc - 18], myBoard[loc - 9]];
	}
	else if (loc < 54) {
		sectionrow = 2;
		row = 6;
		collum = loc + 1 - 45;
		var collumarray = [myBoard[loc + 9], myBoard[loc + 18], myBoard[loc + 27], myBoard[loc - 45], myBoard[loc - 36], myBoard[loc - 27], myBoard[loc - 18], myBoard[loc - 9]];
	}
	else if (loc < 63) {
		sectionrow = 3;
		row = 7;
		collum = loc + 1 - 54;
		var collumarray = [myBoard[loc + 9], myBoard[loc + 18], myBoard[loc - 54], myBoard[loc - 45], myBoard[loc - 36], myBoard[loc - 27], myBoard[loc - 18], myBoard[loc - 9]];
	}
	else if (loc < 72) {
		sectionrow = 3;
		row = 8;
		collum = loc + 1 - 63;
		var collumarray = [myBoard[loc + 9], myBoard[loc - 63], myBoard[loc - 54], myBoard[loc - 45], myBoard[loc - 36], myBoard[loc - 27], myBoard[loc - 18], myBoard[loc - 9]];
	}
	else {
		sectionrow = 3;
		row = 9;
		collum = loc + 1 - 72;
		var collumarray = [myBoard[loc - 72], myBoard[loc - 63], myBoard[loc - 54], myBoard[loc - 45], myBoard[loc - 36], myBoard[loc - 27], myBoard[loc - 18], myBoard[loc - 9]];
	}
	if (collum == 1) {
		sectioncollum = 1;
		var rowarray = [myBoard[loc + 1],myBoard[loc + 2], myBoard[loc + 3], myBoard[loc + 4], myBoard[loc + 5], myBoard[loc + 6], myBoard[loc + 7], myBoard[loc + 8]];
	}
	else if (collum == 2) {
		sectioncollum = 1;
		var rowarray = [myBoard[loc + 1],myBoard[loc + 2], myBoard[loc + 3], myBoard[loc + 4], myBoard[loc + 5], myBoard[loc + 6], myBoard[loc + 7], myBoard[loc - 1]];
	}
	else if (collum == 3) {
		sectioncollum = 1;
		var rowarray = [myBoard[loc + 1],myBoard[loc + 2], myBoard[loc + 3], myBoard[loc + 4], myBoard[loc + 5], myBoard[loc + 6], myBoard[loc - 2], myBoard[loc - 1]];
	}
	else if (collum == 4) {
		sectioncollum = 2;
		var rowarray = [myBoard[loc + 1],myBoard[loc + 2], myBoard[loc + 3], myBoard[loc + 4], myBoard[loc + 5], myBoard[loc - 3], myBoard[loc - 2], myBoard[loc - 1]];
	}
	else if (collum == 5) {
		sectioncollum = 2;
		var rowarray = [myBoard[loc + 1],myBoard[loc + 2], myBoard[loc + 3], myBoard[loc + 4], myBoard[loc - 4], myBoard[loc - 3], myBoard[loc - 2], myBoard[loc - 1]];
	}
	else if (collum == 6) {
		sectioncollum = 2;
		var rowarray = [myBoard[loc + 1],myBoard[loc + 2], myBoard[loc + 3], myBoard[loc - 5], myBoard[loc - 4], myBoard[loc - 3], myBoard[loc - 2], myBoard[loc - 1]];
	}
	else if (collum == 7) {
		sectioncollum = 3;
		var rowarray = [myBoard[loc + 1],myBoard[loc + 2], myBoard[loc - 6], myBoard[loc - 5], myBoard[loc - 4], myBoard[loc - 3], myBoard[loc - 2], myBoard[loc - 1]];
	}
	else if (collum == 8) {
		sectioncollum = 3;
		var rowarray = [myBoard[loc + 1],myBoard[loc - 7], myBoard[loc - 6], myBoard[loc - 5], myBoard[loc - 4], myBoard[loc - 3], myBoard[loc - 2], myBoard[loc - 1]];
	}
	else {
		sectioncollum = 3;
		var rowarray = [myBoard[loc - 8],myBoard[loc - 7], myBoard[loc - 6], myBoard[loc - 5], myBoard[loc - 4], myBoard[loc - 3], myBoard[loc - 2], myBoard[loc - 1]];
	}
	if (sectioncollum == 1 && sectionrow == 1) {
		var sectionarray = [myBoard[0], myBoard[1], myBoard[2],
	 						myBoard[9], myBoard[10], myBoard[11],
	 						myBoard[18], myBoard[19], myBoard[20]];
	}
	else if (sectioncollum == 2 && sectionrow == 1) {
		var sectionarray = [myBoard[3], myBoard[4], myBoard[5],
	 						myBoard[12], myBoard[13], myBoard[14],
	 						myBoard[21], myBoard[22], myBoard[23]];
	}
	else if (sectioncollum == 3 && sectionrow == 1) {
		var sectionarray = [myBoard[6], myBoard[7], myBoard[8],
	 						myBoard[15], myBoard[16], myBoard[17],
	 						myBoard[24], myBoard[25], myBoard[26]];
	}
	else if (sectioncollum == 1 && sectionrow == 2) {
		var sectionarray = [myBoard[27], myBoard[28], myBoard[29],
	 						myBoard[36], myBoard[37], myBoard[38],
	 						myBoard[45], myBoard[46], myBoard[47]];
	}
	else if (sectioncollum == 2 && sectionrow == 2) {
		var sectionarray = [myBoard[30], myBoard[31], myBoard[32],
	 						myBoard[39], myBoard[40], myBoard[41],
	 						myBoard[48], myBoard[49], myBoard[50]];
	}
	else if (sectioncollum == 3 && sectionrow == 2) {
		var sectionarray = [myBoard[33], myBoard[34], myBoard[35],
	 						myBoard[42], myBoard[43], myBoard[44],
	 						myBoard[51], myBoard[52], myBoard[53]];
	}
	else if (sectioncollum == 1 && sectionrow == 3) {
		var sectionarray = [myBoard[54], myBoard[55], myBoard[56],
	 						myBoard[63], myBoard[64], myBoard[65],
	 						myBoard[72], myBoard[73], myBoard[74]];
	}
	else if (sectioncollum == 2 && sectionrow == 3) {
		var sectionarray = [myBoard[57], myBoard[58], myBoard[59],
	 						myBoard[66], myBoard[67], myBoard[68],
	 						myBoard[75], myBoard[76], myBoard[77]];
	}
	else if (sectioncollum == 3 && sectionrow == 3) {
		var sectionarray = [myBoard[60], myBoard[61], myBoard[62],
	 						myBoard[69], myBoard[70], myBoard[71],
	 						myBoard[78], myBoard[79], myBoard[80]];
	}
	function rowcheck(item) {
		if (proposed == item) {
			ok = false;
			alert("The number is alredy used in this row, Try a different number between 1 and 9.");
		}
	}
	function collumcheck(item) {
		if (proposed == item) {
			ok = false;
			alert("The number is alredy used in this collum, Try a different number between 1 and 9.");
		}
	}
	function sectioncheck(item) {
		if (proposed == item) {
			ok = false;
			alert("The number is alredy used in this section, Try a different number between 1 and 9.");
		}
	}
	for (x in rowarray) {
    	rowcheck(rowarray[x]);
	}
	for (x in collumarray) {
    	collumcheck(collumarray[x]);
	}
	for (x in sectionarray) {
    	sectioncheck(sectionarray[x]);
	}
	return ok;
}
