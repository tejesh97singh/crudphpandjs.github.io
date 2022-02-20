/* Empty input submit error*/
function check () {
  // (C1) INIT
  var valid = true, error = "", field = "";

  // (C2) Address
  field = document.getElementById("email");
  error = document.getElementById("error_email");
  if (!field.checkValidity()) {
    valid = false;
    field.classList.add("err");
    error.innerHTML = "*Enter Valid Email  \r\n";
  } else {
    field.classList.remove("err");
    error.innerHTML = "";
  }
  
  // (C2) Address
  field = document.getElementById("password");
  error = document.getElementById("error_password");
  if (!field.checkValidity()) {
    valid = false;
    field.classList.add("err");
    error.innerHTML = "*Enter Valid Password  \r\n";
  } else {
    field.classList.remove("err");
    error.innerHTML = "";
  }
  // (C4) RESULT
  return valid;
}