function searchDate(account, date){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        document.getElementById("transactions").innerHTML = this.responseText;
	    }
	};
	xmlhttp.open("GET", "/laravel/banking/resources/views/search/date.blade.php?account="+account+"&date="+date, true);
	xmlhttp.send();
}