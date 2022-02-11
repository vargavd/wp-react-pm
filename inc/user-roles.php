<?php

add_action( 'init', function () {
  if (get_option('is_user_roles_set') < 1 ) {
    add_role('marketing', 'Marketing');
    add_role('manager', 'Manager');
    add_role('tester', 'Tester');
    add_role('designer', 'Designer');
    add_role('developer', 'Developer');

    update_option('is_user_roles_set', 1);
  }
});
