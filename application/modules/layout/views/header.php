<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Saúde Brasil</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="<?= base_url() ?>images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?= base_url() ?>images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- MDL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue-red.min.css" /> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" /> 
    <!-- <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-blue.min.css" /> -->
            

    <!-- SynCompiler : CSS -->
    <?php echo SynCompileCSS() ?>


    <!-- Leaflet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>


    
    <!-- ANGULAR 2 Load libraries -->
    <script src="<?php echo base_url('public/node_modules/core-js/client/shim.min.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/zone.js/dist/zone.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/reflect-metadata/Reflect.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/rxjs/bundles/Rx.umd.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/@angular/core/core.umd.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/@angular/common/common.umd.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/@angular/compiler/compiler.umd.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/@angular/platform-browser/platform-browser.umd.js') ?>"></script>
    <script src="<?php echo base_url('public/node_modules/@angular/platform-browser-dynamic/platform-browser-dynamic.umd.js') ?>"></script>

    <!-- SynCompiler : JS -->
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <?php echo SynCompileJS() ?>

  </head>
  <body>

  <!-- Always shows a header, even in smaller screens. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--transparent">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <a href="<?=base_url()?>" class="mdl-layout-title">Saúde Brasil</a>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
          <?php $this->load->view('layout/_menu_top') ?>
        </nav>
      </div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Saúde Brasil</span>
      <nav class="mdl-navigation">
        <?php $this->load->view('layout/_menu_top') ?>
      </nav>
    </div>
    <main class="mdl-layout__content">
      <div class="page-content">