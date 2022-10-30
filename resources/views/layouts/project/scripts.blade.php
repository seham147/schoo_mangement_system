<!-- jQuery -->
<script src="{{ asset('build/assets/plugins/jquery/jquery.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="{{ asset('build/assets/') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('build/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('build/assets/plugins/chart.js/Chart.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('build/assets/plugins/sparklines/sparkline.js') }}"></script>

<!-- JQVMap -->
<script src="{{ asset('build/assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>


<script src="{{ asset('build/assets/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>


<!-- jQuery Knob Chart -->
<script src="{{ asset('build/assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>


<!-- daterangepicker -->
<script src="{{ asset('build/assets/plugins/moment/moment.min.js') }}"></script>


<script src="{{ asset('build/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>


<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('build/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>


<!-- Summernote -->
<script src="{{ asset('build/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>


<!-- overlayScrollbars -->
<script src="{{ asset('build/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('build/assets/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('build/assets/js/pages/dashboard.js') }}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{ asset('build/assets/js/demo.js') }}"></script>


<script>
    // console.log('kkkkkkkk')
 function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }


        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    


        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });



    $(document).ready(function () {
        $('select[name="Grade_id_new"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id_new"]').empty();
                        $('select[name="Classroom_id_new"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });


    $(document).ready(function () {
        $('select[name="Classroom_id_new"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id_new"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });







</script>
@yield('scripts')
