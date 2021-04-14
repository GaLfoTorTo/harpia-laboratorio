  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} Harpia Laboratório.</strong>
    Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/js/pages/dashboard.js"></script>
<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/jquery.maskedinput.js"></script>
<script src="/js/alertify.min.js"></script>
<script>
    $('.telefone').mask('(99) 99999-9999');
    $('.cep').mask('99999-999');
    $(document).ready(function(){
      var valor = document.querySelector('.cpf_cnpj');
      if(valor.value == ''){
        $('.tipo').click(function(){
          var id = $(this).attr('id');
          if(id == 'tipo_cpf'){
            $('.cpf_cnpj').removeAttr('readonly');
            $(".cpf_cnpj").mask("999.999.999-99");
          }else if(id == 'tipo_cnpj'){
            $('.cpf_cnpj').removeAttr('readonly');
            $(".cpf_cnpj").mask("99.999.999/9999-99");
          }
        });
      }else if( valor.value.length > 0 && valor.value.length <= 14){
        $('.cpf_cnpj').removeAttr('readonly');
        $('#tipo_cpf').attr('checked', true);

      }else if(valor.value.length > 14){
        $('.cpf_cnpj').removeAttr('readonly');
        $('#tipo_cnpj').attr('checked', true);
      }
      
    });
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
     
</script>
<script>
  $('.alteraManual').on('change', function(){
    if($(this).val() == 'Sim') {
      $('.camposLocalizacao').show();
    }else {
      $('.camposLocalizacao').hide();

    }
  })

 alertify.set('notifier','position', 'top-right');
 @if(session('success'))
  alertify.success('{{session('success')}}');
  @endif
  @if(session('danger'))
  alertify.error('{{session('danger')}}');
@endif


</script>
</body>
</html>
