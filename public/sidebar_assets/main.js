function w3_open() {
	document.getElementById("mySidebar").style.display = "block";
  }
  
  function w3_close() {
	document.getElementById("mySidebar").style.display = "none";
  }

  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for ( i = 0; i < dropdown.length; i++) {
	dropdown[i].addEventListener('click',function(){
		this.classList.toggle("active");
		var dropdownContent = this.nextElementSibling;
		if(dropdownContent.style.display === "block"){
			dropdownContent.style.display = "none";
		}else{
			dropdownContent.style.display = "block";
		}
	});
	
  }