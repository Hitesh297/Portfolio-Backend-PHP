<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

?>

<ul id="dashboard">
  <li>
    <a href="contactForms.php">
      Contact Form
    </a>
  </li>
  <li>
    <a href="textContents.php">
      Manage Text Content
    </a>
  </li>
  <li>
    <a href="experiences.php">
      Manage Experience
    </a>
  </li>
  <li>
    <a href="qualifications.php">
      Manage Qualifications
    </a>
  </li>
  <li>
    <a href="skills.php">
      Manage Skills
    </a>
  </li>
  <li>
    <a href="socialLinks.php">
      Manage Social Media Links
    </a>
  </li>
  <li>
    <a href="projects.php">
      Manage Projects
    </a>
  </li>
  <li>
    <a href="users.php">
      Manage Users
    </a>
  </li>
  <li>
    <a href="logout.php">
      Logout
    </a>
  </li>
</ul>

<?php

include('includes/footer.php');

?>