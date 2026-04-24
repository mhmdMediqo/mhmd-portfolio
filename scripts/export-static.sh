#!/usr/bin/env bash
set -euo pipefail

SOURCE_FILE="resources/views/portfolio.blade.php"
OUTPUT_DIR="dist"

if [[ ! -f "$SOURCE_FILE" ]]; then
  echo "Missing source view: $SOURCE_FILE" >&2
  exit 1
fi

rm -rf "$OUTPUT_DIR"
mkdir -p "$OUTPUT_DIR"

cp "$SOURCE_FILE" "$OUTPUT_DIR/index.html"
cp "$SOURCE_FILE" "$OUTPUT_DIR/404.html"
touch "$OUTPUT_DIR/.nojekyll"

echo "Static export generated in $OUTPUT_DIR"
