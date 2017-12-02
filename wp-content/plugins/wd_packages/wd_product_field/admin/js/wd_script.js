//****************************************************************//
/*              SHORTCODE JS              */
//****************************************************************//
jQuery(document).ready(function($) {
    //Metabox repeatable field
    wd_metabox_repeatable_field();

    //Metabox Datepicker
    //wd_metabox_datepicker();
});

//****************************************************************//
/*                          FUNCTIONS                             */
//****************************************************************//
//Metabox repeatable field
if (typeof wd_metabox_repeatable_field != 'function') {
    function wd_metabox_repeatable_field() {
        jQuery('.wd-metabox-add-row').on('click', function() {
            var table_id = jQuery(this).data('id');
            var row = jQuery('#' + table_id + ' .hidden.wd_metabox_content_repeatable').clone(true);
            row.removeClass('hidden wd_metabox_content_repeatable');
            row.insertBefore('#' + table_id + ' tbody>tr:last');
            return false;
        });

        //Remove row button
        jQuery('.wd-metabox-remove-row').on('click', function() {
            jQuery(this).parents('tr').remove();
            return false;
        });

        //Range Slider
        var slider  = jQuery('.wd-range-slider'),
            range   = jQuery('.wd-range-slider-range'),
            value   = jQuery('.wd-range-slider-value');
        
        slider.each(function(){

        value.each(function(){
            var value = jQuery(this).prev().attr('value');
            jQuery(this).html(value);
        });

        range.on('input', function(){
            jQuery(this).next(value).html(this.value);
        });
      });

    }
}

if (typeof wd_get_date != 'function') {
     function wd_get_date(element) {
        var date;
        try {
            date = jQuery.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }
}

//Metabox Datepicker
if (typeof wd_metabox_datepicker != 'function') {
    function wd_metabox_datepicker() {
        /*var dateFormat = "dd/mm/yy";

        //Datepicker normal
        jQuery(".datepicker").datepicker({
            dateFormat: dateFormat,
            //numberOfMonths: 3,
            showButtonPanel: true
        });

        //Datepicker from/to
        var from = jQuery(".datepicker-from").datepicker({
            dateFormat: dateFormat,
            defaultDate: "+1w",
            changeMonth: true,
            //numberOfMonths: 3
        }).on("change", function(e) {
            to.datepicker("option", "minDate", wd_get_date(this));
        });

        var to = jQuery(".datepicker-to").datepicker({
            dateFormat: dateFormat,
            defaultDate: "+1w",
            changeMonth: true,
            //numberOfMonths: 3
        }).on("change", function(e) {
            from.datepicker("option", "maxDate", wd_get_date(this));
        });*/
    }
}