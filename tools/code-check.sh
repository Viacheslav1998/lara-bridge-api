#!/bin/sh

ROOT_DIR=$(pwd)
LARAVEL_DIR="$ROOT_DIR/laravel"

echo "-------------------------------------"
echo "Running PHP-CS-Fixer (dry-run check)"
echo "-------------------------------------"

docker-compose run --rm php php-cs-fixer fix \
    --config="$LARAVEL_DIR/php-cs-fixer.dist.php" \
    --dry-run --diff

echo ""
echo "-------------------------------------"
echo "Fixing PHP code style..."
echo "-------------------------------------"

docker-compose run --rm php php-cs-fixer fix \
    --config="$LARAVEL_DIR/php-cs-fixer.dist.php"

echo ""
echo "-------------------------------------"
echo "PHP-CS-Fixer completed"
echo "-------------------------------------"
