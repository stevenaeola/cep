<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
      <title><?php print strip_tags($page->title); ?></title>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
  <script>
  $(document)
    .ready(function() {

      // fix main menu to page on passing
      $('.main.menu').visibility({
        type: 'fixed'
      });
      $('.overlay').visibility({
        type: 'fixed',
        offset: 80
      });

      // lazy load images
      $('.image').visibility({
        type: 'image',
        transition: 'vertical flip in',
        duration: 500
      });

      // show dropdown on hover
      $('.main.menu  .ui.dropdown').dropdown({
        on: 'hover'
      });

<?php print $page->extraJS; ?>
    })
  ;
  </script>

  <style type="text/css">

  body {
    background-color: #FFFFFF;
  }
  .main.container {
    margin-top: 2em;
  }

  .main.menu {
    margin-top: 4em;
    border-radius: 0;
    border: none;
    box-shadow: none;
    transition:
      box-shadow 0.5s ease,
      padding 0.5s ease
    ;
  }
  .main.menu .item img.logo {
    margin-right: 1.5em;
  }

.logotext {
    margin: 0.2em;
    padding: 0.2em;
   background-color: #00B5AD;
      color: white;
      font-size: 150%;
 }

.person {
   color: #00B5AD;

 }

.inst {
    color: grey;
 }

a.plainlink{
  color: black;
}

a.plainlink:hover{
  color: black;
  text-decoration: underline;
}

.overlay {
    float: left;
    margin: 0em 3em 1em 0em;
  }
  .overlay .menu {
    position: relative;
    left: 0;
    transition: left 0.5s ease;
  }

  .main.menu.fixed {
    background-color: #FFFFFF;
    border: 1px solid #DDD;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
  }
  .overlay.fixed .menu {
    left: 800px;
  }

  .text.container .left.floated.image {
    margin: 2em 2em 2em -4em;
  }
  .text.container .right.floated.image {
    margin: 2em -4em 2em 2em;
  }

  .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
  </style>

</head>
<body>

  <div class="ui main text container">
      <h1 class="ui header"><?php $page->logo(); print $page->title;?></h1>
<?php print $page->strapline; ?>
  </div>


  <div class="ui borderless main menu">
    <div class="ui text container">
      <div class="header item">
<?php $page->logo();?>
      </div>
<?php $page->menuLinks();?>
    </div>
  </div>

  <div class="ui text container">
<?php print $page->content; ?>
  </div>
  <div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
      <div class="ui stackable divided inverted middle aligned four column grid">
        <div class="row">
        <div class="column">
          <h4 class="ui inverted header">Menu</h4>
          <div class="ui inverted link list">
<?php $page->menuLinks();?>
          </div>
        </div>
        <div class="column">
          <img class="ui centered medium image" src="media/images/DU_Logo_Large_White.png" alt="Durham University Logo"/>
        </div>
	<!--
        <div class="column">
          <img class="ui centered small image" src="media/images/HEA_logo_white.png" alt="Supported by HEA"/>
        </div>
-->
        <div class="column">
          <img class="ui centered small image" src="media/images/CPHClogoblack800.png" alt="Council of Heads and Professors of Computing"/>
        </div>
        </div>
      </div>
      <div class="ui inverted section divider"></div>
      <div class="ui inverted centred segment"><?php $page->logo();?></div>
      <div class="ui inverted horizontal divided link list">
        <div class="item">Computing</div>
        <div class="item">Education</div>
        <div class="item">Practice</div>
      </div>
    </div>
  </div>
</body>

</html>
