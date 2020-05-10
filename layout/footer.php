</div>
<script src="assets/js/jquery-3.3.1.min.js" ></script>
<script src="assets/js/popper.min.js" ></script>
<script src="assets/js/bootstrap.min.js" ></script>
<script src="assets/js/jquery.maskMoney.min.js" ></script>
<script src="/assets/js/jquery.maskedinput.min.js" ></script>
<script>
  $(function() {
    $('.moeda').maskMoney({
        decimal: ",",
        thousands: "."
    });
  });
  $('.cpf').mask("999.999.999-99");
  $('.celular').mask("99999-9999");

  $(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
  
</script>
</body>
</html>