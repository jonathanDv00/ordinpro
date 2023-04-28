


let monthNames=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

let currentDate=new Date();
let currentDay =currentDate.getDate();
let monthNumber=currentDate.getMonth();
let currentYear=currentDate.getFullYear();

let dates=document.getElementById('dates');
let month=document.getElementById('month');
let year= document.getElementById('year');

let prevMonthDOM= document.getElementById('prev-month');
let nextMonthDOM= document.getElementById('next-month');

month.textContent=monthNames[monthNumber];
year.textContent=currentYear.toString();

prevMonthDOM.addEventListener('click',()=>lasMonth());
nextMonthDOM.addEventListener('click',()=>nextMonth());

writeMonth(monthNumber);

function writeMonth(month){
	for(let i=startDay();i>0;i--){
	dates.innerHTML+="<div class='calendar day item last-days'>"+(getTotalDays(monthNumber-1)-(i-1))+"</div>";
		
	}

for(let i=1;i<=getTotalDays(month);i++){


if(i==currentDay){
	
	dates.innerHTML+="<div class='calendar day item today'><button class='btn btn-primary' id='btnday' name='btnday' onclick='imprimir("+(i)+","+(month+1)+','+currentYear+");'>"+i+"</button></div>";
}else{

dates.innerHTML+="<div class='calendar day item'><button  class='btn btn-outline-primary' id='btnday' name='btnday' onclick='imprimir("+(i)+','+(month+1)+','+currentYear+");'>"+i+"</button></div>";
}

}

}

function getTotalDays(month){
if (month===-1) month=11;

if (month==0||month==2||month==4||month==6||month==7||month==9||month==11) {

return 31;

}
else if(month==3||month==5||month==8||month==10){

return 30;

}else{
	return isLeap()?29:28;
}

}

function isLeap(){
return(currentYear%100!==0&&(currentYear%4==0)||(currentYear%400==0));
}

function startDay(){

let start=new Date(currentYear,monthNumber,1);
return((start.getDay()-1)===-1)?6:start.getDay()-1;
}

function lasMonth(){
	if (monthNumber!==0) {

		monthNumber--;
	}
	else{
		monthNumber=11;
		currentYear--;
	}
setNewDate();
}

function nextMonth(){
	if (monthNumber!==11) {

		monthNumber++;
	}
	else{
		monthNumber=0;
		currentYear++;
	}

setNewDate();
}

function setNewDate(){

currentDate.setFullYear(currentYear,monthNumber,currentDay);
month.textContent=monthNames[monthNumber];
year.textContent=currentYear.toString();

dates.textContent='';
writeMonth(monthNumber);

}


function imprimir(dia,mes,year){
	
	idaprendiz=$('#idaprendiz').val();
	
	$.ajax({
		type:'post',
		url:'../../../controlador/citas_controlador.php',
		//url:'../../../html/Administrador/aprendiz/calendario.php',
		data:{'diaS':dia,'mesS':mes,'yearS':year}
		/*
		 success:function(resultado){
              console.log(resultado)
            },
            error:function(error){
              console.log(error)
            }*/

	})
	.done(function(agendis){
	
	console.log(agendis)
$('#tabla').html(agendis);

})
.fail(function(){
alert('hubo un error a cargar la agenda');

})


}

