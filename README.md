# hik

可用方法

### Acs
* Door

### Frs
* Face

### Resource
* Person
* Org
* AcsDoor

### Visitor
* Appointment

## 使用

```php
use Hik\Config;
use Hik\Resource\Resource;
use Hik\Worker;

$config = new Config($config->get('hik'));
$client = $client->create([
    'base_uri' => $config->getBaseUri()
]);

$worker = new Worker($client, $config);
$app = Resource::AcsDoor($worker);
$app->acsDoorList();
```
