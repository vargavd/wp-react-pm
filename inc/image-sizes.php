<?php

add_action('init', function () {
  if (!has_image_size('user-thumbnail')) {
    add_image_size('user-thumbnail', 56, 56, true);
  }
});
