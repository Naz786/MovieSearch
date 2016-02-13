#!/bin/sh
script=$1

if [ -d $script ]
then
	echo $USER "'s file chnaged over 48 hours ago in .:"
	find $script -type f -user $USER -mtime +1 -depth -1 
	echo "directories not owned by gtl1 in .:"
	find $script -type f !-user $USER -depth -1
	echo "files executable but not owned by gtl1 in .:"
	find $script -type f -executable !-user $USER -depth -1 
else 
	echo $script "not a directory"
fi 