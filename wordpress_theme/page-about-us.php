<?php
 
  //response generation function
  $response = "";
 
  //function to generate response
  function my_contact_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
 
  }

  //response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";
 
//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];
 
//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "rn" .
  'Reply-To: ' . $email . "rn";

//validate the human
if(!$human == 0){
  if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
  else {
 
    //validate email
    //validate presence of name and message
    //send email
  }
}
else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);


//validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  my_contact_form_generate_response("error", $email_invalid);
else //email is valid
{
  //validate presence of name and message
  //send email
}

//validate presence of name and message
if(empty($name) || empty($message)){
  my_contact_form_generate_response("error", $missing_content);
}
else //ready to go!
{
  //send email
    $sent = wp_mail($to, $subject, strip_tags($message), $headers);
if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent

}




?>
<?php get_header(); ?>

	
<div id="content" class="widecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="post">
        <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
        <div class="entrytext">
            <?php the_content('<p class="serif">Read the rest of this page »</p>'); ?>
        </div>
    </div>
    <?php endwhile; endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
</div>


		
<?php get_footer(); ?>