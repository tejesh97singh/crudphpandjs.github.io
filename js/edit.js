
function check () {
  // (C1) INIT
  var valid = true, error = "", field = "";

  // (C2) NAME
  field = document.getElementById("c_name");
  error = document.getElementById("error_cname");
  console.log(field.checkValidity())
  //alert(field.checkValidity());
  if (!field.checkValidity()) {
    valid = false;
    field.classList.add("err");
    error.innerHTML = "*Name must be of 3 characters \r\n";
  }  else {
	  
    field.classList.remove("err");
    error.innerHTML = "";
  }
  
  // (C2) Address
  field = document.getElementById("user_address");
  error = document.getElementById("error_user_address");
  if (!field.checkValidity()) {
    valid = false;
    field.classList.add("err");
    error.innerHTML = "*Address must be of min 3 character \r\n";
  } else {
    field.classList.remove("err");
    error.innerHTML = "";
  }

  // (C3) NUMBER
  field = document.getElementById("user_salary");
  error = document.getElementById("error_user_salary");
  if (!field.checkValidity()) {
    valid = false;
    field.classList.add("err");
    error.innerHTML = "*Salary must contain min 1 character\r\n";
  } else {
    field.classList.remove("err");
    error.innerHTML = "";
  }

  // (C4) RESULT
  return valid;
}

