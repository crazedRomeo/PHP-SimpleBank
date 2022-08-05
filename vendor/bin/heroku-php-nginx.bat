@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../heroku/heroku-buildpack-php/bin/heroku-php-nginx
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0
bash "%BIN_TARGET%" %*
