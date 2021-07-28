#!/usr/bin/env bash

source scripts/variables.sh

if [[ $CI == true ]]; then
  composer install
  composer install -d wp-content/plugins/$THEME_SLUG
else
  lando composer install
  lando composer install -d wp-content/plugins/$THEME_SLUG
fi
