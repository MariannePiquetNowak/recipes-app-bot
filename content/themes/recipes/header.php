<!DOCTYPE html>
<html lang=<?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

  <body <?php body_class(); ?>>
  <div class="wrapper">
      <header class="header">
        <div class="navbar">
          <a href="<?= home_url(); ?>"><strong><?php bloginfo('name'); ?></strong></a>

          <?php get_template_part('template-parts/navbar/navbar', 'header'); ?>
          
        </div>
      </header>