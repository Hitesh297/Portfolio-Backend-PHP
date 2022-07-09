<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: experiences.php' );
  die();
  
}

if( isset( $_POST['companyName'] ) )
{
  
  if( $_POST['position'] and $_POST['duration'] and $_POST['responsibilities'])
  {
    
    $query = 'UPDATE experience SET
      companyName = "'.mysqli_real_escape_string( $connect, $_POST['companyName'] ).'",
      position = "'.mysqli_real_escape_string( $connect, $_POST['position'] ).'",
      duration = "'.mysqli_real_escape_string( $connect, $_POST['duration'] ).'",
      responsibilities = "'.mysqli_real_escape_string( $connect, $_POST['responsibilities'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Experience has been updated' );
    
  }

  header( 'Location: experiences.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM experience
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: experiences.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Experience</h2>

<form method="post">
  
  <label for="companyName">company Name:</label>
  <input type="text" name="companyName" id="companyName" value="<?php echo htmlentities( $record['companyName'] ); ?>">
    
  <br>

  <label for="position">Position:</label>
  <input type="text" name="position" id="position" value="<?php echo htmlentities( $record['position'] ); ?>">
    
  <br>
  
  <label for="responsibilities">Responsibilities:</label>
  <textarea type="text" name="responsibilities" id="responsibilities" rows="5"><?php echo htmlentities( $record['responsibilities'] ); ?></textarea>
  
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
  <input type="text" name="duration" id="duration" value="<?php echo htmlentities( $record['duration'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Experience">
  
</form>

<p><a href="experiences.php"><i class="fas fa-arrow-circle-left"></i> Return to Experience List</a></p>


<?php

include( 'includes/footer.php' );

?>