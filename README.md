# Comuni italiani

Converte la lista dei comuni https://www.istat.it/storage/codici-unita-amministrative/Elenco-comuni-italiani.csv 
da csv a una collection di oggetti [Municipality](./src/Municipality.php).

## Usage
Includi la libreria con Composer come fai per le altre librerie.

```php
use Wcs\Municipality\MunicipalityRepository;


$municipalityRepository = new MunicipalityRepository();

$municipalities = $municipalityRepository->getAll();
foreach ($municipalities as $municipality) {
    echo $municipality->getName();
}
```

### Update source data
```console
php bin/minicli update
```

### Check coding standard
```console
./vendor/bin/phpcbs --standard=PSR12 src
./vendor/bin/phpcbf --standard=PSR12 src
```