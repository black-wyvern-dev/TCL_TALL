$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#cleaning_status_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $("#cleaning_status_image_form").on('change', function(){        
        readURL(this);
    });
    
    $("#cleaning_status_image").on('click', function() {            
       $("#cleaning_status_image_form").click();
    });

    function clear_form(form_id, tank_type) {
        toastr.error("<span id='confirmationRevertYes' class='pl-10'>Yes</span><span id='confirmationRevertNo' class='pl-10'>No</span>",'Are you sure, refresh all?',
		{
			closeButton: false,
			allowHtml: true,
			onShown: function (toast) {
				$("#confirmationRevertYes").click(function(){	

                    $(form_id).find("input[type=text], textarea").val("")
                    $(form_id).find("input[type=checkbox]").prop("checked", false)
                    $(form_id).find("input[type=radio]").prop("checked", false)                    

                    $("#int-video_html5_api").trigger('pause')
                    $("#int-video_html5_api").removeAttr('src')
                    $("#int-video_html5_api").get(0).load()
                    $("#int_video_form").val('')
                    
                    $("#ext-video_html5_api").trigger('pause')
                    $("#ext-video_html5_api").removeAttr('src')
                    $("#ext-video_html5_api").get(0).load()
                    $("#ext_video_form").val('')                    
                                        
                    $("#cleaning_status_image").attr('src', '/img/tanker1.jpg')
                    $("#cleaning_status_image_form").attr('value', '')

                    $("#left-side-image").attr('src', `/img/splat-side-1${tank_type}.png`)
                    $("#left-side-image-form").attr('value',`/img/splat-side-1${tank_type}.png`)

                    $("#front-side-image").attr('src', `/img/splat-side-front${tank_type}.png`)
                    $("#front-side-image-form").attr('value',`/img/splat-side-front${tank_type}.png`)

                    $("#back-side-image").attr('src', `/img/splat-rear${tank_type}.png`)
                    $("#back-side-image-form").attr('value',`/img/splat-rear${tank_type}.png`)

                    $("#right-side-image").attr('src', `/img/splat-side-2${tank_type}.png`)
                    $("#right-side-image-form").attr('value','value',`/img/splat-side-2${tank_type}.png`)

                    $("#internal-image").attr('src', `/img/splat-internal${tank_type}.png`)
                    $("#internal-image-form").attr('value',`/img/splat-internal${tank_type}.png`)

                    $("#Good").prop("checked", true)
                    $("#Empty").prop("checked", true)
                    
                    var now = new Date();    
                    var day = ("0" + now.getDate()).slice(-2);
                    var month = ("0" + (now.getMonth() + 1)).slice(-2);                
                    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;                    
                    $('#tcl_sign_date').val(today);
                    $("#hirer_sign_date").val(today);

                    $("#hirer_signature-image").attr('src','/img/sign.png')
                    $("#hirer_signature-image-form").attr('value','/img/sign.png')

                    $("#tcl_signature-image").attr('src', '/img/sign.png')
                    $("#tcl_signature-image-form").attr('value','/img/sign.png')
                    
                    $("#tcl_name").val(user['name'])
                    $("#tcl_position").val(user['jobtitle'])
                    $("#tcl_behalf").val('TCL Tanker Rental Limited')
                    
                    toastr.success("Done! Record cleared successful.", 'Success!', {timeOut: 5000});
				});
			}
		});
    }

    $("#abort_nr_btn").click(function() {
        // clear_form('#check-list-nrs-form', '')
    })
    $("#abort_rigid_btn").click(function() {
        // clear_form('#check-list-rigids-form', '')
    })
    $("#abort_milk_btn").click(function() {
        // clear_form('#check-list-milks-form', '-milk')
    })   
    $("#abort_food_btn").click(function() {
        // clear_form('#check-list-foods-form', '-food')
    })
    $("#abort_vacuum_btn").click(function() {
        // clear_form('#check-list-vacuums-form', '-vacuum')
    })
    $("#abort_waste_btn").click(function() {
        // clear_form('#check-list-wastes-form', '-waste')
    })
    $("#abort_petrol_btn").click(function() {
        // clear_form('#check-list-petrols-form', '-petrol')
    })       

    $('.toggle-checkbox').click(function() {
        $('.overlay').css("display", "");
        setTimeout(removeSpinner, 10000);
    })
});

function removeSpinner(){
    $('.overlay').css("display", "none");
}