find . -type f \( -name "*.html" -o -name "*.js" -o -name "*.scss" -o -name "*.php" \) -exec sed -i -E "s/_s$/Teratur/g" {} \;
find . -type f \( -name "*.html" -o -name "*.js" -o -name "*.scss" -o -name "*.php" \) -exec sed -i -E "s/'_s'/'teratur'/g" {} \;
find . -type f \( -name "*.html" -o -name "*.js" -o -name "*.scss" -o -name "*.php" \) -exec sed -i -E "s/_s_/teratur_/g" {} \;
find . -type f \( -name "*.html" -o -name "*.js" -o -name "*.scss" -o -name "*.php" \) -exec sed -i -E "s/_s-/teratur-/g" {} \;
find . -type f \( -name "*.html" -o -name "*.js" -o -name "*.scss" -o -name "*.php" \) -exec sed -i -E "s/_S_/TERATUR_/g" {} \;
