/*$(document).ready(function() {
						   
		var lang1=null;
		$.ajax({url:"getSession.php",async:false,success:function(result){
		 lang1=result;		
		//alert(lang1);
  		 }});						   
						   
 });*/


function AddIfValid(field) { 

    if ((field.value.length == 0) || (field.value == null)) { 
        return 0; <!--(field.value ==0);--> 
    } else { 
        return eval((field.value.replace(/,/g, '')) || (field.value)); 
    } 
} 

//hasil previous
function total_f1112a_p()
{
	//var total_f0011;
	var total11 = 0;
	total11 += AddIfValid(document.form1.f0708a_p);
	//total11 += AddIfValid(document.form1.f2324a_p); //ict shj
	total11 += AddIfValid(document.form1.f0910a_p);
	document.form1.f1112a_p.value = total11;
}
//hasil current
function total_f1112a_c()
{
	var total12 = 0;
	total12 += AddIfValid(document.form1.f0708a_c);
	//total12 += AddIfValid(document.form1.f2324a_c); //ict shj
	total12 += AddIfValid(document.form1.f0910a_c);
	document.form1.f1112a_c.value = total12;
}
//belanja previous
function total_f1920b_p()
{	
	var total19 = 0;
	total19 += AddIfValid(document.form1.f1314b_p);
	//total19 += AddIfValid(document.form1.f2526a_p); //ict shj
	total19 += AddIfValid(document.form1.f1516b_p);
	total19 += AddIfValid(document.form1.f1718b_p);
	document.form1.f1920b_p.value = total19;
}
//belanja current
function total_f1920b_c()
{		
	var total20 = 0;
	total20 += AddIfValid(document.form1.f1314b_c);
	//total20 += AddIfValid(document.form1.f2526a_c); //ict shj
	total20 += AddIfValid(document.form1.f1516b_c);
	total20 += AddIfValid(document.form1.f1718b_c);
	document.form1.f1920b_c.value = total20;
}

function info_hasil_A()
{
	var a; var b; var percent_hasil_A; 
	a = document.form1.f1112a_p.value;
	b = document.form1.f1112a_c.value;	
	percent_hasil_A=(((b/a)-1)*100);
	
	lang1=document.getElementById("get_lang").value;
	
	if (percent_hasil_A < (-30))
	{

			if(lang1=='EN')
			{
				
			alert('Total Revenue decreased more than 30% from the previous quarter.Please provide reason.'+ '\nThe difference is about = ' + percent_hasil_A.toFixed(2) + '%.');
			} 
			else 
			{
			alert('Penurunan Jumlah Hasil melebihi 30% berbanding suku tahun sebelumnya. Sila nyatakan sebab berlakunya perbezaan tersebut.'+ '\nPerbezaannya adalah sebanyak = ' + percent_hasil_A.toFixed(2) + '%.');
			}
	}
	if (percent_hasil_A > 30)
	{
			if(lang1=='EN')
			{
			alert('Total Revenue increased more than 30% from the previous quarter.Please provide reason.'+ '\nThe difference is about = ' + percent_hasil_A.toFixed(2) + '%.');
			} 
			else 
			{
			alert('Kenaikan Jumlah Hasil melebihi 30% berbanding suku tahun sebelumnya. Sila nyatakan sebab berlakunya perbezaan tersebut.'+ '\nPerbezaannya adalah sebanyak = ' + percent_hasil_A.toFixed(2) + '%.');
			}
	}
}


function info_belanja_A()
{	//var info_ayat17;
	var e; var f; var percent_belanja_A; 
	e = document.form1.f1920b_p.value;
	f = document.form1.f1920b_c.value;
	percent_belanja_A=(((f/e)-1)*100);
	
	lang1=document.getElementById("get_lang").value;

if (percent_belanja_A < (-30))
	{
		
			if(lang1=='EN')
			{
			alert('Total Expenditure decreased more than 30% from the previous quarter. Please provide the reason.'+ '\nThe difference is about = ' + percent_belanja_A.toFixed(2) + '%.');
			} 
			else 
			{
			alert('Penurunan Jumlah Perbelanjaan melebihi 30% berbanding suku tahun sebelumnya. Sila nyatakan sebab berlakunya perbezaan tersebut.'+ '\nPerbezaannya adalah sebanyak = ' + percent_belanja_A.toFixed(2) + '%.');
			}
	}
	
	if (percent_belanja_A > 30)
	{
			if(lang1=='EN')
			{
			alert('Total Expenditure increased more than 30% from the previous quarter. Please provide the reasons.'+ '\nThe difference is about = ' + percent_belanja_A.toFixed(2) + '%.');
			} 
			else 
			{
			alert('Kenaikan Jumlah Perbelanjaan kurang 30% berbanding suku tahun sebelumnya. Sila nyatakan sebab berlakunya perbezaan tersebut.'+ '\nPerbezaannya adalah sebanyak = ' + percent_belanja_A.toFixed(2) + '%.');
			}
	} 
//
}

function info_pekerja_A()
{	//var info_ayat18;
	var g; var h; var percent_pekerja_A; 
	g = document.form1.f2122c_p.value.replace(/,/g, '');
	h = document.form1.f2122c_c.value.replace(/,/g, '');
	
	percent_pekerja_A=(((h/g)-1)*100);
	
	lang1=document.getElementById("get_lang").value;
	
	//alert(percent_pekerja_A);
	
	if (percent_pekerja_A < (-30))
	{
		
			if(lang1=='EN')
			{
			alert('Total number of persons engaged decreased more than 30% from the previous quarter. Please state the reasons.'+ '\nThe difference is about = ' + percent_pekerja_A.toFixed(2) + '%.');
			} 
			else 
			{
			alert('Penurunan Jumlah Pekerja kurang 30% berbanding suku tahun sebelumnya. Sila nyatakan sebab berlakunya perbezaan tersebut.'+ '\nPerbezaannya adalah sebanyak = ' + percent_pekerja_A.toFixed(2) + '%.');
			}
	}
	if (percent_pekerja_A > 30)
	{
			//alert(lang1);
			if(lang1=='EN')
			{
			alert('Total number of persons engaged increased more than 30% from the previous quarter. Please state the reasons for the difference.'+ '\nThe difference is about = ' + percent_pekerja_A.toFixed(2) + '%.');
			} 
			else 
			{
			alert('Kenaikan Jumlah Pekerja melebihi 30% berbanding suku tahun sebelumnya. Sila nyatakan sebab berlakunya perbezaan tersebut.'+ '\nPerbezaannya adalah sebanyak = ' + percent_pekerja_A.toFixed(2) + '%.');
			}
	}
//
}

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
	x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}


