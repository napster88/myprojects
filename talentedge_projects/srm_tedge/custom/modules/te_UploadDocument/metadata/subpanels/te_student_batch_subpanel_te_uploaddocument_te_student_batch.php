<?php
// created: 2018-02-21 10:51:09
$subpanel_layout['list_fields'] = array (
  'document_name' => 
  array (
    'name' => 'document_name',
    'vname' => 'LBL_LIST_DOCUMENT_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'object_image' => 
  array (
    'widget_class' => 'SubPanelIcon',
    'width' => '2%',
    'image2' => 'attachment',
    'image2_url_field' => 
    array (
      'id_field' => 'selected_revision_id',
      'filename_field' => 'selected_revision_filename',
    ),
    'attachment_image_only' => true,
    'default' => true,
  ),
  'file_ext' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_FILE_EXTENSION',
    'width' => '10%',
    'default' => true,
  ),
  'file_mime_type' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_MIME',
    'width' => '10%',
    'default' => true,
  ),
  'status_id' => 
  array (
    'type' => 'enum',
    'vname' => 'LBL_DOC_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
);