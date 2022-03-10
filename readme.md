# Open graph
This is a package for easily grabbing open-graph meta information from an url. 

### Install

```bash
composer require iamfredric/open-graph
```

### Use

```php
<?php

use Iamfredric\OpenGraph\OpenGraph;

// Request open graph meta from an url
$items = (new OpenGraph())->url('https://example.com'); 

// Get the image
$imageUrl = $items->get('image');
$title = $items->get('image');

// Or just play with the data as an array
$items->toArray();
```

#### Use with Laravel 
When using with laravel, the Http facade is used for the requests when resolving from the ioc-container.  

#### Using a different client
By default, it's using curl for the requests. but if you want to use 
a different method to fetch your data, you can feed another client 
when initializing OpenGraph . 

```php
<?php

$client = new class implements \Iamfredric\OpenGraph\Contracts\Clients\Client
{
    public function get(string $url): string
    {
        return file_get_contents($url);
    }
}

new \Iamfredric\OpenGraph\OpenGraph($client);
```

### Contributing
- PSR-2 Coding Standard - The easiest way to apply the conventions is to install PHP Code Sniffer.
- PHPStan
- Make sure your issue has tests
- Document any change, update readme.md
- One pull request per feature

### License
MIT License

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
