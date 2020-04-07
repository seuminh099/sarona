function triggerClick(){
	document.querySelector('#image').Click();
}

function displayimage(e){
	if(e.files[0]){
		var reader = new  FileReader();

		reader.onload = function(e){
			document.querySelector('#display').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}


//script form update category image
        function triggerClick(){
            document.querySelector('#newimg').Click();
        }

        function displayimg(e){
            if(e.files[0]){
                var reader = new  FileReader();

                reader.onload = function(e){
                    document.querySelector('#imgcat').setAttribute('src',e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
        //script form update category image



//add staff
function triggerClick(){
	document.querySelector('#imagestaff').Click();
}

function displayimagestaff(e){
	if(e.files[0]){
		var reader = new  FileReader();

		reader.onload = function(e){
			document.querySelector('#displaystaff').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}

//add customer
function triggerClick(){
	document.querySelector('#imagecus').Click();
}

function displayimagecustomer(e){
	if(e.files[0]){
		var reader = new  FileReader();

		reader.onload = function(e){
			document.querySelector('#displaycus').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}

//add product
function triggerClick(){
	document.querySelector('#imagepro').Click();
}

function displayimagepro(e){
	if(e.files[0]){
		var reader = new  FileReader();

		reader.onload = function(e){
			document.querySelector('#displaypro').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}

//add supplier
function triggerClick(){
	document.querySelector('#imagesub').Click();
}

function displayimagesub(e){
	if(e.files[0]){
		var reader = new  FileReader();

		reader.onload = function(e){
			document.querySelector('#displaysub').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}