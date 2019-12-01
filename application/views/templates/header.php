<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">


    <title>Miles Log</title>
  </head>
  <body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Miles Log</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
      </li>
      <?php if($this->session->userdata('logged_in')) : ?>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Service" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Service</a>

          <div class="dropdown-menu" aria-labelledby="Service">
            <a class="dropdown-item" href="<?php echo base_url(); ?>vehicles/fuelup">Fuelup</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>vehicles/oil_change">Oil change</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>vehicles/tires_change">Tires change</a>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Stats" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Stats</a>

          <div class="dropdown-menu" aria-labelledby="Stats">
            <a class="dropdown-item" href="<?php echo base_url(); ?>vehicles/get_mpg_dates">MPG</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>vehicles/miles_driven">Miles</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>vehicles/gallon_price">Gallon price</a>
          </div>
        </li>




      <?php endif;?>

    </ul>

    <ul class="navbar-nav ml-auto">
      <?php if(!$this->session->userdata('logged_in')) : ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>vehicles/login">Login</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>vehicles/register">Register</a>
      </li>
      <?php endif;?>
      <?php if($this->session->userdata('logged_in')) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>vehicles/logout">Logout</a>
        </li>
      <?php endif;?>
    </ul>
  </div>
</nav>

<main role="main" class="container">

<div class="container">
  <?php if($this->session->flashdata('vehicle_registered')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('vehicle_registered').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('vehicle_loggedin')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('vehicle_loggedin').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('vehicle_loggedout')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('vehicle_loggedout').'</p>'; ?>
  <?php endif; ?>

