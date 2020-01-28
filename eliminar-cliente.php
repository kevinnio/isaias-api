<?php



/*echo("DELETE FROM clientes WHERE idCliente=" . $_GET["id"]);
require_once("inc/functions.php");

if(!isset($_GET["id"])) {
    $result=query("DELETE FROM clientes WHERE idCliente=" . $_GET["id"]);
    echo("DELETE FROM clientes WHERE idCliente=" . $_GET["id"]);
    mysqli_fetch_array($result);
    header("Location: clientes.php");
}*/

require_once("inc/functions.php");
	 if (empty($_POST['idCliente'])){
			$errors[] = "IDCliente Null";
		}   else if (
			!empty($_POST['idCliente']) 
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$idCliente=intval($_POST['idCliente']);
		
		//$sql="DELETE FROM Clientes WHERE idCliente='".$idCliente."'";
		$query_delete = query('DELETE FROM clientes WHERE idCliente ='.$idCliente);
		
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