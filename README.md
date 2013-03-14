# Message module for Kohana 3.3.0

## Setup
1. Copy to `'modules/message'` directory
2. Enable this module in bootstrap.php: 
>'message'  => MODPATH.'message'

## Using
Somewhere in your controllers:
>Message::set(Message::SUCCESS, 'Well done!');

or

>Message::set(Message::ERROR, array('Error happens!', 'Again and again'));

Somewhere in your templates:
><?php Message::render(); ?>

## Optionally
* Configure `session_key` and `default_view` in configuration file
* Override Message class to use your custom types
* Use `view/bootstrap` template to integrate with twitter bootstrap framework