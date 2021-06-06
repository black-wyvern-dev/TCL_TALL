$(document).ready(function(){
    var pixie = new Pixie({
        baseUrl: asset_url,
        ui: {
            visible: false, // whether pixie is visible initially
            mode: 'overlay',
            toolbar: {
                hideOpenButton: true,
                hideCloseButton: true,
            },
            nav: {
                position: 'top',
                replaceDefault: true,
                items: [
                    {name: 'draw', icon: 'pencil-custom', action: 'draw'},
                    {name: 'text', icon: 'text-box-custom', action: 'text'},
                    {name: 'shapes', icon: 'polygon-custom', action: 'shapes'},
                    {name: 'stickers', icon: 'sticker-custom', action: 'stickers'},
                ]
            },
            openImageDialog: null,
        },
        ToolbarItemAction : ['exportImage', 'toggleHistory', 'closeEditor'],
        onLoad : function () {
            $('.mat-focus-indicator.mat-menu-trigger.mat-button.mat-button-base.ng-star-inserted').css('display','none')
            // $('.mat-focus-indicator.mat-button.mat-button-base.mat-icon-button.ng-star-inserted').css('display','none')
            $('toolbar .right').find('toolbar-item').eq(2).css('display', 'none')
        },
        onOpen : function() {
            $('navigation-bar .scroll-container').find('button').eq(1).css('display', 'none')
            $('navigation-bar .scroll-container').find('button').eq(2).css('display', 'none')
            $('navigation-bar .scroll-container').find('button').eq(3).css('display', 'none')
            
            $('.parentForm').attr('onsubmit', "return false")
        },
        onSave: function(data, name) {
            let current_Url;
            let imageId;
            let imageFormId;

            name = 'hirer_signature-image.' + name.split('.').pop()
            current_Url = $('#hirer_signature-image').attr('src')
            imageId = '#hirer_signature-image'
            imageFormId = '#hirer_signature-image-form'

            pixie.http()
                .post(image_saveUrl, 
                    {
                        _token : csrf_token ,
                        name: name,
                        data: data,
                        current_Url : current_Url
                    })
                .subscribe(function(response) {
                    $(imageId).attr('src', response.filePath)
                    $(imageFormId).attr('value', response.filePath)
                    // console.log(response);
                });
        },
        onClose : function () {
            $('.parentForm').attr('onsubmit', "")
        }
    });

    const modalClose = (modal) => {
        const modalToClose = document.querySelector('.'+modal);
        modalToClose.classList.remove('fadeIn');
        modalToClose.classList.add('fadeOut');
        $(`.${modal}`).css('display', 'none');
    }
    
    const openModal = (modal) => {
        const modalToOpen = document.querySelector('.'+modal);
        modalToOpen.classList.remove('fadeOut');
        modalToOpen.classList.add('fadeIn');
        modalToOpen.style.display = 'flex';
    }
    $("#terms_conditions_confirm").on('click', function() {
        openModal('terms_conditions-modal');
    });
    $(".terms_conditions_close").on('click', function() {
        if($("#terms_check").prop("checked") == true)
        {
            $( "#hirer_name" ).prop( "disabled", false )
            $( "#hirer_position" ).prop( "disabled", false )
            $( "#hirer_behalf" ).prop( "disabled", false )
            $( "#hirer_sign_date" ).prop( "disabled", false )
            
            var html = `<a id = "hirer_signature">
                            <img id="hirer_signature-image" class="mx-auto" src="${hirer_signature}" alt="tcl_signature-image">
                        </a>`
            $( "#hirer_signature_div").html(html)
            $('#hirer_signature').on('click', function() {
                specify = 'hirer_signature-image'
                pixie.openEditorWithImage(document.querySelector('#hirer_signature-image'));
            })
        } else {
            $( "#hirer_name" ).prop( "disabled", true )
            $( "#hirer_position" ).prop( "disabled", true )
            $( "#hirer_behalf" ).prop( "disabled", true )
            $( "#hirer_sign_date" ).prop( "disabled", true )
            
            var html = `<img id="hirer_signature-image" class="mx-auto" src="${hirer_signature}" alt="tcl_signature-image">`
            $( "#hirer_signature_div").html(html)
        }
        modalClose('terms_conditions-modal');
    });
    $(".down").click(function() {
        $('html, body').animate({
            scrollTop: $(".up").offset().top
        }, 1500);
    });
    $(".up").click(function() {
        $('html, body').animate({
            scrollTop: $(".down").offset().top - 250
        }, 1000);
    }); 
});