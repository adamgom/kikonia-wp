<!DOCTYPE html>
<html>
  <head>
    <?php wp_head(); ?>
  </head>
  <body>
    <div>
      <h1>Header</h1>
      <ul>
        <li><a href=" <?php echo site_url('/'); ?> ">Home page</a></li>
        <li><a href=" <?php echo site_url('/typy-produktow'); ?> ">Grupy produktowe</a></li>
        <li><a href=" <?php echo site_url('/rodzaje-materialow'); ?> ">Rodzaje materiałów</a></li>
      </ul>
      
      
    </div>
