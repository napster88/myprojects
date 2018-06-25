<?php
$module_name = 'te_Courier';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'website',
            'label' => 'LBL_WEBSITE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
          1 => 
          array (
            'name' => 'contact_person_name',
            'label' => 'LBL_CONTACT_PERSON_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'phone_number',
            'label' => 'LBL_PHONE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'emailid',
            'label' => 'LBL_EMAILID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'country',
            'studio' => 'visible',
            'label' => 'LBL_COUNTRY ',
          ),
          1 => 
          array (
            'name' => 'state',
            'studio' => 'visible',
            'label' => 'LBL_STATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'address1',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS1',
          ),
          1 => 
          array (
            'name' => 'address2',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS2',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'city',
            'studio' => 'visible',
            'label' => 'LBL_CITY ',
          ),
          1 => 
          array (
            'name' => 'tracker_url',
            'label' => 'LBL_TRACKER_URL',
          ),
        ),
        6 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
