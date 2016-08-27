$(window).load(function() {
	$(".se-pre-con").fadeOut("slow");;
});

$(document).ready(function() {
	$('a#editCart').click(function() {
		var rowId = $(this).attr("idRow");
		var idP = $(this).attr("idP");
		var url = '/sua-gio-hang';
		var qty = $(this).parent().parent().find(".edit_Cart").val();
		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {"rowId":rowId,"idP":idP,"qty":qty},
			success: function(data) {
				if (data == "ok") {
					window.location = "gio-hang.html";
				} else {
					alert("Số lượng sản phẩm này không đủ trong cửa hàng!");
				}
			}
		});
	});

	$('a#addtoCart').click(function() {
		var idP = $(this).attr("idP");
		var url = '/them-gio-hang';
		var count = document.getElementById("countCart").innerHTML;
		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {"id":idP},
			success: function(data) {
				if (data == "oke") {
					document.getElementById("add"+idP).innerHTML = "<a href='javascript:void(0)'><button class='btn btn-success'><i class='fa fa-check-square'></i>&nbsp;Đã Thêm vào giỏ hàng</button></a>";
					count++;
					document.getElementById("countCart").innerHTML = count;
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
}