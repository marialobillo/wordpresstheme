<?php
include_once('class.phpmailer.php');

  $response = "";
    //response messages

    $missing_content = "Por favor, rellene todos los campos.";
    $email_invalid   = "Revise el Email, por favor.";
    $message_unsent  = "Ha ocurrido algún problema, no se ha podido enviar su correo, 
          intentelo de nuevo.";
    $message_sent    = "Gracias, su mensaje has sido enviado con éxito.";

 
    //function to generate response
    function my_contact_form_generate_response($type, $message){
 
        global $response;
     
        if($type == "success") $response = "<div class='success'>{$message}</div>";
        else $response = "<div class='error'>{$message}</div>";
 
    }

 //my_contact_form_generate_response("error", $missing_content);


  if(isset($_POST['email'])){


    $email = $_POST['email'];

    //php mailer variables
    $to = get_option('admin_email');
    $destino = $to; //email del admin

    $nombre = $_POST['nombre'];
    $cuerpo = $_POST['observaciones'];

    $observaciones = $cuerpo; 

     $observaciones = 'Nombre: ' . $nombre . "\n" .
                      "Email: " . $email . "\n\n" . $cuerpo;  

    $mail = new PHPMailer();

     
    //$mail->IsSMTP();  // telling the class to use SMTP
    //$mail->Host     = "smtp.example.com"; // SMTP server

    $mail->AddReplyTo($email, $nombre);
    $mail->AddAddress($destino, '5sentidos Contacto');
    $mail->SetFrom($email, $nombre);
    
    $mail->CharSet = "UTF-8";

    $mail->Subject  = 'Atencion al cliente';
    $mail->Body     = $observaciones;
    $mail->WordWrap = 50;

    
    //VALIDACIONES DE LOS CAMPOS

    
    //validate presence of name and message
    if(empty($cuerpo)){
      my_contact_form_generate_response("error", $missing_content);
    }
    else 
    {
        //validate presence of name and message
            if(empty($nombre)){
              my_contact_form_generate_response("error", $missing_content);

            }
            else{

              //validate email
                 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                  my_contact_form_generate_response("error", $email_invalid);
                  }
                  else //ready to go!
                  {
                    //send email

                     
                     $sent = $mail->Send();

                     if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
                     else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent

                     
                  }

          }
    }

   
    

  }
?>
<?php get_header(); ?>
<style type="text/css">
  .error{
    padding: 5px 9px;
    border: 1px solid red;
    color: red;
    border-radius: 3px;
  }
 
  .success{
    padding: 5px 9px;
    border: 1px solid green;
    color: green;
    border-radius: 3px;
  }
 
  
</style>
 
  <div >
   
 
      <?php while ( have_posts() ) : the_post(); ?>
 
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
            <header >
          		<div class='mititulo'>
           				<div class='superior'> </div>
                  <div class='superior-derecha'></div>
           				<div class='centro'>
                    <img src="<?php bloginfo('template_url'); ?>/img/iconos/iconoContactomini.png">
                    <?php the_title(); ?></div>
           				<div class='inferior'></div>
                  <div class='inferior-derecha'></div>
        			</div>
            </header>
 
 <div class='clearfix'></div>

    <div class="panel panel-con-sombra">

      <div class='content-page'>
              <?php the_content(); ?>
 
            <div class='message'>
                 <?php echo $response; ?>
            </div>

      </div>


          <div class="respond">

          	<form method='post' action='<?php the_permalink(); ?>'>
          		<span>Nombre</span><br>
          		<input type="text"  value="<?php echo $nombre; ?>" name='nombre'>
          		<br>
          		<span>Email</span><br>
          		<input type="email"  value="<?php echo $email; ?>" name='email'>        	 
          		<br>
          		<span>Observaciones</span><br>
          		<textarea name='observaciones' id='cuerpo' rows="7" cols="100"  >
                <?php echo $cuerpo; ?>
          		</textarea>
          		<br>
		
	<!--
 
  <form action="<?php the_permalink(); ?>" method="post">
    <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
    <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
    <p><label for="message_text">Message: <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
    <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
    <input type="hidden" name="submitted" value="1">
    <p><input type="submit"></p>
  </form>
</div>
 -->
            </div><!-- .class respond -->

          </div> <!-- .class panel-->
 
          </article><!-- #post -->
 
      <?php endwhile; // end of the loop. ?>
 
  
  
 
  <input type='submit' value='Enviar' class='enviar' >
    
  </form>
 

 <!-- AQUI TERMINA EL FORM -->
  <div class='clearfix'></div>

<?php get_footer(); ?>