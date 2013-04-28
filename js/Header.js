function check(form)/*function to check userid & password*/
{
  /*the following code checkes whether the entered userid and password are matching*/
  if(form.user.value == "guest" && form.password.value == "guest")
  {
    window.open("UNIhome.html", "_self")/*opens the target page while Id & password matches*/
  }
  else
  {
    alert("Incorrect Password or Username")/*displays error message*/
  }
}

function redirect(page)/*function to redirect to a certain page*/
{
  window.open(page, "_self")/*opens the target page*/
}
