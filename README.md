# MusicBrainz

Client library for accessing the MusicBrainz Api.

[![Build Status](https://travis-ci.org/monkeyphp/music-brainz.png?branch=develop)](https://travis-ci.org/monkeyphp/music-brainz)

## Links

http://musicbrainz.org/doc/Development/XML_Web_Service/Version_2

## Learn


### Resources

MusicBrainz provides the following resources

- Artist
- Label
- Recording
- Release
- Release Group
- Work
- Area
- Url


### Autoloading the MusicBrainz library

The easiest way to start using the MusicBrainz library is to use the 
Composer autoloader.

    require_once "vendor/autoload.php";

### Create an instance of MusicBrainz

Create a default instance of MusicBrainz class.

    $musicBrainz = new MusicBrainz\MusicBrainz();

### Browse a resource

    $artist = $musicBrainz->browse('artist', $mbid);


### Lookup a resource

    $artist = $musicBrainz->lookup('artist', $mbid);


### Search a resource

    $artist = $musicBrainz->search('artist', 'Metallica');

## Generate Unit tests with Codeception

    $ vendor/bin/codecept generate:phpunit unit MusicBrainzTest/Entity/Alias

## Run the Codeception unit tests

    $ vendor/bin/codecept run unit


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