<?php 

require_once("inc/functions.php");
	 if (empty($_POST['idViaje'])){
			$errors[] = "IDViaje Null";
		}   else if (
			!empty($_POST['idViaje']) 
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$idViaje=intval($_POST['idViaje']);
		
		//$sql="DELETE FROM Viajes WHERE idViaje='".$idViaje."'";
		$query_delete = query('DELETE FROM viajes WHERE idViaje ='.$idViaje);
		
			if ($query_delete){
				$messages[] = "Los datos han sido eliminados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>&iexcl;Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>

 