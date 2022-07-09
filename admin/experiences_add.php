<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['companyName'] ) )
{
  
  if( $_POST['position'] and $_POST['duration'] and $_POST['responsibilities'] )
  {
    
    $query = 'INSERT INTO experience (
        companyName,
        position,
        duration,
        responsibilities
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['companyName'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['position'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['duration'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['responsibilities'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Experience has been added' );
    
  }
  
  header( 'Location: experiences.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post">
  
  <label for="companyName">Company Name:</label>
  <input type="text" name="companyName" id="companyName">
    
  <br>

  <label for="position">Position:</label>
  <input type="text" name="position" id="position">
  
  <br>
  
  <label for="position">Responsibilities:</label>
  <textarea type="text" name="responsibilities" id="responsibilities" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#responsibilities' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="duration">Duration:</label>
  <input type="text" name="duration" id="duration">
  
  <br>
  
  <input type="submit" value="Add Experience">
  
</form>

<p><a href="experiences.php"><i class="fas fa-arrow-circle-left"></i> Return to Experience List</a></p>


<?php

include( 'includes/footer.php' );

?>