#!/bin/bash

echo "only for check if ssh key is on gitlab" 

echo "please your git address"

read git

ssh -T git@$git


if [ $? -eq 0 ]

then 

echo "you are amazing. Enjoy gitlab" 

else 

echo "the keys are not uploaded. Do it." 

fi


