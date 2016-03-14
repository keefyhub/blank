<?php 

  //Define the metabox and field configurations.

  function cmb2_sample_metaboxes() {
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_yourprefix_';
    //Initiate the metabox
    $cmb = new_cmb2_box([
      'id' => 'test_metabox',
      'title' => __('Test Metabox', 'cmb2'),
      'object_types' => array(
        'post', 'page', 'product'
      ), // Post type
      'context' => 'normal',
      'priority' => 'high',
      'show_names' => true // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
    ]);

    // Regular text field
    $cmb->add_field([
      'name' => __('Text', 'cmb2'),
      'desc' => __('add some text here (optional)', 'cmb2'),
      'id' => $prefix . 'text',
      'type' => 'text',
      'show_on_cb' => 'cmb2_hide_if_no_cats' // function should return a bool value
      // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
      // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
      // 'on_front'        => false, // Optionally designate a field to wp-admin only
      // 'repeatable'      => true,
    ]);

    // URL text field
    $cmb->add_field([
      'name' => __('Website URL', 'cmb2'),
      'desc' => __('add a URL (optional)', 'cmb2'),
      'id' => $prefix . 'url',
      'type' => 'text_url'
      // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
      // 'repeatable' => true,
    ]);

    // Email text field
    $cmb->add_field([
      'name' => __('Email Address', 'cmb2'),
      'desc' => __('add a email (optional)', 'cmb2'),
      'id' => $prefix . 'email',
      'type' => 'text_email'
      // 'repeatable' => true,
    ]);

    // Color picker
    $cmb->add_field([
      'name'    => __( 'Additional Color Picker', 'cmb2' ),
      'desc'    => __( 'field description (optional)', 'cmb2' ),
      'id'      => $prefix . 'colorpicker',
      'type'    => 'colorpicker',
      'default' => '',
    ]);
  }

  add_action('cmb2_admin_init', 'cmb2_sample_metaboxes');