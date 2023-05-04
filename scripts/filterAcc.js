// User class
class User {
    constructor(username, email, usertype) {
      this.username = username;
      this.email = email;
      this.usertype = usertype;
    }
}

  // Array of User objects
  const users = [
    new User("Affif720", "Affif720@gmail.com", "admin"),
    new User("Zaem", "Zaem@gmail.com", "user"),
    new User("HalimHensem", "Halim@Hotmail.com", "user"),
    new User("Luqasparov", "Luqasparov@gmail.com", "admin"),
    new User("Amirul", "Amirul@gmail.com", "user")
  ];

  // Get elements
  const filter = document.querySelector("#filter");
  const table = document.querySelector("#accTab");
  const rows = document.querySelectorAll("tr");
  
  filter.addEventListener("change", function(){
    const userType = this.value;

    const userAcc = users.filter((acc)=>acc.usertype=="user");
    const adminAcc = users.filter((acc)=>acc.usertype=="admin");

    if(userType=="user"){
        userAcc.forEach((user)=>console.log(user.username));

        for(var i=1; i<rows.length; i++){
            var role = rows[i].querySelector("#userType");
            if(role.textContent!="User"){
                rows[i].style.display="none";
            }else{
                rows[i].style.display="table-row";
            }
        }
    }else if(userType=="admin"){
        adminAcc.forEach((admin)=>console.log(admin.username));

        for(var i=1; i<rows.length; i++){
            var role = rows[i].querySelector("#userType");
            if(role.textContent!="Admin"){
                rows[i].style.display="none";
            }else{
                rows[i].style.display="table-row";
            }
        }
    }else{
        users.forEach((user)=>console.log(user.username));

        for(var i=1; i<rows.length; i++){
            var role = rows[i].querySelector("#userType");

            if(role.textContent=="null"){
                rows[i].style.display="none";
            }else{
                rows[i].style.display="table-row";
            }
            
        }
    }

});

  
  