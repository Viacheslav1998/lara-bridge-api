#!/bin/bash

# define root
ROOT_DIR=$(git rev-parse --show-toplevel)
LARAVEL_DIR="$ROOT_DIR/laravel"

# check PHP-CS-Fixer (dry-run)
echo "-------------------------------------"
echo "Checking PHP code style (dry-run)..."
echo "-------------------------------------"

# --dry-run shows files that need to be fixed
php "$LARAVEL_DIR/vendor/bin/php-cs-fixer" fix \
    --config="$LARAVEL_DIR/php-cs-fixer.dist.php" \
    --dry-run --diff

echo ""
echo "-------------------------------------"
echo "Fixing PHP code style..."
echo "-------------------------------------"

# Fix it right now!
php "$LARAVEL_DIR/vendor/bin/php-cs-fixer" fix \
    --config="$LARAVEL_DIR/php-cs-fixer.dist.php"

echo ""
echo "-------------------------------------"
echo "PHP-CS-Fixer completed"
echo "-------------------------------------"
