#!/bin/bash
URLApiData='http://puebadominio.royalwebhosting.net'
APIPage='api'
URLData=''
URLGet=''


#Nombre del usuario
#UserSystem='Grios'
#Data[0]=' --data-urlencode "ServerUser='$UserSystem'" '

#Password 
#UserPassword='GR123456.'
#Data[1]=' --data-urlencode "ServerPassword='$UserPassword'" '

#Token para validacion
#UserToken='qwerty'
#Data[2]=' --data-urlencode "UserToken='$UserToken'" '

#Fecha del Servidor
ServerDate=`date "+%d-%m-%y_%H-%M-%S"`
Data[0]=' --data-urlencode "ServerDate='$ServerDate'" '

#Nombre del Servidor
ServerName=$(hostname)
Data[1]=' --data-urlencode "ServerName='$ServerName'" '


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
echo $ServerDate
echo ${Data[0]}

echo $ServerName
echo ${Data[1]}

echo $URLData
echo $URLBase
echo $URLGet

Command="$URLGet";
echo $Command;
eval $Command #ejecuta un comando almacenado en una variable
#################################################################################################


