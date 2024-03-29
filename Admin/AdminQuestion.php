<?php
require_once("../config.php");
require_once("AdminQuestionDAO.php");
require_once("AdminQuestionHandler.php");

$Handler = new AdminQuestionHandler();

$results = $Handler->getAllQuestions();
if(empty($results)){
	echo "<script>alert('Empty Table!');window.location.href='AdminQuestion.php'</script>";
} 

?>
<html>
<head>
	<title>Online Examnation</title>
  	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<header>
  <div class ="container" >
          <div class="navbar">
            <a class="brand font-brand" href="registration.php"> LVCC Examination</a>
          </div>
          <div class = "pull-right">
          	<a href="AdminSignOut.php" style = "margin-top:20px;"><?=$_SESSION['fname']." ".$_SESSION['lname']?></a>
          </div>
  </div>
</header>
<div class = "container span12" style = "margin-left:100px;margin-right:100px;margin-top:20px">
	<div class = "span2 wellko">
		<div class = "row well"  style = "margin:-10px;">
			<h4>Options:</h4><hr>
			<button class = "btn btn-primary" style = "width:150px;margin-bottom:10px" id = "add">Add Questions</button>
		</div>

		<div class = "row well"  style = "margin:-10px;margin-top:30px;height:290px">
			<button class = "btn btn-info" style = "width:150px;margin-top:220px;" id = "return">Return</button>
		</div>
	</div>
	<div class = "span8 wellko">
		<div class = "row well"  style = "margin:-10px;">
			<h3>All Questions</h3>
		</div>
		<div class = "row well questions"  style = "margin:-10px;">
			<?php foreach ($results as $key):?>
				<p><b><?= $key['id']?>.</b> <td><?= $key['question']?></p>
					<p><b style = "color:green">Choices: </b><b>A.</b> <?= $key['choice_a']?> <b>B.</b> <?= $key['choice_b']?> <b>C.</b> <?= $key['choice_c']?> <b>D.</b> <?= $key['choice_d']?></p>
					<p><b style = "color:skyblue">Answer: </b><?= $key['answer']?></p>
					<p><b style = "color:red;margin-left:350px;">Action:</b>
						<a href="AdminDelete.php?id=<?= $key['id']?>"><button class = "btn btn-danger" style = "width:150px;">Delete</button></a>
						<a href="AdminEdit.php?id=<?= $key['id']?>"><button class = "btn btn-warning" style = "width:150px;">Edit</button></a>
					</p>
			<?php endforeach ?>
		</div>
	</div>

</div>
    <script type="text/javascript" src = "../js/jquery.1.10.2.js"></script>
    <script type="text/javascript" src = "../js/Admin.js"></script>
</body>
</html>


