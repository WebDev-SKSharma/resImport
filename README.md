
# **resImport**

A PHP helper class. An easier and cleaner way to import JavaScript, CSS and google fonts from template files and import the resources at the end of the parent document. Convenient way to call JS functions on load under single <script> tag at the end of the document. Import google fonts simply by using the name of the font.


## Features

①- Ability to call assets dirrectly from the patials to import at the end of the document.

②- Google font import using the font name

③- Easy functions for CSS and JS


## Tech Stack


**Server:** PHP


## Authors

- [@S K Sharma](https://github.com/WebDev-SKSharma)
## Usage
###  ⩥ Initiating
Class ``$resImport`` is automatically initiated when `resImport.php` is included.

```php
<?php
    include_once 'resImport.php';
?>
```
### ⩥ Importing Example
To import, place the `import()` function at the end of `DOCUMENT` right before closing body tag as you see fit.

**page_1 :: index.php**
```php
<?php
    include_once 'resImport.php'; // Import Class
?>
    <html>
        <head>
            <title>Welcome</title>
        </head>
        <body>
            <?php
             // Page_1 assets
                resImport -> bundle({
                    "root" => "asset/",
                    "css" => "page_1.css",
                    "js" => "page_1.js"
                });
                
                include "partial.php";  // page_2
                /* Include partials anywhere as you see fit before "$resImport -> import()" */
            ?>

            <h1>Other Contents</h1>

            <?php
                $resImport -> import(); 
                /* 
                    All the styles and scripts imported at the end of the dom.
                    This way the dom is rendered first before the assets are loaded.
                */
            ?>
        </body>
    </html>

```
**page_2 :: partial.php**
```php
<?php
    // assets of the page_2
    resImport -> bundle({
        "root" => "asset/",
        "css" => "page_2.css",
        "js" => "page_2.js"
    });
?>

<div>
    <h1>Hello world! /ᐠ｡▿｡ᐟ\*ᵖᵘʳʳ*</h1>
</div>

```

___
___
___
### ⩥ $resImport -> Bundle( )
Bundle is used to confortably define a root folder and call resources by file name. Helps code look cleaner when importing multiple files.

Parameter :: Array() consists of the following ..

| Parameter     | Description                       | Example                   |
|:-             | :-                                | :-                        |
|   `root`      |   root Path                       |   asset/                 |
|   `css`       |   CSS style sheet                 |   style.css               |
|   `js`        |   JavaScript file                 |   script.js               |


#### Example Bundle() :: Import file with root path
```php
<?php
    resImport -> bundle({
        "root" => "asset/",
        "css" => "style.css",
        "js" => "script.js"
    });
?>
```
#### Example Bundle() :: Import file without root path   
```php
<?php
    resImport -> bundle({
        "css" => "asset/style.css",
        "js" => "asset/script.js"
    });
?>
```
#### Example Bundle() :: Import multiple files
 simply provide an array with file names to import
```php
<?php
    resImport -> bundle({
        "root" => "asset/",
        "css" => ["style.css", "style_2.css", "index.css"],
        "js" => ["script.js", "index.js"]
    });
?>
```
#### Example Bundle() / Dirrect :: Import file types seperately 
To import single or multiple file types seperately, `$resImort -> bundle()` can be used with just one file type like CSS or JavaScript.
```php
<?php
    resImport -> bundle({
        "css" => "asset/style.css"
    });

    resImport -> bundle({
        "js" => ["asset/script.css", "index.js"]
    });
?>
```

#### Example js() / css() :: An alternative way to import JavaScript & CSS
alternatively there are a couple of functions that can be also used to import file. which accepts a file path or an array of file path list.
Dirrect functions doesnt have a `root` Parameter.
```php
<?php
    resImport -> css("asset/style.css");

    resImport -> js(["asset/script.css", "index.js"]);
?>
```
___
___
___

### ⩥ $resImport -> gfont();
Import google fonts just by defining the name of the font.

#### Example gfont() :: Import a single font
```php
<?php
    $resImport->gfont("Abril Fatface");
?>
```

#### Example gfont() :: Import multiple fonts
```php
<?php
    $resImport->gfont(["Abril Fatface", "Roboto"]);
?>
```




## Contributing

*Contributions are always welcome!*




## Support

For support,  📧 kirisanth93@gmail.com.


## License

[GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html)

[![GNU General Public License v3.0](https://www.gnu.org/graphics/gplv3-127x51.png)](https://www.gnu.org/licenses/gpl-3.0.en.html)

