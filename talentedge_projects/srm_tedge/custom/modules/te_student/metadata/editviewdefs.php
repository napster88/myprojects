<?php
$module_name = 'te_student';
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
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
          0 => 
          array (
            'name' => 'registration_no',
            'label' => 'Registration No',
            'comment' => 'registration no details',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'education',
            'label' => 'LBL_EDUCATION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
          1 => 
          array (
            'name' => 'gender',
            'studio' => 'visible',
            'label' => 'LBL_GENDER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'dob',
            'label' => 'LBL_DOB',
          ),
          1 => 
          array (
            'name' => 'father_name',
            'label' => 'Father Name',
            'comment' => 'Father Name Store Here',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'mather_name',
            'label' => 'Mather Name',
            'comment' => 'Mather Name Store Here',
          ),
          1 => 
          array (
            'name' => 'category',
            'studio' => 'visible',
            'label' => 'Category',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'sub_category',
            'studio' => 'visible',
            'label' => 'Sub-Category',
          ),
          1 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'company',
            'label' => 'LBL_COMPANY',
          ),
          1 => 'description',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'upload_image',
            'studio' => 'visible',
            'label' => 'Upload Image',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'address_line1',
            'label' => 'LBL_ADDRESS_LINE_1',
            'comment' => 'Address line 1',
          ),
          1 => 
          array (
            'name' => 'address_line2',
            'label' => 'LBL_ADDRESS_LINE_2',
            'comment' => 'Address Line2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'country',
            'label' => 'LBL_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'city',
            'label' => 'LBL_CITY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pin_code',
            'label' => 'LBL_PIN_CODE',
            'comment' => 'Address pincode',
          ),
          1 => 
          array (
            'name' => 'state',
            'label' => 'LBL_STATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'address_varified',
            'studio' => 'visible',
            'label' => 'Address Varified',
          ),
          1 => 
          array (
            'name' => 'permanent_address',
            'label' => 'LBL_MARK_AS_PERMANENT_ADDRESS',
            'comment' => 'If check then adreess as permanent address',
          ),
        ),
        4 => 
        array (
          0 => '',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lms_username',
            'label' => 'LBL_LMS_USERNAME',
          ),
          1 => 
          array (
            'name' => 'lms_password',
            'label' => 'LBL_LMS_PASSWORD',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'source',
            'studio' => 'visible',
            'label' => 'Source',
          ),
          1 => 
          array (
            'name' => 'lms_status',
            'studio' => 'visible',
            'label' => 'Lms Status',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'channel',
            'studio' => 'visible',
            'label' => 'Channel',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
