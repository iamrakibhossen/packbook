jQuery(document).ready(function ($) {

    $('[data-toggle="tooltip"]').tooltip();

    $(document).ready(function () {
        $('#booking-form #parcel_type label.active').trigger('click');

        $(window).scrollTop(0);

        return false;
    });


    $(document).on('click', '#booking-form #parcel_type label', function () {

        var $this = $(this);

        var ptype = $this.children('input').val();

        if (ptype == 'pallet') {

            $('#booking-form #all-meta').show();
            $('#booking-form #contaner-meta').hide();
            $('#booking-form #atypical-meta').hide();

            $('#booking-form #all-price').hide();
            $('#booking-form #pallet-price').show();
            $('#booking-form #contaner-price').hide();
            $('#booking-form #atypical-price').hide();

        } else if (ptype == 'contaner') {

            $('#booking-form #all-meta').hide();
            $('#booking-form #contaner-meta').show();
            $('#booking-form #atypical-meta').hide();

            $('#booking-form #all-price').hide();
            $('#booking-form #pallet-price').hide();
            $('#booking-form #contaner-price').show();
            $('#booking-form #atypical-price').hide();


        } else if (ptype == 'atypical') {

            $('#booking-form #all-meta').hide();
            $('#booking-form #contaner-meta').hide();
            $('#booking-form #atypical-meta').show();

            $('#booking-form #all-price').hide();
            $('#booking-form #pallet-price').hide();
            $('#booking-form #contaner-price').hide();
            $('#booking-form #atypical-price').show();

        } else {


            $('#booking-form #all-meta').show();
            $('#booking-form #contaner-meta').hide();
            $('#booking-form #atypical-meta').hide();

            $('#booking-form #all-price').show();
            $('#booking-form #pallet-price').hide();
            $('#booking-form #contaner-price').hide();
            $('#booking-form #atypical-price').hide();

        }

    });


    $("input[name='user_type']").change(function () {

        if ($(this).val() === 'private') {

            $('#signup-nnp').addClass('d-none');

        } else {

            $('#signup-nnp').removeClass('d-none');

        }


    });

    $(window).on('load change keyup', function (e) {

        e.preventDefault();

        if ('#booking-form'.length) {
            price_update();

        }

        return false;

    });

    function price_update() {

        var bookform = $('#booking-form');

        var parcel_type = bookform.find('input[name="parcel_type"]').val();
        var service = bookform.find('.active input[name="service"]').val();

        $('span#carrier-price').each(function (index, element) {
            $(this).html('<div class="spinner-border spinner-border-sm" role="status"></div>');
        });


        var data = {
            action: 'packbook-ajax-pricing',
            nonce: obj_packbook.nonce,
            parcel_type: parcel_type,
            parcel_length: bookform.find('input[name="parcel_length"]').val(),
            parcel_width: bookform.find('input[name="parcel_width"]').val(),
            parcel_height: bookform.find('input[name="parcel_height"]').val(),
            parcel_weight: bookform.find('input[name="parcel_weight"]').val(),
            parcel_insurance: bookform.find('input[name="parcel_insurance"]').val(),
            send_from: bookform.find('select[name="sender_country_code"]').val(),
            send_to: bookform.find('select[name="receiver_country_code"]').val()
        };

        var cs = obj_packbook.currency_symbol;


        $.ajax({
            type: 'post',
            url: obj_packbook.ajaxurl,
            data: data,
            success: function (response) {

                var data = $.parseJSON(response);

                $('span#carrier-price').each(function (index, element) {
                    $(this).html('<i class="fas fa-exclamation-circle"></i>');
                });

                $.each(data, function (i, v) {

                    if (i == 'parcel') {

                        console.log(data.parcel);

                        $.each(data.parcel, function (key, val) {

                            if ($('#all-price label[data-id="' + key + '"] span#carrier-price').length) {
                                if (val) {
                                    $('#all-price label[data-id="' + key + '"] span#carrier-price').html(val + ' ' + cs);
                                } else {
                                    $('#all-price label[data-id="' + key + '"] span#carrier-price').html('<i class="fas fa-exclamation-circle"></i>');
                                }
                            } else {
                                $('#all-price label[data-id="' + key + '"] span#carrier-price').html('<i class="fas fa-exclamation-circle"></i>');

                            }

                        });
                    } else if (i == 'envelope') {
                        $.each(data.envelope, function (key, val) {
                            $('#all-price label[data-id="' + key + '"] span#carrier-price').html(val + ' ' + cs);
                        });
                    } else if (i == 'pallet') {
                        $.each(data.pallet, function (key, val) {
                            $('#pallet-price label[data-id="' + key + '"] span#carrier-price').html(val + ' ' + cs);
                        });
                    }

                    $('span#carrier-price .spinner-border').each(function (index, element) {
                        $(this).parent('span#carrier-price').html('<i class="text-danger fas fa-exclamation-circle"></i>');
                    });

                });

                var price = bookform.find('label.active span#carrier-price').html();

                bookform.find('#total_cost').val(price);
            }
        });

        return false;

    }

    //ajax upload avatar
    $('#packbook_user_avatar').change(function () {
        $('.error-msg-avatar').hide();
        $('#avatarform').submit();
    });

    if ($('#avatarform').length) {
        var options = {
            beforeSubmit: showRequest_avatar,
            success: showResponse_avatar,
            url: obj_packbook.ajaxurl
        };
        $('#avatarform').ajaxForm(options);
    }

    function showRequest_avatar(formData, jqForm, options) {
        $('#avatarform .ajax-loader-avatar').show();

        var ext = $('#packbook_user_avatar').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $('#avatarform .ajax-loader-avatar').hide();
            $('.error-msg-avatar').html('<div class="alert alert-warning"><strong>' + obj_packbook.__invalidimagefile + '</strong></div>').fadeIn();
            return false;
        }
    }

    function showResponse_avatar(responseText, statusText, xhr, $form) {
        if (responseText == 'error') {
            $('#avatarform .ajax-loader-avatar').hide();
            $('.error-msg-avatar').html('<div class="alert alert-warning"><strong>' + obj_packbook.__invalidimagefile + '</strong></div>').fadeIn();
        } else {
            var data = $.parseJSON(responseText);
            $('#avatar-wrapper').fadeOut(function () {
                $('#avatar-wrapper .img-polaroid').attr('src', data.thumbnail);
                $('#avatar-delete').removeAttr('disabled');
                $('#avatarform .ajax-loader-avatar').hide();
                $('#coverform').css('top', $('#avatarform').offset().top + $('#avatarform').height() + 54);
                $('#avatar-anchor').css('margin-bottom', $('#avatarform').height() + $('#coverform').height() + 153);
                $('#avatar-wrapper').slideDown();
            });
        }
    }

    //delete avatar
    $('#avatar-delete').on('mouseup', function () {
        var ajaxloader = $('.ajax-loader-avatar');
        var delete_btn = $(this);
        var id = delete_btn.data('id');
        delete_btn.attr('disabled', 'disabled');
        ajaxloader.show();

        var data = {
            action: 'packbook-delete-avatar',
            nonce: obj_packbook.nonce,
            id: id
        };

        $.ajax({
            type: 'post',
            url: obj_packbook.ajaxurl,
            data: data,
            success: function () {
                ajaxloader.hide();
                $('#avatar-wrapper').fadeOut(function () {
                    $('#coverform').css('top', $('#avatarform').offset().top + $('#avatarform').height() - 69);
                    $('#avatar-anchor').css('margin-bottom', $('#avatarform').height() + $('#coverform').height() + 80);
                });
            }
        });
        return false;
    });

});