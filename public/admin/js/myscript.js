$("div.alert").delay(3000).slideUp();

$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true,
            "iDisplayLength": 50
    });
});


$(document).ready(function() {
	$('#add_image').click(function() {
    	$('#insert').append('<div class="form-group"><label>Choose Images</label><input type="file" name="fEditDetail[]" /></div>');
    });
});

$(document).ready(function() {
	$('a#del_image').click(function() {
		var url = '/admin/product/delete_img/';
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idImg= $(this).parent().find("img").attr("idImg");
		var rid= $(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idImg,
			type: 'GET',
			cache: false,
			data: {"_token":_token},
			success: function(data) {
				if (data == "ok") {
					$("#"+rid).remove();
				} else {
					alert("Error! Not Delete This Image!");
				}
			}
		});
	});

	$('a#saveSale').click(function() {
		var idP = $(this).attr("idP");
		var priceSale = $(this).parent().parent().find(".price_sale").val();
		var url = '/admin/product/save-sale';
		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {"idP":idP, "priceSale":priceSale},
			success: function(data) {
				if (data == "ok") {
					document.getElementById("check"+idP).innerHTML = "<i class='fa fa-check fa-fw'></i>";
				} else {
					alert("Sorry! System Errors.")
				}
			}
		});
	});

	$('a#saveShip').click(function() {
		var idTran = $(this).attr("idTran");
		var priceShip = $(this).parent().parent().find(".ship").val();
		var url = '/admin/transaction/ship';
		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {"idTran":idTran, "priceShip":priceShip},
			success: function(data) {
				if (data == "ok") {
					document.getElementById("checkShip").innerHTML = "<i class='fa fa-check fa-fw'></i>";
					if (priceShip == 0) {document.getElementById("priceShip").innerHTML = "Free";}
					else {document.getElementById("priceShip").innerHTML = priceShip+"đ";}
				} else {
					alert("Sorry! System Errors.")
				}
			}
		});
	});

});



function confirm_delete(msg) {
	if (window.confirm(msg)) {
		return true;
	}
	return false;
};
