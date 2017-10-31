@echo off
cd /d "%~dp0"
regsvr32  /u IDCardReader.ocx
regsvr32   IDCardReader.ocx