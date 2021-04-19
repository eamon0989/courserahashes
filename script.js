const btn = document.getElementById("reset");
btn.addEventListener("click", function () {
	document.location.href = "index.php";
});

document.getElementById("submitPin").onclick = function showMd5() {
	pinToHash = document.getElementById("insertPin").value; //takes input
	containsSymbols = /[^a-z,0-9,A-Z]/.test(pinToHash); // checks if contains symbols
	result = MD5(pinToHash); // converts pin inputed to hash
	if (pinToHash.length == 4 && containsSymbols == false) {
		// if pin == 4 char and !contain sybmols, show next step
		document.getElementById("container").style.display = "none";
		document.getElementById("showHash").innerHTML = result;
		document.getElementById("container2").style.display = "block";
	} else {
		document.getElementById("onlyFour").style.display = "block"; // if input !contain 4 char, show warning
		if (containsSymbols == true) {
			document.getElementById("noSymbols").style.display = "block"; // if input contains symbols, show warning
		}
	}
};
