# Symfony Factory Design Pattern Sample

This is an example of how to use factory design pattern in Symfony projects.


For testing:

`php bin/console send:notification --type=email --to="durafurkan@gmail.com" --message="Hello world"`

`php bin/console send:notification --type=sms --to="+905555555555" --message="Hello world"`

`php bin/console send:notification --type=sms --to="a8b7c6d5e4f3g2h1" --message="Hello world"`

The notification class executed by this command is built with a factory design pattern.

You can apply it in your projects by examining the codes.
