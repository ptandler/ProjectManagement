<?php
   form_security_validate( 'plugin_ProjectManagement_config_update' );

   auth_reauthenticate();
   access_ensure_global_level( plugin_config_get( 'admin_threshold' ) );

   function maybe_set_option( $name, $value ) {
      if ( $value != plugin_config_get( $name ) ) {
         plugin_config_set( $name, $value );
      }
   }

   maybe_set_option( 'work_types', gpc_get_string( 'work_types' ) );
   maybe_set_option( 'edit_estimates_threshold', gpc_get_int( 'edit_estimates_threshold' ) );
   maybe_set_option( 'view_time_registration_summary_threshold', gpc_get_int( 'view_time_registration_summary_threshold' ) );
   maybe_set_option( 'include_bookdate_threshold', gpc_get_int( 'include_bookdate_threshold' ) );
   maybe_set_option( 'work_type_thresholds', string_to_array( gpc_get_string( 'work_type_thresholds', null ) ) );
   maybe_set_option( 'enable_time_registration_threshold', gpc_get_int( 'enable_time_registration_threshold' ) );
   maybe_set_option( 'view_registration_worksheet_threshold', gpc_get_int( 'view_registration_worksheet_threshold' ) );
   maybe_set_option( 'view_registration_report_threshold', gpc_get_int( 'view_registration_report_threshold' ) );
   maybe_set_option( 'view_resource_management_threshold', gpc_get_int( 'view_resource_management_threshold' ) );
   maybe_set_option( 'view_resource_allocation_threshold', gpc_get_int( 'view_resource_allocation_threshold' ) );
   maybe_set_option( 'admin_threshold', gpc_get_int( 'admin_threshold' ) );

   form_security_purge( 'plugin_ProjectManagement_config_update' );
   print_successful_redirect( plugin_page( 'config_page', true ) );
?>