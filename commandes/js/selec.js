function getdetail(val) {
	$.ajax({
		type : "POST", 
		url: "get_detail.php",
		data:'IDOFFRES='+val,
		success : function(data){
			$("#NUMOFFRE-text").val(data);2
			$("#MISSIONS-text").val(data);
			
		}
});
}