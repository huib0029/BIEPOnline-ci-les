#!/bin/bash

PS3='Heb je een .env bestand aangemaakt?'
options=("Ja" "Nee")
select opt in "${options[@]}"
do
	case $opt in
		"Ja")
			composer install
			php artisan migrate
			php artisan key:generate
			php artisan db:seed
			read -p "De omgeving is ingesteld, druk op een toets om door te gaan"
			[[ "$0" = "$BASH_SOURCE" ]] && exit 1 || return 1
			;;
		"Nee")
			read -p "Maak eerst een .env bestand aan, druk op een toets om door te gaan"
			[[ "$0" = "$BASH_SOURCE" ]] && exit 1 || return 1
			;;
	esac
done
