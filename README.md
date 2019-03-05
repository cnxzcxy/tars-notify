# tars-notify

```php
$config = new \Tars\client\CommunicatorConfig();
$locator = $tarsConfig['tars']['application']['client']['locator'];
$moduleName = $tarsConfig['tars']['application']['client']['modulename'];
$config->setLocator($locator);
$config->setModuleName($moduleName);
$config->setSocketMode(2);

//上报notify
$notify = new \Tars\notify\NotifyServant($config);
$info = new \Tars\notify\classes\ReportInfo();
$info->eType = 0;
$info->sApp = $tarsConfig['tars']['application']['server']['app'];
if (strtoupper($tarsConfig['tars']['application']['enableset']) == 'Y'){
    $info->sSet = $tarsConfig['tars']['application']['setdivision'];
}
$info->sServer = $tarsConfig['tars']['application']['server']['server'];
$info->sMessage = $notifyMessage;
$notify->reportNotifyInfo($info);
```
