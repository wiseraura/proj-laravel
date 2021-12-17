<!-- Vendor JS -->
<script src="{{ asset('admin/js/vendors.min.js') }}"></script>
{{--<script src="{{ asset('admin/js/pages/chat-popup.js') }}"></script>--}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="{{ asset('admin/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin/assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor_components/datatable/datatables.min.js') }}"></script>

{{--<script src="{{ asset('admin/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>--}}
{{--<script src="{{ asset('admin/assets/vendor_components/moment/min/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>--}}

<!-- EduAdmin App -->
<script src="{{ asset('admin/js/template.js') }}"></script>
{{--<script src="{{ asset('admin/js/pages/dashboard3.js') }}"></script>--}}
{{--<script src="{{ asset('admin/js/pages/calendar.js') }}"></script>--}}

<script src="{{ asset('admin/js/pages/data-table.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.sidebar-menu a').each(function() {
            $current = location.href;
            $target= $(this).attr('href');
            if ($current.includes($target)) {
                $(this).parent('li').addClass('active');
            }
        });
    });
</script>

@yield('script')
