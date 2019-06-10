var a = document.querySelector("#lawyers_items1");
var b = document.querySelector("#lawyers_items2");
var c = document.querySelector("#lawyers_items3");
var d = document.querySelector("#lawyers_items4");
var e = document.querySelector("#lawyers_items5");
var f = document.querySelector("#lawyers_items6");

var img1 = document.querySelector("#image1");
var img2 = document.querySelector("#image2");
var img3 = document.querySelector("#image3");

var img4 = document.querySelector("#image4");
var img5 = document.querySelector("#image5");
var img6 = document.querySelector("#image6");

var time = 0;

function set1(){
  time++;
  a.style.cssText = 'opacity: 1';
  b.style.cssText = 'opacity: 0.3';
  c.style.cssText = 'opacity: 0.3';
 img1.style.cssText = "display:block";
 img2.style.cssText = "display:none";
 img3.style.cssText = "display:none";
}
function set2(){
  time++;
  a.style.cssText = 'opacity: 0.3';
  b.style.cssText = 'opacity: 1';
  c.style.cssText = 'opacity: 0.3';
  img1.style.cssText = "display:none";
  img2.style.cssText = "display:block";
  img3.style.cssText = "display:none";

}
function set3(){
  time = 0;
  a.style.cssText = 'opacity: 0.3';
  b.style.cssText = 'opacity: 0.3';
  c.style.cssText = 'opacity: 1';
  img1.style.cssText = "display:none";
  img2.style.cssText = "display:none";
  img3.style.cssText = "display:block";
}
function set4(){
  time++;
  d.style.cssText = 'opacity: 1';
  e.style.cssText = 'opacity: 0.3';
  f.style.cssText = 'opacity: 0.3';
  img4.style.cssText = "display:block";
  img5.style.cssText = "display:none";
  img6.style.cssText = "display:none";
}
function set5(){
  time++;
  d.style.cssText = 'opacity: 0.3';
  e.style.cssText = 'opacity: 1';
  f.style.cssText = 'opacity: 0.3';
  img4.style.cssText = "display:none";
  img5.style.cssText = "display:block";
  img6.style.cssText = "display:none";
}


function set6(){
  time = 0;
  d.style.cssText = 'opacity: 0.3';
  e.style.cssText = 'opacity: 0.3';
  f.style.cssText = 'opacity: 1';
  img4.style.cssText = "display:none";
  img5.style.cssText = "display:none";
  img6.style.cssText = "display:block";
}


function timer (){

   if(time === 0){
    set1();
    // set4();
  }
  else if(time === 1){
    set2();
    // set5();
  }
  else if (time === 2) {
    set3();
    // set6();
  }
}
setInterval(function(){
  timer();
},1500);

function timer1 (){

   if(time === 0){
    set4();
    // set4();
  }
  else if(time === 1){
    set5();
    // set5();
  }
  else if (time === 2) {
    set6();
    // set6();
  }
}
setInterval(function(){
  timer1();
},1500)
