@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../robmorgan/phinx/bin/phinx.bat
C:/php-7.4/php.exe "%BIN_TARGET%" %*
