<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->data['main_head_content']; ?>  
  </head>
  <body>
  <?php echo $this->data['nav']; ?> 
  
      <main role="main" class="container">
        <?php echo $this->data['body']; ?>
      </main>
  
      <?php echo $this->data['custom_js']; ?>
  </body>
</html>