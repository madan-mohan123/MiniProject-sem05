//selector

const time=document.getElementById("time");

const date=document.getElementById("date");



function showtime(){


 
let today=new Date();

let hour=today.getHours();
let min=today.getMinutes();
let sec=today.getSeconds();


let todaydate=today.toDateString();


//am-pm
const ampm = hour > 12 ? 'PM' :'AM' ;
//format
hour = hour % 12 || 12 ;
//output
time.innerHTML= `${addZero(hour)}<span>:</span>${addZero(min)}<span>:</span>${addZero(sec)} ${ampm}`;
date.innerHTML=`${todaydate}`;

//call showtime funtion after 1s
setTimeout(showtime,1000);

function addZero(n){

    return((parseInt(n,10)<10 ? '0':'')+n);
}

}











//function call
showtime();
setGreeting();
getName();



