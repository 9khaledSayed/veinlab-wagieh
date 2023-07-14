<script>
    let imagesBasePath  = "{{ asset('/storage/Images') }}";
    let currency        = " {{ __( settings()->get('currency') ) }} ";
    let locale          = "{{ getLocale() }}";
    let ordersStatuses  = @json( settings()->get('orders_statuses') );
</script>
<script src="{{asset('dashboard-assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('dashboard-assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('js/dashboard/translations.js')}}"></script>
<script src="{{asset('js/dashboard/global_scripts.js')}}"></script>
<script src="{{asset('dashboard-assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('dashboard-assets/js/custom/utilities/modals/users-search.js')}}"></script>

<script>
    var alertUploadFileHtml = `{!! alertUploadFileHtml() !!}`
    if($(`input[type="file"]`).length > 0){
        $(`#dashboardContent`).prepend(alertUploadFileHtml);
    }

    
    function restrictInputOtherThanArabic($field)
        {
          // Arabic characters fall in the Unicode range 0600 - 06FF
          var arabicCharUnicodeRange = /[\u0600-\u06FF]/;

          $field.bind("keypress", function(event)
          {
            var key = event.which;
            // 0 = numpad
            // 8 = backspace
            // 32 = space
            if (key==8 || key==0 || key === 32)
            {
              return true;
            }

            var str = String.fromCharCode(key);
            if ( arabicCharUnicodeRange.test(str) )
            {
              return true;
            }
            
            return false;
          });
        }

        jQuery(document).ready(function() {
            // allow arabic characters only for following fields
            restrictInputOtherThanArabic($('.gui-input'));
        });


     // accept english only
    $(".en-input").keypress(function(event){
    var ew = event.which;
    if(ew == 32)
        return true;
    if(48 <= ew && ew <= 57)
        return true;
    if(65 <= ew && ew <= 90)
        return true;
    if(97 <= ew && ew <= 122)
        return true;
    return false;
     });
     
</script>
@stack('scripts')
