# MusicBrainz

Client library for accessing the MusicBrainz Api.

[![Build Status](https://travis-ci.org/monkeyphp/music-brainz.png?branch=develop)](https://travis-ci.org/monkeyphp/music-brainz)

## Links

http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2

## Get the MusicBrainz Library

The easiest way to get the library is to use [Composer](https://getcomposer.org/) 
and [Packagist](http://packagist.org/).

If you do not already have Composer in your application, you can install it as
follows.
    
    $ curl -sS https://getcomposer.org/installer | php

Create the ```composer.json``` file.

    $ touch composer.json
    
Add the following to the ```composer.json``` file

    {
        "require": {
            "monkeyphp/music-brainz" "*"
        }
    }

Finally run Composer install

    $ php composer.phar install

You should now have the library installed into your ```vendors``` directory.


## Autoloading the MusicBrainz Library

The easiest way to start using MusicBrainz is to use the Composer autoloader.

Include the Composer autoloader into your script

    require_once "vendor/autoload.php";

## Create an instance of MusicBrainz

### Identity

The MusicBrainz.org api expects that client applications should identity
themselves using the ```User-Agent``` header.

To support this requirement, this MusicBrainz library utilizes a simple Identity class.
The class requires a single constructor parameter; the name that your application will
use to identity itself to the MusicBrainz.org api.

    $identity = new Identity('my_application');

You may also, optionally supply a version number for your application, and a contact
detail so that the MusicBrainz.org administrators may contact you should they need to.

    $identity = new Identity('my_application', 1.1, 'contact@example.com');

To create an instance of MusicBrainz, you must supply either; an instance of 
Identity, a single string or an associative array of values.

### Examples

Create a MusicBrainz instance supplying an Identity instance

    $identity = new Identity('my_application', 1.0, 'contact@example.com');
    $musicBrainz = new MusicBrainz($identity);

Create a MusicBrainz instance by supplying a string

    $musicBrainz = new MusicBrainz('my_application');

Create a MusicBrainz instance by supplying an array of Identity values

    $musicBrainz = new MusicBrainz(array('my_application', 1.0, 'contact@example.com')

Once you have your MusicBrainz instance you may now start querying the MusicBrainz.org
api.

## Resources

MusicBrainz provides the following resources

- Artist ```artist```
- Label ```label```
- Recording ```recording```
- Release ```release```
- Release Group ```release-group```
- Work ```work```
- Area ```area```
- Url ```url```

For each of these resources, you can perform three actions;

- Search
- Lookup
- Browse

### Search a resource

Searching for a resource requires two parameters and accepts a third optional parameter;

- (required) the resource name
- (required) the search string
- (optional) an array of additional options

Searching for a resource will return an instance of a resource specific Search entity

    // returns an instance of ArtistSearch
    $artistSearch = $musicBrainz->search('artist', 'metallica');
    
    // returns an instance of LabelSearch
    $labelSearch = $musicBrainz->search('label', 'parlaphone');
    
    // returns an instance of AreaSearch
    $areaSearch = $musicBrainz->search('area', 'Los Angeles');
    




## Generate Unit tests with Codeception

    $ vendor/bin/codecept generate:phpunit unit MusicBrainzTest/Entity/Alias

## Run the Codeception unit tests

    $ vendor/bin/codecept run unit

Include output report

    $ vendor/bin/codecept run unit --coverage --html


## License

Copyright (C) 2014  David White
 
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see [http://www.gnu.org/licenses/].