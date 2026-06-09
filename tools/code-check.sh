#!/bin/bash

ROOT_DIR=$(git rev-parse --show-toplevel)
LARAVEL_DIR="$ROOT_DIR/laravel"

echo "-------------------------------------"
echo "Auto-fixing PHP code style..."
echo "-------------------------------------"


php "$LARAVEL_DIR/vendor/bin/php-cs-fixer" fix \
    --config="$LARAVEL_DIR/php-cs-fixer.dist.php" \
    --quiet


git add .

echo "Done! Code is clean."
