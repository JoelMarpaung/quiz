<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('quickadmin/js') }}/bootstrap.min.js"></script>
<script src="{{ url('quickadmin/js') }}/main.js"></script>

{{--  Berikut JS dari Matrix dan W3School  --}}
{{--  <script src="{{ asset ('js/backend_js/excanvas.min.js') }}"></script> 
<script src="{{ asset ('js/backend_js/jquery.min.js') }}"></script> 
<script src="{{ asset ('js/backend_js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset ('js/backend_js/bootstrap.min.js') }}"></script> 
<script src="{{ asset ('js/backend_js/jquery.flot.min.js') }}"></script> 
<script src="{{ asset ('js/backend_js/.flot.resize.min.js') }}"></script> 
<script src="{{ asset ('js/backend_js/jquery.peity.min.js') }}"></script> 
<script src="{{ asset ('js/backend_js/fullcalendar.min.js') }}"></script> 
<script src="{{ asset ('js/backend_js/matrix.js') }}"></script> 
<script src="{{ asset ('js/backend_jsmatrix.dashboard.js') }}"></script> 
<script src="{{ asset ('js/backend_jsjquery.gritter.min.js') }}"></script> 
<script src="{{ asset ('js/backend_jsmatrix.interface.js') }}"></script> 
<script src="{{ asset ('js/backend_jsmatrix.chat.j') }}s') }}"></script> 
<script src="{{ asset ('js/backend_jsjquery.validate.js') }}"></script> 
<script src="{{ asset ('js/backend_jsmatrix.form_validation.js') }}"></script> 
<script src="{{ asset ('js/backend_jsjquery.wizard.js') }}"></script> 
<script src="{{ asset ('js/backend_jsjquery.uniform.js') }}"></script> 
<script src="{{ asset ('js/backend_jsselect2.min.js') }}"></script> 
<script src="{{ asset ('js/backend_jsmatrix.popover.js') }}"></script> 
<script src="{{ asset ('js/backend_jsjquery.dataTables.min.js') }}"></script> 
<script src="{{ asset ('js/backend_jsmatrix.tables.js') }}"></script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  --}}

{{--  end  --}}

<script>
    window._token = '{{ csrf_token() }}';
</script>

@yield('javascript')