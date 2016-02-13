#!/bin/sh
# Author BM Hirst
# 16/01/06
echo "Here is a list of useful bash information that can be used in shell programs: "
echo
echo " The current shell is: " $SHELL
echo " The user logged into this shell is: " $USER
echo " The Bash is located at: " $BASH
echo " The present version of bash is: " $BASH_VERSION
echo " The current users home directory is: " $HOME
echo " The current host name:" $HOSTNAME
echo " The current host computer type:" $HOSTTYPE
echo " The current list of directories where executables are searched for:" $PATH
echo " The current directory you are located within:" $PWD
echo " The previous directory you were located within:" $OLDPWD
echo " A random number:" $RANDOM
echo " Time elapsed since bash was started is " $SECONDS " seconds"
echo " Number of shells that have been opened is: " $SHLVL
exit 0