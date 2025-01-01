function viewFilter(){
   // alert("OK");
   //document.getElementById("filterId").className = "d-block";
   var filter = document.getElementById("filterId");

   filter.classList.toggle("d-none");
   filter.classList.toggle("d-block");
   
}


function adminsignin(){
   //alert("OK BABY ");

  var aemail = document.getElementById("Aemail");
  var apassword = document.getElementById("Apassword");

var f = new FormData();
f.append("ae",aemail.value);
f.append("ap",apassword.value);

var request = new XMLHttpRequest();
request.onreadystatechange = function(){
   if(request.readyState == 4 & request.status == 200){
      var response = request.responseText;
      //alert(response);
       if(response == "Success"){

         window.location ="adminDashbord.php"
      }else{

        alert(response);
  
      }
     }


};

request.open("POST","adminsignInProcess.php",true);
request.send(f);
}

function AdminRegister(){

//alert("OK");

var e = document.getElementById("e");
var pw = document.getElementById("pw");

var f = new FormData();
f.append("e",e.value);
f.append("pw",pw.value);

var request = new XMLHttpRequest();

request.onreadystatechange = function(){

   if(request.readyState == 4 & request.status == 200){
      var response = request.responseText;
      //alert(response);
       if(response == "Success"){

        alert("Success");
      }else{

        alert(response);
  
      }
     }


};

request.open("POST","newAdminProcess.php",true);
request.send(f)

}

function addpost(){

  var gender = document.getElementById("gender");
  var age = document.getElementById("age");
  var date = document.getElementById("date");
  var education = document.getElementById("education");
  var job = document.getElementById("job");
  var city = document.getElementById("city");
  var religion = document.getElementById("religion");
  var email = document.getElementById("email");
  var contact = document.getElementById("contact");
  var province = document.getElementById("province");
  var description = document.getElementById("description");
  var add = document.getElementById("add");



  var f = new FormData()

  f.append("gender",gender.value);
  f.append("age",age.value);
  f.append("date",date.value);
  f.append("education",education.value);
  f.append("job",job.value);
  f.append("city",city.value);
  f.append("religion",religion.value);
  f.append("email",email.value);
  f.append("contact",contact.value);
  f.append("province",province.value);
  f.append("description",description.value);
  f.append("add",add.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){

   if(request.readyState == 4 & request.status == 200){
      var response = request.responseText;
      //alert(response);
       if(response == "Success"){

        alert("Success");
        location.reload()

      }else{

        alert(response);
  
      }
     }


  }
   
request.open("POST","addpostProcess.php",true);
request.send(f);
 
}

// remove user

function removeuser(x) {
   if (confirm("Are you sure deleting this user")) {
       
       var f = new FormData();
       f.append("c",x);

       var request = new XMLHttpRequest();
       request.onreadystatechange = function () {
           if (request.readyState == 4 && request.status == 200) {
               var responce = request.responseText;
               alert(responce);
               location.relord();
           }
       }

       request.open("POST","removeuserProcess.php",true);
       request.send(f);

   }

}

function lordUser(x){


  var page = x;
//alert(x);
var f = new FormData();
f.append("p",page)
 
var request = new XMLHttpRequest();
request.onreadystatechange = function(){
  if (request.readyState == 4 & request.status == 200) {
    var response = request.responseText;
    // alert(response);
    document.getElementById("uid").innerHTML = response;
    
  }
};
request.open("POST","lordUserProcess.php",true);
request.send(f);

}

// function advanceesarch(x){

//   //alert("Chandrapala ");
//  var page = x;
//  var education = document.getElementById("education");
//  var religion = document.getElementById("religion");
//  var province = document.getElementById("province");
//  var gender = document.getElementById("gender");
//  var fage = document.getElementById("fage");
//  var tage = document.getElementById("tage");



// var f = new FormData();

// f.append("page",page);
// f.append("education",education.value);
// f.append("religion",religion.value);
// f.append("province",province.value);
// f.append("gender",gender.value);
// f.append("fage",fage.value);
// f.append("tage",tage.value);

// var request = new XMLHttpRequest();

// request.onreadystatechange = function (){

//   if(request.readyState == 4 && request.status == 200){

//    var responce =  request.responseText;

//   // alert(responce);
//   document.getElementById("uid").innerHTML = responce;


//   }



// };

// request.open("POST","advancesearchProcess.php",true);
// request.send(f);

// }

function advanceesarch(x){
  var page = x;
  var education = document.getElementById("education");
  var religion = document.getElementById("religion");
  var province = document.getElementById("province");
  var gender = document.getElementById("gender");
  var fage = document.getElementById("fage");
  var tage = document.getElementById("tage");

  var f = new FormData();
  f.append("page", page);
  f.append("education", education.value);
  f.append("religion", religion.value);
  f.append("province", province.value);
  f.append("gender", gender.value);
  f.append("fage", fage.value);
  f.append("tage", tage.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var responce = request.responseText;
      document.getElementById("uid").innerHTML = responce;
    }
  };

  request.open("POST", "advancesearchProcess.php", true);
  request.send(f);
}


function chage(){
//alert("Hi");
var signInbox = document.getElementById("signInbox")
var signUpbox = document.getElementById("signUpbox")

signInbox.classList.toggle("d-none");
signUpbox.classList.toggle("d-none");


}

function signUp(){
  //alert("OH");
 var fname = document.getElementById("fname");
 var lname = document.getElementById("lname");
 var email = document.getElementById("email");
 var mobile = document.getElementById("mobile");
 var uname = document.getElementById("uname");
 var password = document.getElementById("password");

 var f = new FormData();
 f.append("fname",fname.value);
 f.append("lname",lname.value);
 f.append("email",email.value);
 f.append("mobile",mobile.value);
 f.append("uname",uname.value);
 f.append("password",password.value);

 var request = new XMLHttpRequest();

request.onreadystatechange = function (){
  if (request.readyState == 4 && request.status == 200) {
    var responce = request.responseText;
    if(responce == "success"){
      document.getElementById("msg1").innerHTML ="Registration Successfull";
      document.getElementById("msg1").className ="alert alert-success";
      document.getElementById("msgDiv1").className =" d-block ";

      fname.value="";
      lname.value="";
      email.value="";
      mobile.value="";
      uname.value="";
      password.value="";
  }else{
     document.getElementById("msg1").innerHTML = responce;
     document.getElementById("msgDiv1").className = "d-block";
   }
  }

};

 request.open("POST","signupProcess.php",true);
 request.send(f);
}

function signin(){
    // alert("OK");
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");
   
   
    var f = new FormData();
    f.append("u",un.value);
    f.append("p",pw.value);
    f.append("r",rm.checked);
   
    var request = new XMLHttpRequest();
   
       request.onreadystatechange = function () {
           if(request.readyState == 4 & request.status == 200){
               var response = request.responseText;
               if(response == "Success"){
               //  window.location = "index.php";
               window.location = "index.php";

               }else{
                 document.getElementById("msg2").innerHTML = response;
                 document.getElementById("msgDiv2").className = "d-block";
               }
             }
           };
             request.open("POST","signInProcess.php",true);
             request.send(f);
         
   }


   function relord(){

    location.reload(); 
  }

   function signout(){


   // alert("OK");
    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
      if (request.readyState == 4 & request.status == 200) {
       var response =   request.responseText;
           alert(response);

        if (response == 'signed out successfully') {
          relord();
      }
        
      }

    };

    request.open("POST","signoutProcess.php",true);
    request.send();

   }


   function addproposal(){

    //alert("OK");
    var gender = document.getElementById("gender1");
  var age = document.getElementById("age1");
  var date = document.getElementById("date1");
  var education = document.getElementById("education1");
  var job = document.getElementById("job1");
  var city = document.getElementById("city1");
  var religion = document.getElementById("religion1");
  var email = document.getElementById("email1");
  var contact = document.getElementById("contact1");
  var province = document.getElementById("province1");
  var description = document.getElementById("description1");
  var add = document.getElementById("add1");



  var f = new FormData()

  f.append("gender",gender.value);
  f.append("age",age.value);
  f.append("date",date.value);
  f.append("education",education.value);
  f.append("job",job.value);
  f.append("city",city.value);
  f.append("religion",religion.value);
  f.append("email",email.value);
  f.append("contact",contact.value);
  f.append("province",province.value);
  f.append("description",description.value);
  f.append("add",add.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){

   if(request.readyState == 4 && request.status == 200){
      var response = request.responseText;
      //alert(response);
       if(response == "Success"){

        alert("Success");
        location.reload();
      
      }else{

        alert(response);
  
      }
     }


  }
   
request.open("POST","addproposalProcess.php",true);
request.send(f);
 
}

function openWhatsApp() {
  var whatsappUrl = "https://wa.me/94701852150";
  window.location.href = whatsappUrl;
}

function anotherFunction() {
  console.log("Another function is running...");
  openWhatsApp();  // This will call the openWhatsApp function
}


function Active(x){
  if (confirm("Are you sure conform this proposal")) {
       
    var f = new FormData();
    f.append("c",x);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            alert(responce);
            location.relord();
        }
    }

    request.open("POST","conformProcess.php",true);
    request.send(f);

}


 
}


function forgetpassword(){
  //alert("OK");

 var email =  document.getElementById("e");

 if (email.value != "") {

  var f = new FormData();
  f.append("e",email.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function (){
    if(request.readyState == 4 & request.status == 200){
      var responce = request.responseText;
     // alert(responce);

     if (responce == "success") {

      document.getElementById("msg2").innerHTML = " Email sent! Please Check Your Mail Box";
      document.getElementById("msg2").className = " alert alert-success ";
      document.getElementById("msgDiv2").className = " d-block ";

      
     } else {

      document.getElementById("msg2").innerHTML = responce ;
      document.getElementById("msg2").className = " alert alert-danger ";
      document.getElementById("msgDiv2").className = " d-block ";
      
      
     }
    }
  };

  request.open("POST","forgetPasswordProcess.php",true);
  request.send(f);
  
 } else {

  alert("Please enter your valid Email");
  
 }
}
   

function resetPassword(){

  //alert("OK");

  var vcode = document.getElementById("vcode");
  var np = document.getElementById("np");
  var np2 = document.getElementById("np2");

  var f = new FormData();
  f.append("vcode",vcode.value);
  f.append("np",np.value);
  f.append("np2",np2.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var responce = request.responseText;
     // alert(responce);
     if (responce == "Success") {

      window.location = "signin.php";
      
     } else {
      
      document.getElementById("msg2").innerHTML = responce ;
      document.getElementById("msg2").className = " alert alert-danger ";
      document.getElementById("msgDiv2").className = " d-block ";
      
      
     }
      
    }
  };

  request.open("POST","resetPasswordProcess.php",true);
  request.send(f);

}

// function search(){
//   //alert("OK");

//  var cid = document.getElementById("cid");

//  var f = new FormData();
//  f.append("cid",cid.value);

//  var request = new XMLHttpRequest();
//  request.onreadystatechange = function(){
//   if (request.readyState == 4 & request.status == 200) {
//     var response = request.responseText;
//     alert(response);
    
//   }

//  };
//  request.open("POST","searchprocess.php",true);
//  request.send(f)
// }