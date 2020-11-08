

    
function validate() {
	var fname = document.getElementById("fname");
	var lname = document.getElementById("lname");
	var email = document.getElementById("email");
	var phone = document.getElementById("phone");
	var pass = document.getElementById("pass");
	var cpass = document.getElementById("cpass");


			viewInvalid(addInvalid(fname,lname,email,phone,pass,cpass));
			
		}

		function addInvalid(fname,lname,email,phone,pass,cpass){
			var invalid = [];
			count = 0;
			
			if(!validate_phone(phone.value)){
				invalid[2] = true;
				count+=1;
			}
			else{
				invalid[2] = false;
			}
			if(!validate_email(email.value)){
				invalid[3] = true;
				count+=1;
			}
			else{
				invalid[3] = false;
			}
			if(!validate_name(lname.value)){
				invalid[4] = true;
				count+=1;
			}
			else{
				invalid[4] = false;
			}

			if(!validate_name(fname.value)){
				invalid[5] = true;
				count+=1;
			}
			else{
				invalid[5] = false;
			}
			if(count == 0){
				console.log("in here");
				document.getElementById("err").style.display = "none";
			}
			else{
				document.getElementById("err").style.display = "initial";
            }

            if(!validate_cpass(cpass.value, pass.value)){
				invalid[0] = true;
				count+=1;
			}
			else{
				invalid[0] = false;
			}
			if(!validate_pass(pass.value)){
				invalid[1] = true;
				count+=1;
			}
			else{
				invalid[1] = false;
			}
			
			
            return [[cpass, pass, phone, email, lname, fname], invalid];
            

		}

		function viewInvalid(args){
			var count = 0;
			item = args[0];
			validity = args[1];
			for(i in item){
				if (validity[count] == true){
					item[count].style.border = "1px solid #fb3333";
				}
				else{
					item[count].style.border = "1px solid #000000";
				}
				count++;
			}
		}

		function validate_email(email){
			var err = document.getElementById("err");
			err.style.display = "initial";
			var list = email.split("@");
			var list2 = [];
			if (list.length == 2){
				list2[0] = list[0];
				var li3 = list[1].split("."); 
				if(li3.length == 2){
					list2[1] = li3[0];
					list2[2] = li3[1];
				}
				else{
					err.innerHTML = "Your Email Address is invalid";
					return false;
				}
			}
			else{
				err.innerHTML = "Your Email Address is invalid";
				return false;
			}
			return true;
		}
		function validate_phone(phone){
			var err = document.getElementById("err");
            err.style.display = "initial";
            var number = phone.substr(1);
            //alert("length "+phone.length);
            //alert(number);
            if(parseInt(number)){
                //alert("Converted");
            }
            else{
                //alert("Couldnt be convereted");
                err.innerHTML = "The phone number you entered is invalid";
				return false;
            }
            err.style.display = "initial";
			if(phone.length != 13){
				err.innerHTML = "Your phone has length different from 13 characters"
				return false;
			}
			return true;
		}

		function validate_name(name){
			var err = document.getElementById("err");
			err.style.display = "initial";
			if(!isAlpha(name)){
				err.innerHTML = "Name should only contain letters";
				return false;
			}
			else if(name.length < 8){
				err.innerHTML = "Name cannot be less than 8 characters";
				return false;
			}
			return true;
		}
		function validate_pass(pass){
			var err = document.getElementById("err");
			err.style.display = "initial";
			if(pass.length < 12){
				err.innerHTML = "password cannot be less than 12 characters";
				return false;
			}
			return true;
		}
		function validate_cpass(cpass, pass){
			var err = document.getElementById("err");
            err.style.display = "initial";
            //alert(pass+" "+cpass);
			if(cpass !== pass){
				console.log(err.style.display);
				err.innerHTML = "Passwords do not match";
				return false;
			}
			// else if(!validate_pass(cpass)){
			// 	err.innerHTML = "";
			// 	return false;
            // }
            
            return true;
            
		}

		function isAlpha(string){
			return /^[a-zA-Z]+$/.test(string);
		}

		function isNum(string){
			return /^[0-9]+$/.test(string);	
		}

		function test(val){
			document.getElementById("test").innerHTML += val + "<br>";
		}




        /*


		function phone(){
			var phone = document.getElementById("phone".value);
			var err = document.getElementById("phoneerror");
            err.style.display = "initial";
            window.alert("Phone "+phone.length);
			if(!isNum(phone)){
				err.innerHTML = "The phone number you entered is invalid";
				return false;
            }
			else if(phone.length != 10){
				err.innerHTML = "Your phone has length different from 10 characters"
				return false;
			}
			else{
				err.innerHTML = "";
			}
			return true;
		}
		function fname(){
            var fname = document.getElementById("fname").value;
            window.alert(fname);
			var err = document.getElementById("fnameerror");
			err.style.display = "initial";
			if(!isAlpha(fname)){
				err.innerHTML = "First Name should only contain letters";
				return false;
			}
			else if(fname.length < 4){
				err.innerHTML = "First Name cannot be less than 8 characters";
				return false;
			}
			else{
				err.innerHTML = "";
			}
			return true;
		}
		function lname(){
            var name = document.getElementById("lname").value;
            window.alert(lname);
			var err = document.getElementById("lnameerror");
			err.style.display = "initial";
			if(!isAlpha(name)){
				err.innerHTML = "Last Name should only contain letters";
				return false;
			}
			else if(name.length < 4){
				err.innerHTML = "Last Name cannot be less than 8 characters";
				return false;
			}
			else{
				err.innerHTML = "";
			}
			return true;
		}
		function pass(){
			var pass = document.getElementById("pass").value;
            var err = document.getElementById("passerror");
            window.alert(pass);
			err.style.display = "initial";
			if(pass.length < 12){
				err.innerHTML = "password cannot be less than 12 characters";
				return false;
			}
			else{
				err.innerHTML = "";
			}
			return true;
		}
		function cpass(){
            var pass = document.getElementById("pass").value;
           
            var cpass = document.getElementById("cpass").value;
            window.alert(pass+" "+cpass);
			var err = document.getElementById("cpasserror");
			err.style.display = "initial";
			if(cpass !== pass){
				console.log(err.style.display);
				err.innerHTML = "Passwords do not match";
				return false;
			}
			else{
				err.innerHTML = "";
			}
			
			return true;
        }
        */
    function validateLogin(){
        
		var email = document.getElementById("emaill");
        var pass = document.getElementById("passs");
        alert(email+" "+pass);
        if(validate_email(email)){
            if(validate_pass(pass)){
                return true;
            }
        }
    
    }
        function validate_email(email){
			var err = document.getElementById("err");
			err.style.display = "initial";
			var list = email.split("@");
			var list2 = [];
			if (list.length == 2){
				list2[0] = list[0];
				var li3 = list[1].split("."); 
				if(li3.length == 2){
					list2[1] = li3[0];
					list2[2] = li3[1];
				}
				else{
					err.innerHTML = "Your Email Address is invalid";
					return false;
				}
			}
			else{
				err.innerHTML = "Your Email Address is invalid";
				return false;
			}
			return true;
        }
        

        function validate_pass(pass){
			var err = document.getElementById("err");
			err.style.display = "initial";
			if(pass.length < 12){
				err.innerHTML = "password cannot be less than 12 characters";
				return false;
			}
			return true;
		}
	