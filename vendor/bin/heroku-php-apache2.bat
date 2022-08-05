@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../heroku/heroku-buildpack-php/bin/heroku-php-apache2
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0
bash "%BIN_TARGET%" %*
