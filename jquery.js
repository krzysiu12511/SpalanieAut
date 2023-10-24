$('document').ready(() => {

	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 300) { 
			$('#myBtn').fadeIn(); 
		} else { 
			$('#myBtn').fadeOut(); 
		} 
	});
	
	
	/*var urlParams = new URLSearchParams(window.location.search);
	var success = urlParams.get('success');
	if(success == 1){
		$("#popup").slideDown('slow');
	}
	
	$("#popup").on("click",function() {
		$("#popup").slideUp('slow');
    });
	*/
	$("#myBtn").on("click",function() {
        $("html, body").animate({scrollTop: 0}, 300);
    });
	
	$(function() {
    $("table tbody tr:nth-child(odd)").addClass("zebrastripe");
	});
	
	$(function() {
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day);
	console.log(today);
    $("#Dzism").val(today);
    $("#Dzisd").val(today);
	});
	
	$(document).on( "click", ".zapytaj_czy_usunac", function(e)  {
			
			if(!confirm('Usunąć wiersz?')){
			e.preventDefault();
			}
	});
	$(document).on( "click", ".zapytaj_czy_zapisac", function(e)  {
			if(!confirm('Zapisać wiersz?')){
			e.preventDefault();
			}
	});
	
	
  
	
	$(document).on( "click", ".reset", function() {
		$("#Stan, #Ilosc, #date").each( function() {
				$(this).val('');
        });
	});
	
    $('.hide').click(function() {
		var del_id= $(this).attr('id');
        var ele = $(this).parent().parent().parent().parent();
		
		if (confirm('Usunąć wiersz?')) {
        $.ajax({
			type:'POST',
			url:'script.php',
			data:{'id':del_id,
			'kategoria':"usunAjax"},
			success: function(response){
				if(response == 1){
					ele.css('background','tomato');
					ele.fadeOut(800,function(){
						$(this).remove();
					});
				}else{
					alert("zle ID")
				}
			}
		});
		}
		
	});
	
		$(document).on( "click", ".edit", function()  {
			var stan = $(this).parent().parent().parent().parent().find("#stan").text();
			var ilosc = $(this).parent().parent().parent().parent().find("#ilosc").text();
			var data = $(this).parent().parent().parent().parent().find("#data").text();
			var date_string = moment(data, "DD.MM.YYYY").format("YYYY-MM-DD");
			$(this).parent().parent().parent().parent().find("#stan").html("<input type='number' style='width: 40px;' min='1' max='999999' name='stan' id='stan' value='"+stan+"'/>");
			$(this).parent().parent().parent().parent().find("#ilosc").html("<input type='number' style='width: 40px;' min='1' max='9999' name='ilosc' id='ilosc' value='"+ilosc+"'/>");
			$(this).parent().parent().parent().parent().find("#data").html("<input type='date' style='width: 95px;' name='data' id='date' value='"+date_string+"'/>");
			$(this).parent().html("<button type='submit' class='zapisz btn-sm btn btn-success' name='kategoria' id='zapisz'>Zapisz</button> <button type='submit' class='anuluj btn-sm btn btn-danger' name='kategoria' id='anuluj'>Anuluj</button>");
		});
		
		
	
		$(document).on( "click", ".anuluj", function() {
		var stan_new = $(this).parent().parent().parent().parent().find("input[name='stan']").val();
		var ilosc_new = $(this).parent().parent().parent().parent().find("input[name='ilosc']").val();
		var data_new = $(this).parent().parent().parent().parent().find("#date").val();
		var date_string = moment(data_new, "YYYY-MM-DD").format("DD-MM-YYYY");
		
		$(this).parent().parent().parent().parent().find("#stan").html(stan_new);
		$(this).parent().parent().parent().parent().find("#ilosc").html(ilosc_new);
		$(this).parent().parent().parent().parent().find("#data").html(date_string);
		$(this).parent().html("<button type='submit' class='edit btn btn-warning btn-sm update' name='kategoria' id='edit'>Edytuj</button>");
		});
		
		$(document).on( "click", ".zapisz", function() {
		if (confirm('Czy zapisać dane?')) {
			var id = $(this).parent().parent().parent().parent().find("#id").val();
			var stan_new = $(this).parent().parent().parent().parent().find("input[name='stan']").val();
			var ilosc_new = $(this).parent().parent().parent().parent().find("input[name='ilosc']").val();
			var data_new = $(this).parent().parent().parent().parent().find("#date").val();
			var date_string = moment(data_new, "YYYY-MM-DD").format("DD-MM-YYYY");
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'id':id,
					'stan':stan_new,
					'ilosc':ilosc_new,
					'data':date_string,
					'kategoria':"edytujAjax"},
					success: function(response){
						var arr = $.parseJSON(response);
						if(arr.stan == 1){
							$(this).parent().parent().parent().parent().find("#stan").html(stan_new);
							$(this).parent().parent().parent().parent().find("#ilosc").html(ilosc_new);
							$(this).parent().parent().parent().parent().find("#data").html(date_string);
							$(this).parent().parent().parent().parent().find("#srednia").html(arr.srednia);
							$(this).parent().parent().parent().parent().next("tr").find("#srednia").html(arr.nowasrednia);
							$(this).parent().html("<button type='submit' class='edit btn btn-warning btn-sm update' name='kategoria'>Edytuj</button>");
						}else{
							alert("coś poszło nie tak");
						}
					}
				});
		}
		});
		
		
		$(document).on( "click", ".editauto", function()  {
			var nazwa = $(this).parent().parent().find("#nazwa").text();
			var status = $(this).parent().parent().find("#status").text();
			
			$(this).parent().parent().find("#nazwa").html("<input type='text' size = '8' name='Nazwa' id='Nazwa' value="+nazwa+" required />");
			if(status == 'Aktywny'){
			$(this).parent().parent().find("#status").html("<select id='status' name='status'> <option value='1'>Aktywny</option> <option value='0'>Deaktywny</option> </select>");}
			else{
			$(this).parent().parent().find("#status").html("<select id='status' name='status'> <option value='0'>Deaktywny</option> <option value='1'>Aktywny</option> </select>");
			}
			$(this).parent().html("<button type='submit' class='zapiszauto btn-sm btn btn-success'>Zapisz</button> <button type='submit' class='anulujauto btn-sm btn btn-danger' >Anuluj</button>");
		});
		
		$(document).on( "click", ".anulujauto", function() {
			var nazwa = $(this).parent().parent().find("input[name='Nazwa']").val();
			var status = $(this).parent().parent().find("select[name='status']").val();
			$(this).parent().parent().find("#nazwa").html(nazwa);
			if(status == 1){
				status = 'Aktywny'
			}else{
				status = 'Deaktywny'
			}
			$(this).parent().parent().find("#status").html(status);
			$(this).parent().html("<button type='submit' class='editauto btn btn-warning btn-sm update'>Edytuj</button>");
		});
		
		$(document).on( "click", ".zapiszauto", function() {
			if (confirm('Czy zapisać dane?')) {
			var id = $(this).parent().parent().find("#id").val();
			var nazwa_new = $(this).parent().parent().find("input[name='Nazwa']").val();
			var status_new = $(this).parent().parent().find("select[name='status']").val();
			console.log(nazwa_new);
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'id':id,
					'nazwa':nazwa_new,
					'status':status_new,
					'kategoria':"edytujautoAjax"},
					success: function(response){
						if(response){
							$(this).parent().parent().find("#nazwa").html(nazwa_new);
							if(status_new == 1){
								status_new = 'Aktywny'
							}else{
								status_new = 'Deaktywny'
							}
							$(this).parent().parent().find("#status").html(status_new);
							$(this).parent().html("<button type='submit' class='editauto btn btn-warning btn-sm update' name='kategoria'>Edytuj</button>");
						}else{
							alert("coś poszło nie tak");
						}
					}
				});
			}	
		});
		
		$(document).on( "click", ".editicon", function()  {
			var nazwa = $(this).parent().parent().find("#nazwa").text();
			var status = $(this).parent().parent().find("#status").text();
			
			$(this).parent().parent().find("#nazwa").html("<input type='text' size = '8' name='Nazwa' id='Nazwa' value="+nazwa+" required />");
			if(status == 'Aktywny'){
			$(this).parent().parent().find("#status").html("<select id='status' name='status'> <option value='1'>Aktywny</option> <option value='0'>Deaktywny</option> </select>");}
			else{
			$(this).parent().parent().find("#status").html("<select id='status' name='status'> <option value='0'>Deaktywny</option> <option value='1'>Aktywny</option> </select>");
			}
			$(this).parent().html("<button type='submit' class='zapiszicon btn-sm btn btn-success'>Zapisz</button> <button type='submit' class='anulujicon btn-sm btn btn-danger' >Anuluj</button>");
		});
		
		$(document).on( "click", ".anulujicon", function() {
			var nazwa = $(this).parent().parent().find("input[name='Nazwa']").val();
			var status = $(this).parent().parent().find("select[name='status']").val();
			$(this).parent().parent().find("#nazwa").html(nazwa);
			if(status == 1){
				status = 'Aktywny'
			}else{
				status = 'Deaktywny'
			}
			$(this).parent().parent().find("#status").html(status);
			$(this).parent().html("<button type='submit' class='editauto btn btn-warning btn-sm update'>Edytuj</button>");
		});
		
		$(document).on( "click", ".zapiszicon", function() {
			if (confirm('Czy zapisać dane?')) {
			var id = $(this).parent().parent().find("#id").val();
			var nazwa_new = $(this).parent().parent().find("input[name='Nazwa']").val();
			var status_new = $(this).parent().parent().find("select[name='status']").val();
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'id':id,
					'nazwa':nazwa_new,
					'status':status_new,
					'kategoria':"edytujikoneAjax"},
					success: function(response){
						if(response){
							$(this).parent().parent().find("#nazwa").html(nazwa_new);
							if(status_new == 1){
								status_new = 'Aktywny'
							}else{
								status_new = 'Deaktywny'
							}
							$(this).parent().parent().find("#status").html(status_new);
							$(this).parent().html("<button type='submit' class='editauto btn btn-warning btn-sm update' name='kategoria'>Edytuj</button>");
						}else{
							alert("coś poszło nie tak");
						}
					}
				});
			}	
		});
		
		
		
		
		$(document).on( "click", ".pusta", function() {
		if (confirm('Czy oproznic szklanke?')) {
			var id = $(this).parent().parent().parent().parent().find("#id").val();
			var szklanka = $(this).attr("id");
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'id':id,
					'szklanka':szklanka,
					'kategoria':"pustaAjax"},
					success: function(response){
						var arr = $.parseJSON(response);
						var szklanka = arr.szklanka
						if(arr.stan == 1){
							$(this).replaceWith("<div class='pelna' id="+szklanka+"><img src='pusta.png'></div>");
						}else{
							alert("coś poszło nie tak");
						}
					}
				});
		}
		});
		
		$(document).on( "click", ".pelna", function() {
			var id = $(this).parent().parent().parent().parent().find("#id").val();
			var szklanka = $(this).attr("id");
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'id':id,
					'szklanka':szklanka,
					'kategoria':"pelnaAjax"},
					success: function(response){
						var arr = $.parseJSON(response);
						if(arr.stan == 1){
							$(this).replaceWith("<div class='pusta' id="+szklanka+"><img src='pelna.png'></div>");
						}else{
							alert("coś poszło nie tak");
						}
					}
				});
		
		});
		
		
		
		$(document).on( "click", ".bez", function() {
		if (confirm('Czy odznaczyc?')) {
			var id = $(this).attr("data-id_ikony");
			var data = $(this).attr("data-data");
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'id':id,
					'data':data,
					'kategoria':"bezAjax"},
					success: function(response){
						var arr = $.parseJSON(response);
						var szklanka = arr.szklanka
						if(arr.stan == 1){
							$(this).removeClass("ramka bez");
							$(this).addClass("dodajramke");
						}else{
							alert("coś poszło nie tak");
						}
					}
				});
		}
		});
		
		$(document).on( "click", ".dodajramke", function() {
			var id = $(this).attr("data-id_ikony");
			var data = $(this).attr("data-data");
			console.log(id+data);
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'id':id,
					'data':data,
					'kategoria':"dodajramkeAjax"},
					success: function(response){
						var arr = $.parseJSON(response);
						if(arr.stan == 1){
							$(this).addClass("ramka bez");
							$(this).removeClass("dodajramke");
						}else{
							alert("coś poszło nie tak");
						}
					}
				});
		
		});
		
		
		
	
});