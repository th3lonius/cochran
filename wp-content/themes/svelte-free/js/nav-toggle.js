// Mobile Navigation: Menu Button
function toggleNav() {
	var ele = document.getElementById("toggle-mobile-navigation");
	var text = document.getElementById("mobile-nav-button-link");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
}

// Mobile Navigation: Search Button
function toggleNavSearch() {
	var ele = document.getElementById("toggle-search-navigation");
	var text = document.getElementById("mobile-search-button-link");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
}

