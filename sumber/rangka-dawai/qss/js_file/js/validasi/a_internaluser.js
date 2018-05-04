$(document).ready(function() { 

$("input").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
  });
	
		
function checkField()
{
			var errordoc=false;
			
		var f1718_c = $('#f1718b_c').val();
			if(f1718_c.search(",")!=-1)
			{
				f1718_c=f1718_c.replace(",", "");
			}
		var f1718_p = $('#f1718b_p').val();
			if(f1718_p.search(",")!=-1)
			{
				f1718_p=f1718_p.replace(",", "");
			}
		var e3_r = $('#p03_c').val();
			if(e3_r!=undefined)
			{
				if(e3_r.search(",")!=-1)
				{
					e3_r=e3_r.replace(",", "");
				}
			}

		var e4_r = $('#p03_p').val();
			if(e4_r!=undefined)
			{
				if(e4_r.search(",")!=-1)
				{
					e4_r=e4_r.replace(",", "");
				}
			}
			
		var f2122_c = parseInt($('#f2122c_c').val().replace(",", ""));
		var f2122_p = parseInt($('#f2122c_p').val().replace(",", ""));
		
		var f0708a_c = $('#f0708a_c').val();
			f0708a_c=f0708a_c.replace(/\,/g,''); // 1125, but a string, so convert it to number
			f0708a_c=parseInt(f0708a_c,10);

		var f0708a_p = $('#f0708a_p').val();
			f0708a_p=f0708a_p.replace(/\,/g,''); // 1125, but a string, so convert it to number
			f0708a_p=parseInt(f0708a_p,10);

		
		var f0910a_c = parseInt($('#f0910a_c').val().replace(",", ""));
		var f0910a_p = parseInt($('#f0910a_p').val().replace(",", ""));
		
		var f1314b_c = parseInt($('#f1314b_c').val().replace(",", ""));
		var f1314b_p = parseInt($('#f1314b_p').val().replace(",", ""));
		
		var f1516b_c = parseInt($('#f1516b_c').val().replace(",", ""));
		var f1516b_p = parseInt($('#f1516b_p').val().replace(",", ""));
		

		
		var f2324a_c = $('#f2324a_c').val();

		if(f2324a_c!=undefined)
		{
			if(f2324a_c.search(",")!=-1)
			{
				f2324a_c=f2324a_c.replace(",", "");
			}
		}
		var f2324a_p = $('#f2324a_p').val();
		if(f2324a_p!=undefined)
		{
			if(f2324a_p.search(",")!=-1)
			{
				f2324a_p=f2324a_p.replace(",", "");
			}
		}
		
		var f2526b_c = $('#f2526b_c').val();
		if(f2526b_c!=undefined)
		{
			if(f2526b_c.search(",")!=-1)
			{
				f2526b_c=f2526b_c.replace(",", "");
			}
		}
		var f2526b_p =$('#f2526b_p').val();
		if(f2526b_p!=undefined)
		{
			if(f2526b_p.search(",")!=-1)
			{
				f2526b_p=f2526b_p.replace(",", "");
			}
		}
		
		cheknum003 = f2324a_c - f2526b_c;
		cheknum005 = f2324a_p - f2526b_p;
		
		
		//alert("f1718_c="+f1718_c+" and f2122_c="+f2122_c);
		//alert("f1718_p="+f1718_p+" and f2122_p="+f2122_p);
		
		// 0002
		  if(f1718_c > 0 && f2122_c == 0)
			{	
			   $('#f2122c_c,#f1718b_c').css("background-color","red"); 
			   $('#f2122c_c,#f1718b_c').css("color","white");
			   $('.menu3').show().css("top", "400px").animate({top: 50}, 200);
			    errordoc=true;
				
			}
			//0004
		  if(f1718_p > 0 && f2122_p == 0)
			{	
			   $('#f2122c_p,#f1718b_p').css("background-color","red"); 
			   $('#f2122c_p,#f1718b_p').css("color","white");
			   $('.menu3').show().css("top", "400px").animate({top: 50}, 200);
			   errordoc=true;
				
			}

		if (e3_r > f0708a_c)
			{
				//alert('Jualan kasar hasil bilik harus kurang daripada  Hasil kendalian/Perolehan/Jualan.');
				//$('#f1718a_p').css('background-color', 'red');
				alert(f0708a_c);
				$('#p03_c').css('background-color', 'red');
				$('.menu5').show().css("top", "400px").animate({top: 50}, 200);
				 errordoc=true;
			}
			
		if (e4_r > f0708a_p)
			{
				//alert('Jualan kasar hasil bilik harus kurang daripada  Hasil kendalian/Perolehan/Jualan.');
				//$('#f1718a_p').css('background-color', 'red');
				$('#p03_p').css('background-color', 'red');
				$('.menu5').show().css("top", "400px").animate({top: 50}, 200);
				 errordoc=true;
			}
		// 0010		
		if(f0708a_c < f0910a_c)
			{
		
			   $('#f0708a_c,#f0910a_c').css("background-color","#bffcc0");
			   $('#f0708a_c,#f0910a_c').css("color","black");
			   $('.menu2').show().css("top", "400px").animate({top: 50}, 200);
			   //errordoc=true;
			  
			
			}
		//0011
		if(f0708a_p < f0910a_p)
			{

			   $('#f0708a_p,#f0910a_p').css("background-color","#bffcc0"); 
			   $('#f0708a_p,#f0910a_p').css("color","black");
			   $('.menu2').show().css("top", "400px").animate({top: 50}, 200);
			  // errordoc=true;
			   
			}
		//0012	
		if(f1314b_c < f1516b_c)
			{
			   
			   $('#f1314b_c,#f1516b_c').css("background-color","#bffcc0"); 
			   $('#f1314b_c,#f1516b_c').css("color","black");
			   $('.menu4').show().css("top", "400px").animate({top: 50}, 200);
			   //errordoc=true;
			
			}
		//0013
		if(f1314b_p < f1516b_p)
			{
			   $('#f1314b_p,#f1516b_p').css("background-color","#bffcc0"); 
			   $('#f1314b_p,#f1516b_p').css("color","black");
			   $('.menu4').show().css("top", "400px").animate({top: 50}, 200);
			  // errordoc=true;
			
			}
		//0003 ict	
		if(cheknum003 > f0708a_c)
			{
			   $('#f0708a_c,#f2324a_c,#f2526b_c').css("background-color","#bffcc0"); 
			   $('#f0708a_c,#f2324a_c,#f2526b_c').css("color","black");
			   $('.menu1').show().css("top", "400px").animate({top: 50}, 200);
			   //errordoc=true;
			
			}
		//0005 ict	
		if(cheknum005 > f0708a_p)
			{
			   $('#f0708a_p,#f2324a_p,#f2526b_p').css("background-color","#bffcc0");
			   $('#f0708a_p,#f2324a_p,#f2526b_p').css("color","black");
			   //$('#f0708a_p,#f1314b_p,#f1516b_p').css("color","black"); <-- ni yang asal tp aku ubah sebab pelik tgk berbza dgn yg atas 16/3/16
			   $('.menu1').show().css("top", "400px").animate({top: 50}, 200);
			   //errordoc=true;// popup animate
			
			}
/////////////////////////////////////////////////////////////////////////////
		var f1112a_p = parseInt($('#f1112a_p').val().replace(",", ""));
		var f1112a_c = parseInt($('#f1112a_c').val().replace(",", ""));
		//var hasil_a = $('#hasil_a').val();
		var target = $.trim($('#hasil_a').val());
		
		var jumhasil=(((f1112a_c-f1112a_p)/f1112a_p)*100);

			if((jumhasil < -30) && (target.length == 0))
			{
				alert('Penurunan Jumlah Hasil adalah '+jumhasil.toFixed(2)+' kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut.');	
				//alert(jumhasil);
				$("#hasil_a").focus();
				//$('#hasilmelebihi').show().animate({bottom: 855}, 200);
				$('#hasilkurang').hide();
				errordoc=true;

			
			}
		if((jumhasil > 30) && (target.length == 0))
			{
				alert('Kenaikan Jumlah Hasil adalah '+jumhasil.toFixed(2)+' melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut.');
				$("#hasil_a").focus();
				//$('#hasilkurang').show().animate({bottom: 855}, 200);
				$('#hasilmelebihi').hide();
				errordoc=true;

			}	


		var f1920b_p = parseInt($('#f1920b_p').val().replace(",", ""));
		var f1920b_c = parseInt($('#f1920b_c').val().replace(",", ""));
		//var hasil_a = $('#hasil_a').val();
		var target2 = $.trim($('#perbelanjaan_b').val());
		
		var jumbelanja=(((f1920b_c-f1920b_p)/f1920b_p)*100);

			if((jumbelanja < -30) && (target2.length == 0))
			{
				alert('Penurunan Jumlah Hasil adalah '+jumbelanja.toFixed(2)+' kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut.');
				alert(jumbelanja);
				$('#perbelanjaan_b').focus();
				//$('#belanjamelebihi').show();
				$('#belanjakurang').hide();
				errordoc=true;
			
			}
		if((jumbelanja > 30) && (target2.length == 0))
			{
				alert('Kenaikan Jumlah Hasil adalah '+jumbelanja.toFixed(2)+' melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut.');
				alert(jumbelanja);
				$('#perbelanjaan_b').focus();
				//$('#belanjakurang').show();
				$('#belanjamelebihi').hide();
				errordoc=true;
			
			}	

		var f2122c_p = parseInt($('#f2122c_p').val().replace(",", ""));
		var f2122c_c = parseInt($('#f2122c_c').val().replace(",", ""));
		//var hasil_a = $('#hasil_a').val();
		var target3 = $.trim($('#pekerja_c').val());
		
		var jumpekerja=(((f2122c_c-f2122c_p)/f2122c_p)*100);

			if((jumpekerja < -30) && (target3.length == 0))
			{
				alert('Penurunan Jumlah Pekerja '+jumpekerja.toFixed(2)+' kurang daripada 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut.');
				$('#pekerja_c').focus();
				//$('#kerjamelebihi').show();
				$('#kerjakurang').hide();
				errordoc=true;
			
			}
		if((jumpekerja > 30) && (target3.length == 0))
			{
				alert('Kenaikan Jumlah Pekerja adalah '+jumpekerja.toFixed(2)+' melebihi 30% berbanding suku tahun sebelumnya.Sila nyatakan sebab berlakunya perbezaan tersebut.');
				$('#pekerja_c').focus();
				//$('#kerjakurang').show();
				$('#kerjamelebihi').hide();
				errordoc=true;
			
			}	
		
	
	
	//alert(e2_r);
	//alert(e4_r);
		
			
		$("input").keypress(function(){
			$(this).css("background-color","white");
			$(this).css("color","black");
			errordoc=true;

		});	
		
	  $('input[type=text]').each(function()
		{
			var chcknegatif = parseInt($(this).val());
	//alert(chcknegatif);
			if(chcknegatif<0)
			{
				$(this).css("background-color","red");
				$(this).css("color","white");
				errordoc=true;
				//$(this).fadeTo('slow', 0.5).fadeTo('slow', 1.0).fadeTo('slow', 0.5).fadeTo('slow', 1.0);
				
			}
			
	
		});
	return errordoc;
}
		

				
		$('#saveD').click(function()
		{	

	
			if(checkField())
				alert("Sila kemaskini ralat sebelum ke Bahagian seterusnya.");
			else
				$('#form1').submit();
		});
  
		checkField();

});
 
jQuery(function($) {
    $('.auto').autoNumeric('init');
}); 

    $('#btnHide').click(function(){
        $('.menu1').hide();
		return false;
    });
	
    $('#btnHide2').click(function(){
        $('.menu2').hide();
		return false;
    });

    $('#btnHide3').click(function(){
        $('.menu3').hide();
		return false;
    });
	
	$('#btnHide4').click(function(){
	$('.menu4').hide();
	return false;
    });