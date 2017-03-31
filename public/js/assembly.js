/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * author:leo/junfeng liao    
 */
 var temp = null;
  function changePic(path){
      document.getElementById("showme").src="/img/"+path+".jpeg";
      temp = path;
      var text =  document.getElementById("introduction");
      if(path =="a1"){
           text.innerHTML="this part is a1 , ................ some introduction";
      }else if(path == "a2"){
          text.innerHTML="this part is a2 , ................ some introduction";
      }else if(path == "a3"){
           text.innerHTML="this part is a3 , ................ some introduction";
      }else if(path == "b1"){
           text.innerHTML="this part is b1 , ................ some introduction";
      }else if(path == "b2"){
           text.innerHTML="this part is b2 , ................ some introduction";
      }else if(path=="c2"){
           text.innerHTML="this part is b3 , ................ some introduction";
      }else if(path == "a3"){
           text.innerHTML="this part is c1 , ................ some introduction";
      }else if(path == "b3"){
           text.innerHTML="this part is c2 , ................ some introduction";
      }else if(path == "c3"){
           text.innerHTML="this part is c3 , ................ some introduction...........................................................................................";
      }
      else if(path == "m1"){
           text.innerHTML="this part is m1, ................ some introduction";
      }
      else if(path == "m2"){
           text.innerHTML="this part is m2, ................ some introduction";
      }
      else if(path == "m3"){
           text.innerHTML="this part is m3 , ................ some introduction";
      }
      else if(path == "r1"){
           text.innerHTML="this part is r1 , ................ some introduction";
      }
      else if(path == "r2"){
           text.innerHTML="this part is r2 , ................ some introduction";
      }
      else if(path == "r3"){
           text.innerHTML="this part is r3 , ................ some introduction";
      }
   }
  function add(){
    if(temp == "a1"||temp=="b1"||temp == "c1"||temp=="m1"||temp=="r1"){
         document.getElementById("head").src="/img/"+temp+".jpeg";
    }else if(temp == "a2"||temp=="b2"||temp=="c2"||temp=="m2"||temp=="r2"){
         document.getElementById("body").src="/img/"+temp+".jpeg";
    }else if(temp == "a3"||temp=="b3"||temp=="c3"||temp=="m3"||temp=="r3"){
         document.getElementById("foot").src="/img/"+temp+".jpeg";
    }
  }
  

