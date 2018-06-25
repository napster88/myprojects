<?php
$dictionary['te_Managekititem']['fields']["te_institute_id"] = array (
      'required' => false,
      'name' => 'te_institute_id',
      'vname' => 'Institute',
      'type' => 'id',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'inline_edit' => true,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 36,
      'size' => '20',
    );
    $dictionary["te_Managekititem"]["fields"]["institute_name"] = array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'institute_name',
      'vname' => 'Institute',
      'type' => 'relate',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id_name' => 'te_institute_id',
      'ext2' => 'te_in_institutes',
      'module' => 'te_in_institutes',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
   );
   ?>
