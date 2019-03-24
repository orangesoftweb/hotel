<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Amenecer</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">      
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegación de palanca</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Perfil del usuario</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    <li>
                        <a class="active-menu" href="messages.php"><i class="fa fa-desktop"></i> Boletines informativos</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Reserva de habitacion</a>
                    </li>
                    <li>
                        <a href="Payment.php"><i class="fa fa-qrcode"></i> Pago</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Lucro</a>
                    </li>
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                    </li>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 	<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
							Boletines informativos<small> panel</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 <?php
				include('db.php');
				$mail = "SELECT * FROM `contact`";
				$rew = mysqli_query($con,$mail);
				
			   ?>
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron">
							<h3>Send to newsletter to subscribed</h3>
							<?php
							while($rows = mysqli_fetch_array($rew))
							{
								$app=$rows['approval'];
								if($app=="Subscribed")//Allowed
								{

								}
							}
							?>
							<p></p>
                        	<p>
								<div class="panel-body">
									<button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">
									  Crear campañas publicitarias
									</button>
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Redactar Boletín</h4>
												</div>
												<form method="post">
													<div class="modal-body">
														<div class="form-group">
														<label>Título</label>
														<input name="title" class="form-control" placeholder="Enter Title">
														</div>
													</div>
													<div class="modal-body">
														<div class="form-group">
														<label>Tema</label>
														<input name="subject" class="form-control" placeholder="Enter Subject">
														</div>
													</div>
													<div class="modal-body">
														<div class="form-group">
														  <label for="comment">Noticias</label>
														  <textarea name="news" class="form-control" rows="5" id="comment"></textarea>
														</div>
													 </div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													   <input type="submit" name="log" value="Send" class="btn btn-primary">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<?php
								//Mailchimp
								use \DrewM\MailChimp\MailChimp;
								require '../vendor/autoload.php';
								$MailChimp = new MailChimp('117e9faefbd5bb32ed8c39a352361087-us20');
								$list_id = '6589d61c1c';
							
								if(isset($_POST['log']))
								{												
									//Maichimp
									$template_id = 24829;
									$reply_to = 'orangesoft@programmer.net';
									$from_name = 'OrangeSoftWeb';
									$newsletter_subject_line = $_POST['subject'];
									$title = $_POST['title'];
									$news = $_POST['news'];
									// Create or Post new Campaign
									$result = $MailChimp->post("campaigns", [
										'type' => 'regular',
										'recipients' => ['list_id' => $list_id],
										'settings' => ['subject_line' => $newsletter_subject_line,
											   'reply_to' => $reply_to,
											   'from_name' => $from_name
											  ]
										]);
									$response = $MailChimp->getLastResponse();
									$responseObj = json_decode($response['body']);
									//$campaign = $MailChimp->get('campaigns' . $responseObj->id );*/
									//IdCampaign
									$result = $MailChimp->get('campaigns');
									$campaign = $result['campaigns'][0]['id'];
									// Manage Campaign Content
									$html = "<div mc:edit='body_content'>
												<h1>$title</h1>
												<p>$news<p>
											</div>";
									//$html = file_get_contents('editable.php');
									$result = $MailChimp->put('campaigns/' . $responseObj->id . '/content', [
										  'template' => ['id' => $template_id, 
											'sections' => ['body_content' => $html]
											]
										  ]);
									
									$log ="INSERT INTO `newsletterlog`(`mailchimp`,`title`, `subject`, `news`) VALUES ('$campaign', '$_POST[title]', '$_POST[subject]', '$_POST[news]')";
									//echo $log;
									if(mysqli_query($con,$log))
									{
										echo '<script>alert("New Campaign Added") </script>' ;

									}								
								}								
								?>                          
							</p>
						</div>
                	</div>
            	</div>
               <?php				
				$sql = "SELECT * FROM `contact`";
				$re = mysqli_query($con,$sql);				
			   ?>
				<div class="row"><h1 style="text-align: center">Suscriptores</h1><hr>
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Numero celular</th>
												<th>Email</th>
												<th>Fecha</th>
												<th>Estado</th>
												<th>Aprobación</th>
												<th>Eliminar</th>                
											</tr>
										</thead>
										<tbody>
										<?php
											while($row = mysqli_fetch_array($re))
											{
												$id = $row['id'];

												if($id % 2 ==1 )
												{
													echo"<tr class='gradeC'>
														<td>".$row['fullname']."</td>
														<td>".$row['phone']."</td>
														<td>".$row['email']."</td>
														<td>".$row['cdate']."</td>
														<td>".$row['approval']."</td>
														<td><a href=newsletter.php?eid=".$id ." <button class='btn btn-primary'> <i class='fa fa-edit' ></i> Permission</button></td>
														<td><a href=newsletterdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
													</tr>";
												}
												else
												{
													echo"<tr class='gradeU'>
														<td>".$row['fullname']."</td>
														<td>".$row['phone']."</td>
														<td>".$row['email']."</td>
														<td>".$row['cdate']."</td>
														<td>".$row['approval']."</td>
														<td><a href=newsletter.php?eid=".$id." <button class='btn btn-primary'> <i class='fa fa-edit' ></i> Permission</button></td>
														<td><a href=newsletterdel.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete </button></td>		
													</tr>";

												}									
											}									
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
				<?php				
				$sql = "SELECT * FROM `newsletterlog`";
				$re = mysqli_query($con,$sql);
			   ?>
				<div class="row"><h1 style="text-align: center">Campañas</h1><hr>
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>Titulo</th>
												<th>Asunto</th>
												<th>Noticia</th>
												<th>Enviar</th>
												<th>Eliminar</th>
											</tr>
										</thead>
										<tbody>
										<?php
											while($row = mysqli_fetch_array($re))
											{
												$id = $row['id'];
												$id2 = $row['mailchimp'];
												if($id % 2 ==1 )
												{
													echo"<tr class='gradeC'>
														<td>".$row['title']."</td>
														<td>".$row['subject']."</td>
														<td>".$row['news']."</td>
														<td><a href=campaign.php?eid=".$id2 ." <button class='btn btn-success'> <i class='fa fa-edit' ></i> Send</button></td>
														<td><a href=campaigndel.php?eid=".$id2 ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
													</tr>";
												}
												else
												{
													echo"<tr class='gradeU'>
														<td>".$row['title']."</td>
														<td>".$row['subject']."</td>
														<td>".$row['news']."</td>
														<td><a href=campaign.php?eid=".$id2 ." <button class='btn btn-success'> <i class='fa fa-edit' ></i> Send</button></td>
														<td><a href=campaigndel.php?eid=".$id2 ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete </button></td>		
													</tr>";

												}									
											}									
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--End Advanced Tables -->
					</div>
				</div>
                <!-- /. ROW  -->
	   		</div>         
		</div>                   
    </div>
	<!-- /. PAGE INNER  -->
 	<!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>  
   
</body>
</html>