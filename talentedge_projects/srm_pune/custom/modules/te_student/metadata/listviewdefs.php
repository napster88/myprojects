<?php
$module_name = 'te_student';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'REGISTRATION_NO' => 
  array (
    'label' => 'Registration No',
    'type' => 'varchar',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL',
    'width' => '10%',
    'default' => true,
  ),
  'MOBILE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MOBILE',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'GENDER' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_GENDER',
    'width' => '10%',
    'default' => true,
  ),
  'CITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CITY',
    'width' => '10%',
    'default' => true,
  ),
  'COUNTRY' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'Country',
    'width' => '10%',
    'default' => true,
  ),
  'SOURCE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'Source',
    'width' => '10%',
    'default' => true,
  ),
);
?>
