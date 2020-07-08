<html xmlns="https://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Get adaccount</title>
</head>
<body>	
	<form method="post" id="ajax_form">
        <textarea id="tokens" rows="10" cols="50" ></textarea><br>
        <input type="button" id="check" value="Получить активные аккаунты" onclick="getadaccount();"/>
        <input type="button" id="check" value="Получить приложения аккаунта" onclick="getapplications();"/>
    </form>

    <br>

    <div id="result_form_left" style="width:20%; float:left;"></div>  
    <div id="result_form_right"  style="width:80%; float:left;"></div>  
</body>
<script type="text/javascript" src=" https://code.jquery.com/jquery-1.11.2.js "></script>
<script type="text/javascript">
	function getadaccount(){
		$('#result_form_left').html('');
    	let array = document.getElementById("tokens").value.split('\n').filter(str=>str.length>5);
    	let data = '';
    		$.each(array,function(index,value){
  				$.ajax({
                type: 'POST',
                url: 'getaccount.php',
                dataType: 'json',
                data: {value:value},
                success: function (response, textStatus, XMLHttpRequest) { 
        			console.log (response);	
        			$.each(response,function(index,value){
        				$('#result_form_left').append(value+'<br>');
        			});
        			
            		}
 				});
 		});
    }
    function getapplications(){
		$('#result_form_right').html('');
    	let array = document.getElementById("tokens").value.split('\n').filter(str=>str.length>5);
    	let data = '';
    		$.each(array,function(index,value){
  				$.ajax({
                type: 'POST',
                url: 'getapp.php',
                dataType: 'json',
                data: {value:value},
                success: function (response, textStatus, XMLHttpRequest) { 
        			console.log (response);	
        			$.each(response,function(index,value){
        				$('#result_form_right').append(value+'<br>');
        			});
        			
            		}
 				});
 		});
    }
	
	
</script>
</html>