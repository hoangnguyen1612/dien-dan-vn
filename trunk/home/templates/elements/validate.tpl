<script>
$(document).ready(function(){
    var validator = $("#signup_form").validate({ 
        rules: { 
			ho_ten: {
				required: true
			},
		 	ngay_sinh: {
				date: true, 
                required: true, 
            }, 
            mat_khau: { 
                required: true, 
                minlength: 6, 
            }, 
            nhap_lai_mat_khau: {
				required: true,
                equalTo: "#password" 
            }, 
            email: { 
                required: true, 
                email: true,
				remote:{   //gọi AJAX tương tự $.ajax của jquery
					url: "../nguoi_dung/kiem_tra_email.php",// gọi đến trang kiểm tra username
					type: "post",
					//data :  nếu cần
   				 }
            }
        }, 
        messages: { 
			ho_ten:{
				required:" Bạn chưa nhập họ tên",
			},
			ngay_sinh: {
				date: " Vui lòng nhập ngày hợp lệ",
				required: " Bạn chưa nhập ngày sinh"
			},
            mat_khau: { 
                required: " Bạn chưa nhập mật khẩu", 
                minlength: " Mật khẩu phải có ít nhất 6 ký tự"
            }, 
            nhap_lai_mat_khau: { 
				required: " Bạn chưa nhập mật khẩu xác nhận",
                equalTo: "Mật khẩu xác nhận không chính xác" 
            }, 
            email: { 
                required: " Bạn chưa nhập địa chỉ email", 
                email:" Địa chỉ email không hợp lệ",
				remote: " Địa chỉ email này đã tồn tại, vui lòng chọn email khác"
            }
        },
		submitHandler: function(){
			$("#loading").show();
			$.ajax({
				type: "POST",
				url: "../nguoi_dung/dang_ky_sm.php",
				dataType: "json",
				data: $("#signup_form").serialize(),
				success: function(data){
					if(data.error==true)
					{
						if(data.ho_ten==true)
						{
							$("#err-fullname").show();
							document.getElementById("err-fullname").innerHTML = data.message;
						}
						if(data.gioi_tinh==true)
						{
							$("#err-gender").show();
							document.getElementById("err-gender").innerHTML = data.message;
						}
						if(data.ngay_sinh==true)
						{
							$("#err-birthday").show();
							document.getElementById("err-birthday").innerHTML = data.message;
						}
						if(data.ten_dang_nhap==true)
						{
							$("#err-username").show();
							document.getElementById("err-username").innerHTML = data.message;
						}
						if(data.mat_khau==true)
						{
							$("#err-password").show();
							document.getElementById("err-password").innerHTML = data.message;
						}
						if(data.nhap_lai_mat_khau==true)
						{
							$("#err-rpassword").show();
							document.getElementById("err-rpassword").innerHTML = data.message;
						}
					}
					else
					{
						$("#loading").hide();
						alert(data.message);
						location.reload();
					}
				}
			});
		}
    });
	
	 var validator_login = $("#login_form").validate({ 
	 	rules: { 
			email: {
				email: true,
				required: true
			},
		 	mat_khau: {
                required: true, 
				minlength: 6, 
            }, 
		},
		 messages: { 
			mat_khau: { 
				required: " Bạn chưa nhập mật khẩu", 
				minlength: " Mật khẩu phải có ít nhất 6 ký tự"
			}, 
            email: { 
                required: " Bạn chưa nhập địa chỉ email", 
                email:" Địa chỉ email không hợp lệ",
            }
		 },
		 submitHandler: function(){
			$("#loading").show();
			$.ajax({
				type: "POST",
				url: "../nguoi_dung/dang_nhap_sm.php",
				dataType: "json",
				data: $("#login_form").serialize(),
				success: function(data){
					$("#loading").hide();
					if(data.error == true)
						alert(data.message);
					else
						location.reload();	
				}
			})
		 }
			
	 }); 
	 
	 var validator_co_ban_form = $("#co_ban_form").validate({ 
	 	rules: { 
			ho_ten: {
				required: true
			},
		 	ngay_sinh: {
                required: true, 
				date: true, 
            }, 
		},
		 messages: { 
			ho_ten:{
				required:" Bạn chưa nhập họ tên",
			},
			ngay_sinh: {
				date: " Vui lòng nhập ngày hợp lệ",
				required: " Bạn chưa nhập ngày sinh"
			},
		 },
		submitHandler: function(){
			$("#loading").show();
			$.ajax({
				type: "POST",
				url: "co_ban_sm.php",
				dataType: "json",
				data: $("#co_ban_form").serialize(),
				success: function(data){
					$("#loading").hide();
					if(data.error==true)
					{
						if(data.ho_ten==true)
						{
							$("#err-fullname").show();
							document.getElementById("err-fullname").innerHTML = data.message;
						}
						if(data.gioi_tinh==true)
						{
							$("#err-gender").show();
							document.getElementById("err-gender").innerHTML = data.message;
						}
						if(data.ngay_sinh==true)
						{
							$("#err-birthday").show();
							document.getElementById("err-birthday").innerHTML = data.message;
						}
					}
					else
					{
						$("#loading").hide();
						alert(data.message);
						location.reload();	
					}
				}
			})
		 }
	 }); 
	 
	 var validator_lien_he_form = $("#lien_he_form").validate({ 
	 	rules: {
			dia_chi: {
				required: true
			},
		 	dien_thoai: {
                required: true, 
				number: true, 
            }, 
		},
		 messages: { 
		 	dia_chi:{
				required:" Bạn chưa nhập địa chỉ",
			},
			dien_thoai: {
				required: " Bạn chưa nhập số điện thoại",
				number: " Số điện thoại phải là kiểu số"
			},
		 },
		submitHandler: function(){
			$("#loading").show();
			$.ajax({
				type: "POST",
				url: "lien_he_sm.php",
				dataType: "json",
				data: $("#lien_he_form").serialize(),
				success: function(data){
					$("#loading").hide();
					if(data.error==true)
					{
						alert(data.message);
					}
					else
					{
						$("#loading").hide();
						alert(data.message);
						location.reload();	
					}
				}
			})
		 }
	 }); 
})
</script>