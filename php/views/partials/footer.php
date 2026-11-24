		</section>
		<footer class="footer p-2 bg-light text-center border-top">
		<div class="row">
			<div class="col-md-4 p-4 text-muted">
				<p></p>
			</div>
		</div>
		<hr>
		<p class="wt-text text-muted">Desarrollado por UPTT "Mario Briceño Iragorry"</p>
	</footer>


	</body>
	<script src="js/jquery-3.5.1.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/sweetalert2@9.js"></script>
	<script>
		var filter_count = document.getElementById('cantidad');
			
		if(filter_count != null){
			filter_count.addEventListener('change', e => {
				if(filter_count.value == 2){
					document.getElementById('second-filter').style.display = "block";
				}else{
					document.getElementById('second-filter').style.display = "none";
				}
			});
		}

		var report = document.getElementById('tipo');
		if(report != null){
			report.addEventListener('change', e => {
				if(report.value == 'I'){
					document.getElementById('second-filter').style.display = "block";
				}else{
					document.getElementById('second-filter').style.display = "none";
				}
			});
		}


		$(document).ready(function(){
			$('#rm-block').hide();
			$(document).on('click', '#btn-read', function(){
				$('#rm-block').show();
				$(this).hide();
			})
		})

		function mueveReloj(){
		    momentoActual = new Date()
		    hora = momentoActual.getHours()
		    minuto = momentoActual.getMinutes()
		    segundo = momentoActual.getSeconds()

		    fecha = new Date()
		    horaImprimible = hora + " : " + minuto + " : " + segundo

		    document.getElementById('reloj').innerHTML = horaImprimible
		    document.getElementById('fecha').innerHTML = fecha.getDate() + " / " + fecha.getMonth() + " / " + fecha.getYear()

		    setTimeout("mueveReloj()",1000)
		}

	</script>
</html>
