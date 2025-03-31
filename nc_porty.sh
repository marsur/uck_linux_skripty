#!/bin/bash

#nainstalujem nc (pokial nie je)
dnf install nc -y

#idem checknut porty
nc -zv localhost 80

#overi ci port je povoleny alebo nie
if [ $? -eq 0 ]

then

echo "ok"

else

echo "no ok"

fi
