<!DOCTYPE html>
<html>
  <head>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="header wrapper">
      <div class="row">
        <div class="row__4 header__logo">
          <img  src="localhost/kikonia-wp/app/wp-content/uploads/static/logo.png" alt="">
        </div>
        <div class="row__8">
          <img class="header__info" src="localhost/kikonia-wp/app/wp-content/uploads/static/info.png" alt="">
        </div>
      </div>
      <div class="row">
        <h1>Header</h1>
      </div>
    </div>
  
    <div class="header wrapper menu">
      <?php  require get_theme_file_path('/inc/carousel.php'); ?>
    </div>

    <div class="header wrapper menu">
      <ul class="menu__list-group">
        <li class="menu__list-item"><a href=" <?php echo site_url('/'); ?> ">Home page</a></li>
        <li class="menu__list-item"><a href=" <?php echo site_url('/typy-produktow'); ?> ">Grupy produktowe</a></li>
        <li class="menu__list-item"><a href=" <?php echo site_url('/rodzaje-materialow'); ?> ">Rodzaje materiałów</a></li>
      </ul>
    </div>
