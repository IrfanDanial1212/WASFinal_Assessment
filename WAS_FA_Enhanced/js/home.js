
function subData(){
  const form = document.getElementById('sub');
  const fname = form.elements['fname'];
  const lname = form.elements['lname'];
  const email = form.elements['email'];

  let fullName = fname.value + " " + lname.value;
  let emailAddress = email.value;

  
    alert("Welcome to the family! \nThank you for subscribing "+ fullName + 
          ".\nAny update will be sent to " + emailAddress+ ".\nSee you soon!");
    
}   
      
      
    