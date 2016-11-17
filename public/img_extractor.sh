#!/bin/bash

echo "Path|Mapname|Type" > map_screenshots.csv

for dir in ${1}/*/
do
	dir=${dir%*/}
	echo ${dir##*/}
	for file in ${dir}/*
	do
		if [ \( -f ${file} \) -a \( ${file: -4} == ".jpg" \) ]; then
			echo - ${file##*/}
			mapname=${dir##*/}
			filename=${file##*/}
			type=${file%.*}
			type=${type##*_}
			echo ${type}
			echo "${file}|${mapname}|${type}" >> map_screenshots.csv
		fi
	done

done

# Pseudo code:
# ---
# for each dir_name in img_archive
#	for each image_name in dir_name
#		save path to file 			// I.e. path - storage/images/screenshots/dm3/dm3_1_intermission.jpg
#		save dir_name to file		// I.e. mapname - dm3
#		save image_type to file		// I.e. screenshot type - intermission
