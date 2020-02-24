var email = null;
var logo = null;
var comName = null;
var comTopic = null;
var delList = null;
var addDel = null;
var imgList = null;
var statusList = null;
var statList = null;
var runningNow = false;
var myBarChart = null;

var Delta = Quill.import('delta');
var toolbarOptions = [
  [{ 'font': [] }],
  [{ 'size': ['small', false, 'large', 'huge'] }],
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote'],
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'indent': '-1'}, { 'indent': '+1' }],
  [{ 'direction': 'rtl' }],             
  [{ 'align': [] }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  ['link', 'image'],
  ['clean']       
  ]
  var quill = new Quill('#editor', {
    modules: {
      toolbar: toolbarOptions
    },
    theme: 'snow'
  });
  var limit = 50000;
var change = new Delta();
quill.on('text-change', function(delta) {
  change = change.compose(delta);
  if (quill.getLength() > limit) {
    quill.deleteText(limit, quill.getLength());
  }
});

setInterval(function() {
  if (change.length() > 0) {
    console.log('Saving changes', change);
    saveNotes();
    change = new Delta();
  }
}, 5*1000);

window.onbeforeunload = function() {
	saveNotes();
}

$(document).ready(function() {
	$.ajax({
		url:'./php/functCheckLog.php',
		method:'POST',
		data:{
		},
		success:function(result) {
			if (result == 'no') {
				window.location.replace('https://runmun.app/portal');
			}
			else {
				$.ajax({
					url:'./php/functGetUser.php',
					method:'POST',
					data:{
						type:'table'
					},
					success:function(result) {
						var data = JSON.parse(result);
						var admin = data[0];
						email = admin[0];
						logo = admin[1];
						comName = admin[4];
						comTopic = admin[5];
						delList = data[1];
						imgList = data[4];
						statusList = data[2];
						statList = data[3];
						
						var noteContent = String(admin[6]);
						document.querySelector(".ql-editor").innerHTML = noteContent;
						
						$('#logo').prop('src',logo);
						$('#email').val(email);
						
						var table = document.getElementById("rc-table");
						for (let name of delList) {
							var pass=false;
							while (!pass) {
							  	if (name.includes('&rsquo;')){
							  		name = name.replace("&rsquo;", "\'");
							  	}
							  	else {
							  		pass = true;
							  	}
					  		}
					  		if ($('#allCountry option[value=' + '\"' + name +'\"'+']').val()) {
								$('#allCountry option[value=' + '\"' + name +'\"'+']').toggleClass('active');
							}
							$('#delList').append($("<option></option>")
						        	.attr({
    									"value": name,
     								}).text(name));
						}
						
						var pass=false;
						while (!pass) {
							if (comName.includes("&rsquo;")){
								comName = comName.replace("&rsquo;", "\'");
							}
							else {
								pass = true;
							}
						}
						var pass=false;
						while (!pass) {
							if (comTopic.includes("&rsquo;")){
								comTopic = comTopic.replace("&rsquo;", "\'");
							}
							else {
								pass = true;
							}
						}
						
						var i=0;
						var quora=0;
						$("#delList option").each(function() {
				            		$('#delData').append($("<option></option>").prop({
    								"value": $(this).val()
							}).text(imgList[i]));
								
							var name = $(this).val();
							
							$('#delStatus').append($("<option></option>").prop({
	    							"value": name
							}).text(statusList[i]));
							
							$('#delStat').append($("<option></option>").prop({
	    							"value": name
							}).text(statList[i]));
							
							var pass=false;
							var tableName=$(this).val();
							
							var row = table.insertRow();
							row.setAttribute('id', 'row'+$(this).val());
						        var cell1 = row.insertCell(0);
							var cell2 = row.insertCell(1);
							var cell3 = row.insertCell(2);
							cell1.innerHTML = $(this).val();
							cell1.setAttribute('id', tableName);
							cell2.setAttribute('id', 'present'+tableName);
							cell3.setAttribute('id', 'presvot'+tableName);
							if (statusList[i] == 'two') {
								cell2.setAttribute('class','pres');
								cell3.setAttribute('class','absent');
								quora+=1;
							}
							else if (statusList[i] == 'three') {
								cell2.setAttribute('class','absent');
								cell3.setAttribute('class','pres');
								quora+=1;
							}
							else {
								cell2.setAttribute('class','absent');
								cell3.setAttribute('class','absent');
							}
				            		i++;
				            	});
						
						$('#quorum-third').text(Math.ceil(quora/3));
				            	$('#quorum-half').text(Math.ceil(quora/2));
				            	$('#quorum-all').text(quora);
				            	
						$('#comName').val(comName);
						$('#comTopic').val(comTopic);
						
						$('.loader').fadeOut('slow');
						$('.root').fadeIn('slow');
					}
				});
			}
		}
	});
	
	$('#addDel').keypress(function(event) {
		var regex = new RegExp("^[\\\"\\\\\\\?\\<\\>\\!\\:\\|\\*]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (regex.test(key)) {
			 event.preventDefault();
			 return false;
		}
		$('#admin-error-box').fadeOut(10);
	});
	$('#addDel').bind("cut copy paste", function(e) {
       		e.preventDefault();
        });
        $('#delList').change(function() {
	        var num = $("#delList option:selected").length;
	        $('#flag-error-box').fadeOut(10);
	        var src = null;
		if (num == 1) {
			name = "\""+$("#delList option:selected").val()+"\"";
			var src = $('#delData option[value='+name+']').text();
		}
		else {
			src = './img/allFlag/united-nations.png';
		}
		$('#flagImg').prop('src',src);
        });
});

$('textarea').bind('keypress', function(e) {
  if ((e.keyCode || e.which) == 13) {
    $(this).parents('form').submit();
    return false;
  }
});
$('.input_dur').bind('input', function() { 
	var pg = $(this).attr("id").replace('Dur','');
   	setDurTimer($(this).val(),pg)
 	
 	$('#'+pg+'Pause').click();
});	

$('.input_sp').bind('input', function() { 
	var pg = $(this).attr("id").replace('DurSp','');
   	setSpTimer($(this).val(),pg)
 	
 	$('#'+pg+'Pause').click();
});	

$('#closeCopy').click(function() {
	$('.page-footer').fadeOut(1);
});

$('#screenBtn').click(function() {
	$('#screenBtn').toggleClass('active');
	if ($('#screenBtn').hasClass('active')) {
		openFullScreen();	
		$('#screenBtn').prop("src","./img/exitFullScreen.png")
	}
	else {
		closeFullScreen();
		$('#screenBtn').prop("src","./img/enterFullScreen2.png")
	}
});

$('#admin-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		$(this).toggleClass('active');
		$('#admin').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#rc-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		$(this).toggleClass('active');
		$('#rc').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#rm-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		for (y=1;y<=6;y++) {
			$('#rm-del'+y).find('option').not(':first').remove();
		}
		$('#rc-table td').each(function() {
			if ($(this).hasClass('pres')) {
				var name = $(this).attr("id").replace('present','').replace('presvot','');
				for (y=1;y<=6;y++) {
					$('#rm-del'+y).append($("<option></option>").attr("value",name).text(name));
				}
			}
		});
		switchPg();
		$(this).toggleClass('active');
		$('#rm').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#ps-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		$(this).toggleClass('active');
		
		$('#ps-del-form').find('option').not(':first').remove();
		
		$('#rc-table td').each(function() {
			if ($(this).hasClass('pres')) {
				var name = $(this).attr("id").replace('present','').replace('presvot','');
				$('#ps-del-form').append($("<option></option>").attr("value",name).text(name));
			}
		});
		
		$('#ps').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#ss-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		$(this).toggleClass('active');
		
		$('#ss-del-form').find('option').not(':first').remove();
		
		$('#rc-table td').each(function() {
			if ($(this).hasClass('pres')) {
				var name = $(this).attr("id").replace('present','').replace('presvot','');
				$('#ss-del-form').append($("<option></option>").attr("value",name).text(name));
			}
		});
		
		$('#ss').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#mc-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		
		$('#mc-del').empty();
		
		$('#rc-table td').each(function() {
			if ($(this).hasClass('pres')) {
				var name = $(this).attr("id").replace('present','').replace('presvot','');
				$('#mc-del').append($("<option></option>").attr("value",name).text(name));
			}
		});
		
		switchPg();
		$(this).toggleClass('active');
		$('#mc').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#uc-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		$(this).toggleClass('active');
		$('#uc').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#vo-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		
		$('#vo-del').find('option').not(':first').remove();
		$('#vo-list').empty();
		
		$('#rc-table td').each(function() {
			if ($(this).hasClass('pres')) {
				var name = $(this).attr("id").replace('present','').replace('presvot','');
				$('#vo-del').append($("<option></option>").attr("value",name).text(name));
				$('#vo-list').append($("<option></option>").attr("value",name).text(name));
			}
		});
		
		$(this).toggleClass('active');
		$('#vo').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#no-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		$(this).toggleClass('active');
		$('#no').fadeIn(10);
		$('.update').fadeOut(1);
	}
});
$('#st-btn').click(function() {
	if (!$(this).hasClass('active')) {
		$('.update').fadeIn(1);
		switchPg();
		var names = [];
		var times = [];
		var color = [];
		$('#delStat option').each(function() {
			names.push($(this).val());
			time = $(this).text().split(',')
			times.push(Math.round(10*time[0]/60)/10);
		});
		bubbleSort(times,names); 
		
		$('#st-chart').remove();
		$('#st-wrap').append('<canvas id="st-chart"><canvas>');
		var ctxB = document.getElementById("st-chart").getContext('2d');
		var ctx = document.getElementById("st-chart");
		ctx.height = names.length * 10;
		myBarChart = new Chart(ctxB,{type:"horizontalBar",data:{labels:names,datasets:[{label:"Speaking Time (min)",data:times,backgroundColor:[],borderColor:[],borderWidth:1}]},options:{scales:{yAxes:[{ticks:{beginAtZero:!0}}]},layout:{padding:{left:0,right:0,top:10,bottom:10}}}});
		$(this).toggleClass('active');
		$('#st').fadeIn(10);
		$('.update').fadeOut(1);
	}
});

$("form").submit( function(event) {
	return false;
});	

$("#addDelForm").submit( function() {
	$('.update').fadeIn(1);
	var delName = $('#addDel').val();
	if (delName && $('#delList option[value='+"\"" + delName + "\""+']').val()) {
		error('admin','Delegate already added!');
		$('.update').fadeOut(1);
	}
	else if (delName) {
		var delNameTemp = delName.split("");
		for (i=0; i<delNameTemp.length; i++) {
			if (delNameTemp[i] == '\'') {
				delNameTemp[i] = '&rsquo;';
			}
		}
		var newName = delNameTemp.join('');
		var src = null;
		if ($('#allCountry option[value=' + '\"' + newName +'\"'+']').val()) {
			$('#allCountry option[value=' + '\"' + newName +'\"'+']').toggleClass('active');
			src = './img/allFlag/'+delName+'.png';
			$('#delData').append($("<option></option>").prop({
    				"value": delName
			}).text(src));
		}
		else {
			src = './img/allFlag/united-nations.png';
			$('#delData').append($("<option></option>").prop({
    				"value": delName
			}).text(src));
		}
		
		$('#delStatus').append($("<option></option>").prop({
	    		"value": delName
		}).text('one'));
		
		$('#delStat').append($("<option></option>").prop({
	    		"value": delName
		}).text('0,0,0,0,0'));
		
		addDel = new Array();
		imgDel = new Array();
		addDel.push(newName);
		imgDel.push(src);
		$.ajax({
			url:'./php/functAddDel.php',
			method:'POST',
			data:{
				delAdd:addDel,
				imgDel:imgDel,
				type:'table'
			},
			success:function(result) {
				$('#delList').append($("<option></option>")
					.prop("value",delName)
					.text(delName)); 
				
				makeRow('rc-table', delName);
				
				$('.update').fadeOut(1);
			}
		});
	}
	else {
		$('.update').fadeOut(1);
		return false;
	}
	$('#addDel').val('')
});

$('#comName').change(function() {
	var name = $('#comName').val();
	$('.update').fadeIn(1);
	var pass=false;
	while (!pass) {
		if (name.includes("\'")){
			name = name.replace("\'", "&rsquo;");
		}
		else {
			pass = true;
		}
	}
	$.ajax({
		url:'./php/functSaveNameTop.php',
		method:'POST',
		data:{
			name:name,
			type:'table'
		},
		success:function(result) {
			$('.update').fadeOut(1);
		}
	});
});

$('#comTopic').change(function() {
	var topic = $('#comTopic').val();
	$('.update').fadeIn(1);
	var pass=false;
	while (!pass) {
		if (topic.includes("\'")){
			topic = topic.replace("\'", "&rsquo;");
		}
		else {
			pass = true;
		}
	}
	$.ajax({
		url:'./php/functSaveNameTop.php',
		method:'POST',
		data:{
			topic:topic,
			type:'table'
		},
		success:function(result) {
			$('.update').fadeOut(1);
		}
	});
});

$('#rem-admin').click(function() {
	$(this).toggleClass('running');
	var remList = [];
	$("#delList option:selected").each( function() {
		remList.push($(this).val());
		$(this).remove();
		$('#allCountry option[value=' + '\"' + $(this).val() +'\"'+']').removeClass('active');
		$('#delData option[value=' + '\"' + $(this).val() +'\"'+']').remove();
		$('#delStatus option[value=' + '\"' + $(this).val() +'\"'+']').remove();
		$('#delStat option[value=' + '\"' + $(this).val() +'\"'+']').remove();
		deleteRow($(this).val(),'rc-table');
	});
	remDel(remList,'rem');
});

$('#remAll-admin').click(function() {
	var r = confirm('Are you sure that you want to clear all delegations?');
	if (r){
		$(this).toggleClass('running');
		var remList = [];
		$("#delList option").each( function() {
			remList.push($(this).val());
			$(this).remove();
			$('#delData option[value=' + '\"' + $(this).val() +'\"'+']').remove();
			$('#delStatus option[value=' + '\"' + $(this).val() +'\"'+']').remove();
			$('#delStat option[value=' + '\"' + $(this).val() +'\"'+']').remove();
			deleteRow($(this).val(),'rc-table');
		});
		$('#allCountry option').each(function() {
			$(this).removeClass('active');
		});
		remDel(remList,'remAll');
	}
	else {
		return;
	}
});

$('#allCountry').change(function() {
	var remList = [];
	var addList = [];
	var imgDel = [];
	var src = null;
	$('.update').fadeIn(1);
	$('#allCountry option:selected').each(function() {
		$(this).toggleClass('active');
		var name = $(this).val();
		$(this).prop('selected',false);
		if ($(this).hasClass('active')) {
			if($('#delList option[value=' + '\"' + name +'\"'+']').val()) {
				return true;
			}
			else {
				$('#delList').append($("<option></option>")
					.prop("value",name)
					.text(name));
				src = './img/allFlag/'+name+'.png';
				$('#delData').append($("<option></option>").prop({
	    				"value": name
				}).text('./img/allFlag/'+name+'.png'));
				
				$('#delStatus').append($("<option></option>").prop({
	    				"value": name
				}).text('one'));
				
				$('#delStat').append($("<option></option>").prop({
	    				"value": name
				}).text('0,0,0,0,0'));
							
				makeRow('rc-table', name);
				
				addList.push(name);
				imgDel.push(src);
			}
		}
		else {
			if(!$('#delList option[value=' + '\"' + name +'\"'+']').val()) {
			}
			else {
				$('#delList option[value=' + '\"' + name +'\"'+']').remove();
				$('#delData option[value=' + '\"' + name +'\"'+']').remove();
				$('#delStatus option[value=' + '\"' + name +'\"'+']').remove();
				$('#delStat option[value=' + '\"' + name +'\"'+']').remove();
				deleteRow(name,'rc-table');
				
				remList.push(name);				
			}
		}
	});
	$.ajax({
		url:'./php/functAddDel.php',
		method:'POST',			
		data:{
			delAdd:addList,
			imgDel:imgDel,
			type:'table'
		},
		success:function(result) {
			$.ajax({
				url:'./php/functRemDel.php',
				method:'POST',
				data:{
					remDel:remList,
					type:'table'
				},
				success:function(result) {
					$('.update').fadeOut(1);
				}
			});
		}
	});
});

$('#admin-selectAll').click(function() {
	$('.update').fadeIn(1);
	var addList = [];
	var imgDel = [];
	var src = null;
	$('#allCountry option').each(function() {
		if (!$(this).hasClass('active')) {
			$(this).toggleClass('active');
			var name = $(this).val();
			$('#delList').append($("<option></option>")
				.prop("value",name)
				.text(name)); 
			src = './img/allFlag/'+name+'.png';
			$('#delData').append($("<option></option>").prop({
	    			"value": name
			}).text(src));
			
			$('#delStatus').append($("<option></option>").prop({
	    			"value": name
			}).text('one'));
			
			$('#delStat').append($("<option></option>").prop({
	    				"value": name
				}).text('0,0,0,0,0'));
			
			makeRow('rc-table', name);
			
			addList.push(name);
			imgDel.push(src);
		}
		else {
			return;
		}
	});
	$.ajax({
		url:'./php/functAddDel.php',
		method:'POST',
		data:{
			delAdd:addList,
			imgDel:imgDel,
			type:'table'
		},
		success:function(result) {
			$('.update').fadeOut(1);
		}
	});
});

$("#admin-deselectAll").click(function() {
	$('.update').fadeIn(1);
	var remList = [];
	$('#allCountry option').each(function() {
		if ($(this).hasClass('active')) {
			$(this).toggleClass('active');
			var name = $(this).val();
			$('#delList option[value=' + '\"' + name +'\"'+']').remove();
			$('#delData option[value=' + '\"' + name +'\"'+']').remove();
			
			deleteRow(name,'rc-table');
			
			remList.push(name);
		}
		else {
			return;
		}
	});
	$.ajax({
		url:'./php/functRemDel.php',
		method:'POST',
		data:{
			remDel:remList,
			type:'table'
		},
		success:function(result) {
			$('.update').fadeOut(1);
		}
	});
});

$('#deSel-table').click(function() {
	var delList = [];
	var statusList = [];
	
	$('.update').fadeIn(1);
	$('#rc-table td').each(function() {
		if ($(this).hasClass('pres')) {
			$(this).removeClass('pres');
			$(this).addClass('absent');
			
			var name = $(this).attr("id").replace('present','').replace('presvot','');
			var pass=false;
			var delName = name;
			
			while (!pass) {
				if (delName.includes("\'")){
					delName = delName.replace("\'", "&rsquo;");
				}
				else {
					pass = true;
				}
			}
			delList.push(delName)
			statusList.push('one');
		}
	});
	$('#quorum-all').text(0);
	$('#quorum-third').text(0);
	$('#quorum-half').text(0);
	$.ajax({
		url:'./php/functSaveStatus.php',
		method:'POST',
		data:{
			delList:delList,
			statusList:statusList,
			type:'table'
		},
		success:function(result) {
			$('.update').fadeOut(1);
		}
	});
});

$('#sel-table').click(function() {
	var delList = [];
	var statusList = [];
	
	var quora = 0;
	$('.update').fadeIn(1);
	$('#rc-table td').each(function() {
		if ($(this).hasClass('pres') || $(this).hasClass('absent')) {
			$(this).removeClass('pres');
			$(this).addClass('absent');
			
			var name = $(this).attr("id").replace('present','').replace('presvot','');
			var status = $(this).attr("id").replace(name,'');
			
			if (status=='presvot') {
				var pass=false;
				var delName = name;
				
				$(this).removeClass('absent');
				$(this).addClass('pres');
	
				while (!pass) {
					if (delName.includes("\'")){
						delName = delName.replace("\'", "&rsquo;");
					}
					else {
						pass = true;
					}
				}
				delList.push(delName)
				statusList.push('three');
				quora += 1;
			}
		}
	});
	$('#quorum-all').text(quora);
	$('#quorum-third').text(Math.ceil(quora/3));
	$('#quorum-half').text(Math.ceil(quora/2));
	$.ajax({
		url:'./php/functSaveStatus.php',
		method:'POST',
		data:{
			delList:delList,
			statusList:statusList,
			type:'table'
		},
		success:function(result) {
			$('.update').fadeOut(1);
		}
	});
});

$("#res-admin").click(function() {
	$('.update').fadeIn(1);
	$(this).toggleClass('running');
	var num = $("#delList option:selected").length;
	$('#flag-error-box').fadeOut(10);
	var src = null;
	if (num == 1) {
		var delName = $("#delList option:selected").val();
		if ($('#allCountry option[value=' + '\"' + delName +'\"'+']').val()) {
			src = './img/allFlag/'+delName+'.png';
		}
		else {
			src = './img/allFlag/united-nations.png';
		}
		$('#delData option[value=' + '\"' + delName +'\"'+']').text(src);
		$('#flagImg').prop('src',src);
		
		var pass=false;
		while (!pass) {
			if (delName.includes("\'")){
				delName = delName.replace("\'", "&rsquo;");
			}
			else {
				pass = true;
			}
		}
		
		addDel = new Array();
		imgDel = new Array();
		addDel.push(delName);
		imgDel.push(src);
		
		$.ajax({
			url:'./php/functAddDel.php',
			method:'POST',
			data:{
				delAdd:addDel,
				imgDel:imgDel,
				type:'table',
				update:'yes'
			},
			success:function(result) {
				$('.update').fadeOut(1);
				$("#res-admin").toggleClass('running');
			}
		});
	}
	else {
		$('.update').fadeOut(1);
		$(this).toggleClass('running');
	}
});

$('#rc-table').on( 'click', 'td', function () {
	$('.update').fadeIn(1);
	var name = $(this).attr("id").replace('present','').replace('presvot','');
	var pass=false;
	var delName = name;
	
	while (!pass) {
		if (delName.includes("\'")){
			delName = delName.replace("\'", "&rsquo;");
		}
		else {
			pass = true;
		}
	}
	
	var delList = [delName];
	var statusList = [];
	var status = this.id.replace(name,'');
	var check1 = $('#present'+name).attr('class');
	var check2 = $('#presvot'+name).attr('class');
	
	if ($(this).hasClass('absent')) {
		$(this).removeClass('absent');
		$(this).addClass('pres');
		if(status == 'present') {
			var delObj = document.getElementById('presvot'+name);
			delObj.classList.remove("pres");
			delObj.classList.remove("absent");
			delObj.classList.add("absent");
			$('#delStatus option[value='+'\"'+name+'\"'+']').text('two');
			statusList = ['two'];
			$.ajax({
				url:'./php/functSaveStatus.php',
				method:'POST',
				data:{
					delList:delList,
					statusList:statusList,
					type:'table'
				},
				success:function(result) {
					$('.update').fadeOut(1);
				}
			});
		}
		else {
			var delObj = document.getElementById('present'+name);
			delObj.classList.remove("pres");
			delObj.classList.remove("absent");
			delObj.classList.add("absent");
			$('#delStatus option[value='+'\"'+name+'\"'+']').text('three');
			statusList = ['three'];
			$.ajax({
				url:'./php/functSaveStatus.php',
				method:'POST',
				data:{
					delList:delList,
					statusList:statusList,
					type:'table'
				},
				success:function(result) {
					$('.update').fadeOut(1);
				}
			});
		}
		if (check1 == 'absent' && check2 == 'absent') {
			$('#quorum-all').text(parseInt($('#quorum-all').text())+1);
			$('#quorum-third').text(Math.ceil(parseInt($('#quorum-all').text())/3));
			$('#quorum-half').text(Math.ceil(parseInt($('#quorum-all').text())/2));
		}
	}
	else if ($(this).hasClass('pres')){
		$(this).removeClass('pres');
		$(this).addClass('absent');
		$('#delStatus option[value='+'\"'+name+'\"'+']').text('one');
		statusList = ['one'];
		$.ajax({
			url:'./php/functSaveStatus.php',
			method:'POST',
			data:{
				delList:delList,
				statusList:statusList,
				type:'table'
			},
			success:function(result) {
				$('.update').fadeOut(1);
			}
		});
		
		$('#quorum-all').text(parseInt($('#quorum-all').text())-1);
		$('#quorum-third').text(Math.ceil(parseInt($('#quorum-all').text())/3));
		$('#quorum-half').text(Math.ceil(parseInt($('#quorum-all').text())/2));
	}
	else {
		$('.update').fadeOut(1);
	}
});

$('.del-speaker-form').change(function() {
	var del_name = this.value;
	var pg = $(this).attr("id").replace('-del-form','');
	
	if ($('#' + pg + 'Yield').text() == 'Yield') {
		$('#' + pg + '-del').append($("<option></option>").attr("value",del_name).text(del_name));
	}
	else {
		$('#' + pg + '-del option:first').attr("value",del_name).text(del_name);
		$('#'+pg+'Yield').click();
	}
	
	if ($('#'+pg+'Start').hasClass('disabled') && $('#'+pg+'Pause').hasClass('disabled')) {
		$('#'+pg+'Start').toggleClass('disabled');
		$('#'+pg+'Remove').toggleClass('disabled');
		$('#'+pg+'Yield').toggleClass('disabled');
		$('#'+pg+'Remove').removeClass('disabled');
		$('#'+pg+'ClearAll').toggleClass('disabled');
	}
	
	if ($('#' + pg + '-del > option').length >= 2 && $('#'+pg+'Next').hasClass('disabled')) {
		$('#'+pg+'Next').toggleClass('disabled');
	}
	
	$('#' + pg + '-del-form option:first').prop('selected', true);
	$('#' + pg + '-del option:first').prop('selected', true);
	
	$('#' + pg + '-name').text($("#" + pg +"-del option:selected").text());	
	name = "\""+$("#" + pg + "-del option:selected").text()+"\"";
	var src = $('#delData option[value='+name+']').text();
	$('#' + pg + '-flag').prop('src',src);
});

$('.yield').click(function() {
	var pg = $(this).attr("id").replace('Yield','');
	
	if (!$(this).hasClass('disabled') && $(this).text() == 'Yield') {
		$('#'+pg+'Pause').click();
		$('#'+pg+'Start').toggleClass('disabled');
		$(this).text('Cancel');
		$('#' + pg + '-del-form option:first').text('Yield Remaining Time to: ');
	}
	else if (!$(this).hasClass('disabled') && $(this).text() == 'Cancel') {
		$(this).text('Yield');
		$('#'+pg+'Start').toggleClass('disabled');
		
		if (pg == 'ps') {
			$('#' + pg + '-del-form option:first').text('Add Delegate to Primary Speakers List');
		}
		if (pg == 'ss') {
			$('#' + pg + '-del-form option:first').text('Add Delegate to Secondary Speakers List');
		}
	}
});

$('.clearAll').click(function() {
	var pg = $(this).attr("id").replace('ClearAll','');
	
	if (!$(this).hasClass('disabled')) {
		$('#' + pg + '-del').empty();
		!$(this).toggleClass('disabled');
		$('#'+pg+'Start').addClass('disabled');
		$('#'+pg+'Remove').addClass('disabled');
		$('#'+pg+'Yield').addClass('disabled');
		$('#'+pg+'Yield').text('Yield');
		if (pg == 'ps') {
			$('#' + pg + '-del-form option:first').text('Add Delegate to Primary Speakers List');
		}
		if (pg == 'ss') {
			$('#' + pg + '-del-form option:first').text('Add Delegate to Secondary Speakers List');
		}
		$('#' + pg + '-name').text('Delegate Name');	
		$('#' + pg + '-flag').prop('src','./img/allFlag/united-nations.png');
		$('#'+pg+'Remove').addClass('disabled');
		$('#'+pg+'Pause').addClass('disabled');
	}
});

$('.remove').click(function() {
	var pg = $(this).attr("id").replace('Remove','');
	
	if (!$(this).hasClass('disabled')) {
		$('#' + pg + '-del option:first').remove();
		if ($('#' + pg + '-del > option').length == 0) {
			$('#'+pg+'ClearAll').click();
		}
		else {
			$('#' + pg + '-del option:first').prop('selected', true);
			$('#' + pg + '-name').text($("#" + pg +"-del option:selected").text());	
			name = "\""+$("#" + pg + "-del option:selected").text()+"\"";
			var src = $('#delData option[value='+name+']').text();
			$('#' + pg + '-flag').prop('src',src);
		}
		if ($('#' + pg + '-del > option').length == 1) {
			$('#'+pg+'Next').addClass('disabled');
		}
	}
});

$('.next').click(function() {
	var pg = $(this).attr("id").replace('Next','');
	if (!$(this).hasClass('disabled')) {
		$('#' + pg + '-del option:first').prop('selected', true);
		
		if ($('#'+pg+'Cur').text() != '000') {
			$('.update').fadeIn(1);
			var name = $('#'+pg+'-name').text();
			var time = $('#'+pg+'Cur').text().split('');
			var minute = parseInt(time[0]);
			var seconds = parseInt(time[1] + time[2]);
			var total = (minute*60) + seconds;
			
			var array = $('#delStat option[value=' + '\"' + name +'\"'+']').text().replace('[','').replace(']','').split(',');
			array[0] = parseInt(array[0]) + total;
			$('#delStat option[value=' + '\"' + name +'\"'+']').text(array);
			var pass=false;
			var delName = name;
			while (!pass) {
				if (delName.includes("\'")){
					delName = delName.replace("\'", "&rsquo;");
				}
				else {
					pass = true;
				}
			}
			$.ajax({
				url:'./php/functSaveStat.php',
				method:'POST',
				data:{
					stat:array.toString(),
					name:delName,
					type:'table'
				},
				success:function(result) {
					$('.update').fadeOut(1);
				}
			});
		}
		$('#'+pg+'Pause').click();
		$('#'+pg+'Remove').click();
		document.getElementById(pg+"DispSp").innerHTML='0:00';
		$('#'+pg+'Cur').text('000');
	}
});

$("#file-upload").change(function() {
	$('#flag-error-box').fadeOut(10);
	$('.update').fadeIn(1);
	var num = $("#delList option:selected").length;
	if(num > 1 || num < 1) {
		error('flag','Must select one delegate!');
		this.value = "";
		$('.update').fadeOut(1);
   	}
   	else if (this.files[0] == null) {
   		$('.update').fadeOut(1);
   	}
   	else if(this.files[0].size < 10000000) {
   		var delAdd = new Array();
		var imgDel = new Array();
		var FR= new FileReader();
	
		FR.addEventListener("load", function(e) {
			var data = e.target.result
			document.getElementById("flagImg").src       = data;
			name = "\""+$("#delList option:selected").val()+"\"";
			$('#delData option[value='+name+']').text(data);
			imgDel.push(data);
			
			var delName = $("#delList option:selected").val();
			var pass=false;
			while (!pass) {
				if (delName.includes("\'")){
					delName = delName.replace("\'", "&rsquo;");
				}
				else {
					pass = true;
				}
			}
			delAdd.push(delName);
			$.ajax({
				url:'./php/functAddDel.php',
				method:'POST',
				data:{
					delAdd:delAdd,
					imgDel:imgDel,
					type:'table',
					update:'yes'
				},
				success:function(result) {
					$('.update').fadeOut(1);
				}
			});
		});
		
		FR.readAsDataURL( this.files[0] );
	}
   	else {
   		alert('toolarge');
   		$('.update').fadeOut(1);
   	}
});

function switchPg() {
	$('#admin').fadeOut(1);
	$('#admin-btn').removeClass('active');
	$('#rc').fadeOut(1);
	$('#rc-btn').removeClass('active');
	$('#rm').fadeOut(1);
	$('#rm-btn').removeClass('active');
	$('#ps').fadeOut(1);
	$('#ps-btn').removeClass('active');
	$("#psPause").trigger( "click" );
	$('#ss').fadeOut(1);
	$('#ss-btn').removeClass('active');
	$("#ssPause").trigger( "click" );
	$('#mc').fadeOut(1);
	$('#mc-btn').removeClass('active');
	$("#mcPause").trigger( "click" );
	$('#uc').fadeOut(1);
	$('#uc-btn').removeClass('active');
	$("#ucPause").trigger( "click" );
	$('#vo').fadeOut(1);
	$('#vo-btn').removeClass('active');
	$('#no').fadeOut(1);
	$('#no-btn').removeClass('active');
	$('#st').fadeOut(1);
	$('#st-btn').removeClass('active');
}
function error(page,message) {
	$('#'+page+'-error-box strong').text('Error');
	$('#'+page+'-error-box h6').text(message);
	$('#'+page+'-error-box').fadeIn('fast');
}
$('.alert .close').on('click', function(e) {
    $(this).parent().fadeOut('fast');
});

function remDel(remList,btn) {
	if (remList[0]) {
		$('.update').fadeIn(1);
		for (i=0;i<remList.length;i++) {
			var pass=false;
			var remName = remList[i];
			while (!pass) {
				if (remName.includes("\'")){
					remName = remName.replace("\'", "&rsquo;");
				}
				else {
					pass = true;
				}
			}
			remList[i] = remName;
		}
		$.ajax({
			url:'./php/functRemDel.php',
			method:'POST',
			data:{
				remDel:remList,
				type:'table'
			},
			success:function(result) {
				$('#'+btn+'-admin').toggleClass('running');
				$('.update').fadeOut(1);
			}
		});
	}
	else {
		$('#'+btn+'-admin').toggleClass('running');
	}
}

$('#vo-yes-btn').click(function() {
	$("#vo-list option:selected").each( function() {
		$(this).remove();
		$('#vo-yes').text(parseInt($('#vo-yes').text()) + 1);
		$('#vo-list option:first').prop('selected', true);
	});
});

$('#vo-abst-btn').click(function() {
	$("#vo-list option:selected").each( function() {
		$(this).remove();
		$('#vo-abst').text(parseInt($('#vo-abst').text()) + 1);
		$('#vo-list option:first').prop('selected', true);
	});
});

$('#vo-no-btn').click(function() {
	$("#vo-list option:selected").each( function() {
		$(this).remove();
		$('#vo-no').text(parseInt($('#vo-no').text()) + 1);
		$('#vo-list option:first').prop('selected', true);
	});
});

$('#vo-reset').click(function() {
	$('#vo-no').text(0);
	$('#vo-yes').text(0);
	$('#vo-abst').text(0);
	$('#vo-list').empty();
	
	$('#rc-table td').each(function() {
		if ($(this).hasClass('pres')) {
			var name = $(this).attr("id").replace('present','').replace('presvot','');
			$('#vo-list').append($("<option></option>").attr("value",name).text(name));
		}
	});
});

$('#st-reset').click(function() {
	$('.update').fadeIn(1);
	$('#st-reset').toggleClass('running');
	var r = confirm('Are you sure that you want to clear all statistics?');
	if (r){
		$('#delStat option').each(function() {
			$(this).text(0,0,0,0,0);
		});
		$('#no-btn').click();
		$('#st-btn').click();
		
		$.ajax({
			url:'./php/functSaveStat.php',
			method:'POST',
			data:{
				empty:'yes',
				type:'table'
			},
			success:function(result) {
				$('.update').fadeOut(1);
				$('#st-reset').toggleClass('running');
			}
		});
	}
	else {
		$('.update').fadeOut(1);
		$('#st-reset').toggleClass('running');
		return;
	}
});

function rmClick(x) {
	var id = $(x).attr('id').replace('rm-add','');
	$(x).toggleClass('running');
	
	var topic = $('#rm-top'+id).val();
	var dur = $('#rm-dur'+id).val();
	var sp = $('#rm-sp'+id).val();
	if ($('#rm-del'+id).val()) {
		if ($('#rm-mol'+id).val() == '1') {
			
			$('#mcTopic').val(topic);
			setSpTimer(sp,'mc')
			setDurTimer(dur, 'mc');
			
			$('#mc-btn').click();
			$(x).toggleClass('running');
		}
		else if ($('#rm-mol'+id).val() == '2') {
			
			$('#ucTopic').val(topic);
			setDurTimer(dur, 'uc');
			
			$('#uc-btn').click();
			$(x).toggleClass('running');
		}
		else {
			$(x).toggleClass('running');
			return;
		}
	}
	else {
		error('rm','Must select a delegate!');
		$(x).toggleClass('running');
		return;
	}
}

var elem = document.documentElement;

function openFullScreen() {
	if (elem.requestFullscreen) {
		elem.requestFullscreen();
  	} 
  	else if (elem.mozRequestFullScreen) { /* Firefox */
    		elem.mozRequestFullScreen();
  	}
   	else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
    		elem.webkitRequestFullscreen();
  	} 
  	else if (elem.msRequestFullscreen) { /* IE/Edge */
    		elem.msRequestFullscreen();
 	}
}

function closeFullScreen() {
	if (document.exitFullscreen) {    			
		document.exitFullscreen();
  	} 
  	else if (document.mozCancelFullScreen) { /* Firefox */
    		document.mozCancelFullScreen();
  	} 		
 	 else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
    		document.webkitExitFullscreen();
  	} 		
  	else if (document.msExitFullscreen) { /* IE/Edge */
    		document.msExitFullscreen();
  	}
}
function saveNotes() {
	var content = (quill.root.innerHTML);
	$.ajax({
		url:'./php/functSaveNotes.php'	              		,
		method:'POST',
	        data:{
	        	content:content,
	        	type:'committee'
	        },
	        success:function(result){
		}
	});
}

function deleteRow(r,table) {
	row = document.getElementById('row'+r);
        document.getElementById(table).deleteRow(row.rowIndex);
}
function makeRow(tableName, delName) {
	var table = document.getElementById(tableName);
	var row = table.insertRow();
	row.setAttribute('id', 'row'+delName);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	cell1.innerHTML = delName;
	cell1.setAttribute('id',delName);
	cell2.setAttribute('id', 'present'+delName);
	cell3.setAttribute('id', 'presvot'+delName);
	cell2.setAttribute('class','absent');
	cell3.setAttribute('class','absent');
}

function validate(event) {
	if ($.inArray(event.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl/cmd+A
            (event.keyCode == 65 && (event.ctrlKey === true || event.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (event.keyCode == 67 && (event.ctrlKey === true || event.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (event.keyCode == 88 && (event.ctrlKey === true || event.metaKey === true)) ||
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 
                 return;
      	}
        // Ensure that it is a number and stop the keypress
       if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
            event.preventDefault();
        }
}

function bubbleSort(a,b)  {  
    var swapped;  
    do {  
        swapped = false;  
        for (var i=0; i < a.length-1; i++) {  
            if (a[i] > a[i+1])   
            {  
                var temp = a[i];  
                a[i] = a[i+1];  
                a[i+1] = temp;  
                
                var temp = b[i];  
                b[i] = b[i+1];  
                b[i+1] = temp;  
                swapped = true;  
            }  
        }  
    } while (swapped);  
}

$('#logOut').on('click', function() {
	$('.update').fadeIn(1);
	$.ajax({
		url:'./php/functLogOut.php',
		method:'POST',
		data:{
		},
		success:function(result) {
			window.location.replace('https://runmun.app/portal');
		}
	});
});

$('#goToCrisis').on('click', function() {
	$('.update').fadeIn(1);
	window.location.replace('https://runmun.app/crisis');
});

$('#mc-del').click(function() {
	if ($( "#mc-del option:selected").text()) {
		if ($('#mcCurSp').text() != '000') {
			$('.update').fadeIn(1);
			var name = $('#mc-name').text();
			var time = $('#mcCurSp').text().split('');
			var minute = parseInt(time[0]);
			var seconds = parseInt(time[1] + time[2]);
			var total = (minute*60) + seconds;
			
			var array = $('#delStat option[value=' + '\"' + name +'\"'+']').text().replace('[','').replace(']','').split(',');
			array[0] = parseInt(array[0]) + total;
			$('#delStat option[value=' + '\"' + name +'\"'+']').text(array);
			var pass=false;
			var delName = name;
			while (!pass) {
				if (delName.includes("\'")){
					delName = delName.replace("\'", "&rsquo;");
				}
				else {
					pass = true;
				}
			}
			$.ajax({
				url:'./php/functSaveStat.php',
				method:'POST',
				data:{
					stat:array.toString(),
					name:delName,
					type:'table'
				},
				success:function(result) {
					$('.update').fadeOut(1);
				}
			});
		}
		$('#mc-name').text($("#mc-del option:selected").text());
		
		name = "\""+$("#mc-del option:selected").text()+"\"";
		var src = $('#delData option[value='+name+']').text();
		$('#mc-flag').prop('src',src);
		
		document.getElementById("mcDispSpT").innerHTML='0:00';
		document.getElementById("mcCurSp").innerHTML='000';
		
		
		
		if($('#mcStart').hasClass('disabled') && !$('#mcPause').hasClass('disabled')) {
			startSp('mc');
			moveSp('mc');
		}
		else if (!$('#mcStart').hasClass('disabled') && $('#mcPause').hasClass('disabled')) {
			start('mc');
			move('mc');
			startSp('mc');
			moveSp('mc');
		}
	}
});

function pause(pg) {
	var startB = pg + 'Start';
	var stopB = pg + 'Pause';
	if ($('#'+startB).hasClass('disabled') && !$('#'+stopB).hasClass('disabled')) {
		$('#'+startB).toggleClass('disabled');
		$('#'+stopB).toggleClass('disabled');
	} 
}

function reset(pg) {
	var startB = pg + 'Start';
	var stopB = pg + 'Pause';
	if ($('#'+startB).hasClass('disabled') && !$('#'+stopB).hasClass('disabled')) {
		$('#'+startB).toggleClass('disabled');
		$('#'+stopB).toggleClass('disabled');
	} 
}

function setDurTimer(timeDur,pg) {
	var timer = pg + 'DispDur';
	var dur = pg + 'Dur';
	var cur = pg + 'Cur';
	var curTimer = pg + 'DispSp';
	var timeDurList = timeDur.split("");
	var elem = document.getElementById(pg+"Bar");   
	
	if (timeDurList.length == 4) {
		var minutes = parseInt(timeDurList[0] + timeDurList[1]);
		var seconds = parseInt(timeDurList[2] + timeDurList[3]);
	}
	else if (timeDurList.length == 3) {
		var minutes = parseInt(timeDurList[0]);
		var seconds = parseInt(timeDurList[1] + timeDurList[2]);
	}
	else if (timeDurList.length == 2) {
		var minutes = 0;
		var seconds = parseInt(timeDurList[0] + timeDurList[1]);
	}
	else if (timeDurList.length == 1) {
		var minutes = 0;
		var seconds = parseInt(timeDurList[0]);
	}
	else if (!document.getElementById(dur).value) {
		var minutes = 0;
		var seconds = 0;
		document.getElementById(cur).innerHTML = '000';
		document.getElementById(curTimer).innerHTML= '0:00';			
	}
	if (seconds >= 60) {
		minutes +=1;
		seconds -= 60;
	}
	if (seconds < 10) {
		var seconds = '0'+seconds.toString()
	}
	if (minutes || seconds) {
		document.getElementById(dur).value = timeDur;
		document.getElementById(timer).innerHTML=minutes+":"+seconds;
	}
	
	if (parseInt(document.getElementById(cur).innerHTML) > parseInt(document.getElementById(dur).value)){
		document.getElementById(cur).innerHTML = '000';
		document.getElementById(curTimer).innerHTML= '0:00';
		runningNow = false;
	}
}

function start(pg) {
	var durTime = pg +'Dur';
	var startB = pg + 'Start';
	var stopB = pg + 'Pause';

	if (!$('#'+startB).hasClass('disabled') && document.getElementById(durTime).value) {
		$('#'+startB).toggleClass('disabled');
		$('#'+stopB).toggleClass('disabled');
		
			var timer = setInterval(updateTime, 1000);
			
			function updateTime() {
				
				$("#"+pg+"Reset").click(function() {
					document.getElementById(curTime).innerHTML='000';
					document.getElementById(curTimer).innerHTML='0:00';
					clearInterval(timer);
				});
				
				$("#"+pg+"Pause").click(function() {
					clearInterval(timer);
				});
									
				if (!runningNow) {
					move(pg);
				}
				
				var curTime = pg+'Cur';
				var timeList = document.getElementById(curTime).innerHTML.split('');
				var curTimer = pg+'DispSp';
				var durTime = pg+'Dur';
				var durTimer = pg+'DispDur';

				if (timeList.length == 3) {
					var minutes = parseInt(timeList[0]);
					var seconds = parseInt(timeList[1] + timeList[2]);
				}
				else if (timeList.length == 4) {
					var minutes = parseInt(timeList[0] + timeList[1]);
					var seconds = parseInt(timeList[2] + timeList[3]);
			    	}
			    	
				if (minutes == 0) {
					checkTime = seconds.toString();
				}
				else {
					if (seconds < 10) {
						sectxt = '0'+seconds;
					}
					else {
						sectxt = seconds.toString();
					}
					checkTime = minutes.toString()+sectxt;
				}
				
				if (parseInt(checkTime) < parseInt(document.getElementById(durTime).value.toString())) {
					seconds++;
										
					if (seconds < 10) {
						sectxt = '0'+seconds.toString();
					}
					else {
						sectxt = seconds.toString();
					}
					if (seconds == 60) {
						minutes++;
						sectxt = '00';
					}
					document.getElementById(curTimer).innerHTML=minutes+':'+sectxt;
					document.getElementById(curTime).innerHTML=minutes + sectxt;
				}
				else if (parseInt(checkTime) > parseInt(document.getElementById(durTime).value)) {
					document.getElementById(curTimer).innerHTML='0:00';
					document.getElementById(curTime).innerHTML='000';
				}
				
				if (!document.getElementById(durTime).value) {
					document.getElementById(curTime).innerHTML = '000';
					document.getElementById(curTimer).innerHTML= '0:00';
					runningNow = false;
					clearInterval(timer);
				}	  			
				
		}
	}
}
function move(pg) {
	var elem = $('#'+pg+'Bar');   
	var bar = document.getElementById(pg+'Bar');
	var width = parseInt(document.getElementById(pg+'Cur').innerHTML) / parseInt(document.getElementById(pg+'Dur').value) * 100;
	
	if (!runningNow && !$('#'+pg+'Pause').hasClass('disabled')) {
		runningNow = true;
	  	var preT = document.getElementById(pg+'Dur').value;
	  	var timeList = preT.split('');

		if (timeList.length == 3) {
			var minutes = parseInt(timeList[0]);
			var seconds = parseInt(timeList[1] + timeList[2]);
		}
		else if (timeList.length == 4) {
			var minutes = parseInt(timeList[0] + timeList[1]);
			var seconds = parseInt(timeList[2] + timeList[3]);
		}
		else if (timeList.length == 2) {
			var minutes = 0;
			var seconds = parseInt(timeList[0] + timeList[1]);
		}
		else {
			var minutes = 0;
			var seconds = parseInt(timeList[0]);
		}
		
		var dur = (minutes * 60) + seconds;
		if (document.visibilityState == 'hidden') {
			var id = setInterval(frame, 1000);
		}
		else {
			var id = setInterval(frame, 1000);	
		}
		
		function frame() {
			if (document.visibilityState == 'hidden') {
				var interval = (100/dur);
			}
			else {
				var interval = (100/dur);	
			}
			
			if (runningNow) {
			  	$('#'+pg+'Reset').click(function() {
					elem.css('width', '0').attr('aria-valuenow', '0')
					clearInterval(id);
					runningNow = false;
				});
				
				$('#'+pg+'Dur').bind('input', function() { 
					var x = parseInt(document.getElementById(pg+'Cur').innerHTML) / parseInt(document.getElementById(pg+'Dur').value) * 100;
					elem.css('width', x+'%').attr('aria-valuenow', x)
					clearInterval(id);
					runningNow = false;
				});
				
				$('#'+pg+'Pause').click(function() {
					bar.style.backgroundColor = "yellow";
					clearInterval(id);
					runningNow = false;
				});

				if ((parseInt(document.getElementById(pg+'Dur').value) - parseInt(document.getElementById(pg+'Cur').innerHTML)) <= 10 && (parseInt(document.getElementById(pg+'Dur').value) - parseInt(document.getElementById(pg+'Cur').innerHTML)) > 5) {
					bar.style.backgroundColor = "orange";
				}
				else if ((parseInt(document.getElementById(pg+'Dur').value) - parseInt(document.getElementById(pg+'Cur').innerHTML)) <= 5) {
					bar.style.backgroundColor = "red";
				}
				else {
					bar.style.backgroundColor = "green";
				}
			}
			else{
				clearInterval(id);
				runningNow = false;
				elem.css('width', '100%').attr('aria-valuenow', '100')
				bar.style.backgroundColor = "green";
			}

			if (width >= 100) {
			    	width -= interval;
			} else {
				width += interval; 
			     	elem.css('width', width+'%').attr('aria-valuenow', width)
			}
		}
	}
}

function setSpTimer(timeDur,pg) {
	var timer = pg + 'DispSpDur';
	var dur = pg + 'DurSp';
	var cur = pg + 'CurSp';
	var curTimer = pg + 'DispSpT';
	var timeDurList = timeDur.split("");
	var elem = document.getElementById(pg+"Bar1");   
	
	if (timeDurList.length == 3) {
		var minutes = parseInt(timeDurList[0]);
		var seconds = parseInt(timeDurList[1] + timeDurList[2]);
	}
	else if (timeDurList.length == 2) {
		var minutes = 0;
		var seconds = parseInt(timeDurList[0] + timeDurList[1]);
	}
	else if (timeDurList.length == 1) {
		var minutes = 0;
		var seconds = parseInt(timeDurList[0]);
	}
	else if (!document.getElementById(dur).value) {
		var minutes = 0;
		var seconds = 0;
		document.getElementById(cur).innerHTML = '000';
		document.getElementById(curTimer).innerHTML= '0:00';			
	}
	if (seconds >= 60) {
		minutes +=1;
		seconds -= 60;
	}
	if (seconds < 10) {
		var seconds = '0'+seconds.toString()
	}
	if (minutes || seconds) {
		document.getElementById(dur).value = timeDur;
		document.getElementById(timer).innerHTML=minutes+":"+seconds;
	}
	
	if (parseInt(document.getElementById(cur).innerHTML) > parseInt(document.getElementById(dur).value)){
		document.getElementById(cur).innerHTML = '000';
		document.getElementById(curTimer).innerHTML= '0:00';
		runningNow = false;
	}
}

function startSp(pg) {
	var startB = pg + 'Start';
	var stopB = pg + 'Pause';
	var spTime = pg + 'CurSp';
	var durTime = pg +'DurSp';
	
	if (document.getElementById(durTime).value) {
	
		var timer = setInterval(updateTime, 1000);
		
		function updateTime() {
		
			var curTime = pg+'CurSp';
			var timeList = document.getElementById(curTime).innerHTML.split('');
			var curTimer = pg+'DispSpT';
			var durTime = pg+'DurSp';
			var durTimer = pg+'DispSpDur';
					
			$("#"+pg+"Reset").click(function() {
				document.getElementById(curTime).innerHTML='000';
				document.getElementById(curTimer).innerHTML='0:00';
				clearInterval(timer);
			});
					
			$("#"+pg+"Pause").click(function() {
				clearInterval(timer);
			});
			
			$('#'+pg+'-del').click(function() {
				clearInterval(timer);
			});
									
			if (!runningNow) {
				move(pg);
			}
					
			if (timeList.length == 3) {
				var minutes = parseInt(timeList[0]);
				var seconds = parseInt(timeList[1] + timeList[2]);
			}
			else if (timeList.length == 4) {
				var minutes = parseInt(timeList[0] + timeList[1]);
				var seconds = parseInt(timeList[2] + timeList[3]);
		    	}
			    	
			if (minutes == 0) {
				checkTime = seconds.toString();
			}
			else {
				if (seconds < 10) {
					sectxt = '0'+seconds;
				}
				else {
					sectxt = seconds.toString();
				}
				checkTime = minutes.toString()+sectxt;
			}
			
			if (parseInt(checkTime) < parseInt(document.getElementById(durTime).value.toString())) {
				seconds++;
									
				if (seconds < 10) {
					sectxt = '0'+seconds.toString();
				}
				else {
					sectxt = seconds.toString();
				}
				if (seconds == 60) {
					minutes++;
					sectxt = '00';
				}
				document.getElementById(curTimer).innerHTML=minutes+':'+sectxt;
				document.getElementById(curTime).innerHTML=minutes + sectxt;
			}
			else if (parseInt(checkTime) > parseInt(document.getElementById(durTime).value)) {
				document.getElementById(curTimer).innerHTML='0:00';
				document.getElementById(curTime).innerHTML='000';
			}
			
			if (!document.getElementById(durTime).value) {
				document.getElementById(curTime).innerHTML = '000';
				document.getElementById(curTimer).innerHTML= '0:00';
				runningNow = false;
				clearInterval(timer);
			}	  				
		}
	}
}

function moveSp(pg) {
	var elem = $('#'+pg+'Bar1');   
	var bar = document.getElementById(pg+'Bar1');
	var width = parseInt(document.getElementById(pg+'CurSp').innerHTML) / parseInt(document.getElementById(pg+'DurSp').value) * 100;
	
	if (!$('#'+pg+'Pause').hasClass('disabled')) {
		runningNow = true;
	  	var preT = document.getElementById(pg+'DurSp').value;
	  	var timeList = preT.split('');

		if (timeList.length == 3) {
			var minutes = parseInt(timeList[0]);
			var seconds = parseInt(timeList[1] + timeList[2]);
		}
		else if (timeList.length == 4) {
			var minutes = parseInt(timeList[0] + timeList[1]);
			var seconds = parseInt(timeList[2] + timeList[3]);
		}
		else if (timeList.length == 2) {
			var minutes = 0;
			var seconds = parseInt(timeList[0] + timeList[1]);
		}
		else {
			var minutes = 0;
			var seconds = parseInt(timeList[0]);
		}
		
		var dur = (minutes * 60) + seconds;
		if (document.visibilityState == 'hidden') {
			var id = setInterval(frame, 1000);
		}
		else {
			var id = setInterval(frame, 1000);	
		}
		
		function frame() {
			if (document.visibilityState == 'hidden') {
				var interval = (100/dur);
			}
			else {
				var interval = (100/dur);	
			}
			
			if (runningNow) {
			  	$('#'+pg+'Reset').click(function() {
					elem.css('width', '0').attr('aria-valuenow', '0')
					clearInterval(id);
					runningNow = false;
				});
				
				$('#'+pg+'Dur').bind('input', function() { 
					var x = parseInt(document.getElementById(pg+'Cur').innerHTML) / parseInt(document.getElementById(pg+'Dur').value) * 100;
					elem.css('width', x+'%').attr('aria-valuenow', x)
					clearInterval(id);
					runningNow = false;
				});
				
				$('#'+pg+'Pause').click(function() {
					bar.style.backgroundColor = "yellow";
					clearInterval(id);
					runningNow = false;
				});
				$('#'+pg+'-del').click(function() {
					clearInterval(id);
				});

				if ((parseInt(document.getElementById(pg+'DurSp').value) - parseInt(document.getElementById(pg+'CurSp').innerHTML)) <= 10 && (parseInt(document.getElementById(pg+'DurSp').value) - parseInt(document.getElementById(pg+'CurSp').innerHTML)) > 5) {
					bar.style.backgroundColor = "orange";
				}
				else if ((parseInt(document.getElementById(pg+'DurSp').value) - parseInt(document.getElementById(pg+'CurSp').innerHTML)) <= 5) {
					bar.style.backgroundColor = "red";
				}
				else {
					bar.style.backgroundColor = "green";
				}
			}
			else{
				clearInterval(id);
				runningNow = false;
				elem.css('width', '100%').attr('aria-valuenow', '100')
				bar.style.backgroundColor = "green";
			}

			if (width >= 100) {
			    	width -= interval;
			} else {
				width += interval; 
			     	elem.css('width', width+'%').attr('aria-valuenow', width)
			}
		}
	}
}