<?php 
require_once("../config.php");
require_once("AdminQuestionDAO.php");
require_once("AdminQuestionHandler.php");

$id = $_POST['que_num'];

$Handler = new AdminQuestionHandler();
$result = $Handler->deleteQuestion($id);

if ($result) {
	echo json_encode(
			array(
				'status' => 'succcess',
				'respone' => 'Successfully Deleted!'
			)
		);
} else {
	echo json_encode(
			array(
				'status' => 'failed',
				'respone' => 'Not Deleted!!'
			)
		);
}
 ?>