#!/bin/sh
mkdir -p dist

# Update version number with build timestamp
TS=`date +%Y%m%d%H%M%S`
VERSION=`grep Version style.css | awk '{ print $3 }' | cut -d . -f -1,2`.$TS
sed  -i '' -e "s/Version:.*/Version:        $VERSION/" style.css

# Delete symlinks in acf-json
 find acf-json -type link -exec rm {} \;

# Creates a zip file of the theme ready to upload to WordPress
cd ..
zip wmde-re-shape-$TS.zip wmde-re-shape -rv \
	-x \*/.DS_Store \
	-x wmde-re-shape/.babelrc \
	-x wmde-re-shape/.env\* \
	-x wmde-re-shape/.git\* \
	-x wmde-re-shape/.nova/\* \
	-x wmde-re-shape/blocks/.git\* \
	-x wmde-re-shape/blocks/\*/style.scss \
	-x wmde-re-shape/dist/\* \
	-x wmde-re-shape/gulpfile.js \
	-x wmde-re-shape/mktheme.sh \
	-x wmde-re-shape/node_modules/\* \
	-x wmde-re-shape/package\*.json \
	-x wmde-re-shape/\*.md \
	-x wmde-re-shape/\*/\*.md \
	-x wmde-re-shape/src/\*
mv wmde-re-shape-$TS.zip wmde-re-shape/dist/
