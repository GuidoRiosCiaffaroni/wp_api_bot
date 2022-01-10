#!/bin/bash
URLApiData='http://puebadominio.royalwebhosting.net'
APIPage='api'
URLData=''
URLGet=''

###################################################################################################
#Nombre del usuario
#UserSystem='Grios'
#Data[0]=' --data-urlencode "ServerUser='$UserSystem'" '
###################################################################################################

###################################################################################################
#Password 
#UserPassword='GR123456.'
#Data[1]=' --data-urlencode "ServerPassword='$UserPassword'" '
###################################################################################################

###################################################################################################
#Token para validacion
#UserToken='qwerty'
#Data[2]=' --data-urlencode "UserToken='$UserToken'" '
###################################################################################################

###################################################################################################
#Fecha del Servidor
#ServerDate=`date "+%d-%m-%y_%H-%M-%S"`
ServerDate=$(date)
Data[0]=' --data-urlencode "ServerDate='$ServerDate'" '
###################################################################################################

###################################################################################################
#Nombre del Servidor
ServerName=$(hostname)
Data[1]=' --data-urlencode "ServerName='$ServerName'" '
###################################################################################################

###################################################################################################
#Arquitectura del Servidor
ServerArqu=$(uname -m)
Data[2]=' --data-urlencode "ServerArqu='$ServerArqu'" '
###################################################################################################

###################################################################################################
#Kernel del Servidor
ServerKernel=$(uname -r)
Data[3]=' --data-urlencode "ServerKernel='$ServerKernel'" '
###################################################################################################

###################################################################################################
#Directorio del Servidor
#ServerFilesystem=$(date)
ServerDF=$(df -h /)
echo $ServerDF > temp.txt
#awk '{print $10}' temp.txt
#echo '' > temp.txt
ServerFilesystem=$(awk '{print $8}' temp.txt)
Data[4]=' --data-urlencode "ServerFilesystem='$ServerFilesystem'" '
###################################################################################################

###################################################################################################
#Directorio del Servidor
#ServerFilesystem=$(date)
ServerDF=$(df -h /)
echo $ServerDF > temp.txt
#awk '{print $11}' temp.txt
#echo '' > temp.txt
ServerFilesSize=$(awk '{print $9}' temp.txt)
Data[5]=' --data-urlencode "ServerFilesSize='$ServerFilesSize'" '
###################################################################################################


#URLQuery=$URLApiData'/'$APIPage'/?'${Data[0]}
URLBase=$URLApiData'/'$APIPage'/'


arraylength=${#Data[@]}

for (( i=1; i<${arraylength}+1; i++ ));
do
  #echo $i " / " ${arraylength} " : " ${Data[$i-1]}
  #URLData=${Data[$i-1]}"&"
  URLData="${Data[$i-1]}${URLData}"
  #echo $URLData
done

URLGet='curl -G '$URLData$URLBase' --get' 


################################################################################################

Command="$URLGet";
#echo $Command;
eval $Command #ejecuta un comando almacenado en una variable
#clear
#################################################################################################
echo $Command;