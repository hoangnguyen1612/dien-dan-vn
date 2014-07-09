
  $(document).ready(function(){
     
    
    $("#RMAForm").formToWizard({ submitButton: 'submitMe' })
    
    $("#InvoiceDate").datepicker();
    
    var textarea = $('.OtherText');
    var textlabel = $('.OtherLabel');
    var wilabel = $('.WILabel');
    var wiselect = $('.WISelect');
    textarea.hide();
    textlabel.hide();
    wilabel.hide();
    wiselect.hide();

    $('.OtherCheck').change(function(){
            var selectL = $(this).val();
            if (selectL == 'Other' || selectL == 'Defective'){
              textlabel.show();
              textarea.show();
              wilabel.hide();
              wiselect.hide();
              $(".OtherText").addClass("required");
            }
            else if (selectL == 'Wrong Item'){
              wilabel.show();
              wiselect.show();
              textlabel.hide();
              textarea.hide();
              $(".WISelect").addClass("required");
            }
            else {
              textlabel.hide();
              textarea.hide();
              wilabel.hide();
              wiselect.hide();
            }
    });
    
    var i = 2;
    
    $("#AddOne").click(function () {
        if (i < 11) {
            var itemNum = "<div class='iSep'>Item "+ i +"</div>";
            $(".cloneSet:first").clone().prepend(itemNum).addClass("cloneSet2").appendTo("#cloneRet").children(":not(div):not(br)").each(function(){
            $(this).val("");
            $(".SaveVal:last").val("1");
            var nameAttr = $(this).attr("name") + i;
            var forAttr = $(this).attr("for") + i;
            $(this).not("label").attr("name", nameAttr);
            $(this).not("select").not("textarea").attr("for", forAttr);
            });
            
            var dynamiclabel = $("label[for=OtherText" + i + "]").hide();
            var dynamicarea = $("textarea[name=OtherText" + i + "]").hide();
            var dynamicWILabel = $("label[for=WrongItemChoice" + i + "]").hide();
            var dynamicWISelect = $("select[name=WrongItemChoice" + i + "]").hide();
            
            $("select[name=ReasonforRMA" + i + "]").change(function(){
            var selectD = $(this).val();
            if (selectD == 'Other' || selectD == 'Defective'){
              dynamiclabel.show();
              dynamicarea.show();
              dynamicWILabel.hide();
              dynamicWISelect.hide();
              $(".OtherText").addClass("required");
            }
            else if (selectD == 'Wrong Item'){
              dynamicWILabel.show();
              dynamicWISelect.show();
              dynamiclabel.hide();
              dynamicarea.hide();
              $(".WISelect").addClass("required");
            }
            else {
              dynamiclabel.hide();
              dynamicarea.hide();
              dynamicWILabel.hide();
              dynamicWISelect.hide();
            }                        
            });
            i++;
        }
    });

    $("#RemoveOne").click(function(){
        if (i >= 3 && i <= 11) {
        $(".cloneSet:last").remove();    
        i--;            
        }
    });
    

    
  });
/* Created by jankoatwarpspeed.com */

(function($) {
    $.fn.formToWizard = function(options) {
        options = $.extend({  
            submitButton: "" 
        }, options); 
        
        var element = this;

        var steps = $(element).find("fieldset");
        var count = steps.size();
        var submmitButtonName = "#" + options.submitButton;
        $(submmitButtonName).hide();

        // 2
        $(element).before("<ul id='steps'></ul>");

        steps.each(function(i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands' class='stepContainer'></p>");
            $(submmitButtonName).prependTo(".stepContainer:last");
            // 2
            var name = $(this).find("legend").html();
            $("#steps").append("<li id='stepDesc" + i + "'>Bước " + (i + 1) + "<span>" + name + "</span></li>");

            if (i == 0) {
                createNextButton(i);
                selectStep(i);
            }
            else if (i == count - 1) {
                $("#step" + i).hide();
                createPrevButton(i);
            }
            else {
                $("#step" + i).hide();
				createNextButton(i);
                createPrevButton(i);
            }
        });

        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#RMAForm' id='" + stepName + "Prev'><button class='prev' type='button'>Quay lại</button></a>");

            $("#" + stepName + "Prev").bind("click", function(e) {
                $("#" + stepName).hide();
                $("#step" + (i - 1)).show();
                $(submmitButtonName).hide();
                selectStep(i - 1);
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#RMAForm' id='" + stepName + "Next'><button class='next' type='button'>Kế tiếp</button></a>");

            $("#" + stepName + "Next").bind("click", function(e) {

				var validator = $("#RMAForm").validate({
					 rules: { 
							'data[ten_dien_dan]': {
								required: true,
								minlength: 3,
								maxlength: 25,
								remote: 
									{
										url: "/home/dien_dan/kiem_tra.php",
										type: "POST",
										cache: false,
										data: {
										  ten_dien_dan: function() {
											return $( "#ten_dien_dan" ).val();
										  },
										  linh_vuc: function() {
											return $( "#lv" ).val();
										  }
										}
									}		
							},
							'data[slogan]': {
								required: true,
								minlength: 10
							},
							'data[mo_ta]': {
								required: true,
								minlength: 25
							},
						}, 
						messages: { 
							'data[ten_dien_dan]':{
								required:" Vui lòng nhập tên diễn đàn",
								minlength: ' Tên diễn đàn phải có tối thiểu 3 ký tự',
								maxlength: ' Tên diễn đàn chỉ tối đa 25 ký tự',
								remote: ' Tên diễn đàn này đã tồn tại, vui lòng chọn tên diễn đàn khác'
							},
							'data[slogan]': {
								minlength: ' Câu khẩu hiệu của diễn đàn phải có ít nhất 10 ký tự',
								required:" Vui lòng nhập câu khẩu hiệu cho diễn đàn",
							},
							'data[mo_ta]': {
								required:" Vui lòng nhập mô tả cho diễn đàn",
								minlength: ' Mô tả về diễn đàn phải có ít nhất 25 ký tự',
							},
						},
						
				})

				if($("#RMAForm").validate().form())
				{		
				
					$("#" + stepName).hide();
					$("#step" + (i + 1)).show();
			
					if (i + 2 == count)
						$(submmitButtonName).show();
					selectStep(i + 1);
				}
			});
        }

        function selectStep(i) {
            $("#steps li").removeClass("step-current");
            $("#stepDesc" + i).addClass("step-current");
        }

    }
})(jQuery); 
