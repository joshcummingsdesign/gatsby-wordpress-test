#!/usr/bin/env bash

# Error codes
export ERR_ENV=1
export ERR_CONFIRM=2
export ERR_CONFLICT=3

# Colors
export RED='\033[0;31m'
export YELLOW="\e[33m"
export GREEN='\033[0;32m'
export BLUE='\033[0;34m'
export NC='\033[0m'

# Site
export DB_FILE=db_export_`date +'%s'`.sql

# .env
if [ -f .env ]; then
  export $(grep -v '^#' .env | xargs)
fi
