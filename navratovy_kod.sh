#!/bin/bash

uptime

echo $?

#echo $PIPESTATUS

if [ $? -eq 0 ]

then

echo "ok"

else

echo "no ok"

fi
