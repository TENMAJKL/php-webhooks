# PHP discord webhooks

Version 1.1\
Simple class to send spicy discord webhooks\


# Documentation

Start by importing\
`include "webhooks.php"`\

Create a webhook\
`new webhook(url)`\

Send simple content\
method->`set_content(content)`\

Change name\
method->`set_name(name)`\

Change avatar\
method->`set_avatar(avatar_url)`\

#Embeds
Send embed\
method->`set_embed(title, description, color)`\

Embed fileds\
method->`embed_field(embed, name, value)`\

Embed author\
method->`embed_author(embed, name, image)`\

Embed image\
method->`embed_image(embed, image)`\

Embed thumbnail\
method->`embed_thumbnail(embed, image)`\

Embed footer\
method->`embed_footer(embed, text, icon)`\

Embed timestamp\
method->`embed_timestamp(embed, time)`-temp\



To send just use this method\
`send()`


# Examples
```php
include "webhooks.php"

$hook = new webhook("example-url")

$hook->set_embed("Announcement", "php is good", 0x0000ff) //this embed has number 0

$hook->embed_field(0, "Iam", "Haphpy man")

$hook->send()
```
