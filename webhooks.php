<?php

class webhook
{
    function __construct($url)
    {
        $this->url = $url;
        $this->data = [];
        $this->data["embeds"] = [];
    }

    function set_content($content)
    {
        $this->data["content"] =  $content;
    }

    function set_name($name)
    {
        $this->data["username"] = $name;
    }

    function set_avatar($avatar)
    {
        $this->data["avatar_url"] = $avatar;
    }

    function set_embed($title, $description, $color)
    {
        array_push($this->data["embeds"], ["title" => $title, "description" => $description, "color" => $color]);
        $this->data["embeds"][count($this->data["embeds"])-1]["fields"] = array();
    }

    function embed_field($embed, $name, $value)
    {
        array_push($this->data["embeds"][$embed]["fields"], ["name" => $name, "value" => $value]);
    }

    function embed_author($embed, $author, $icon)
    {
        $this->data["embeds"][$embed]["author"] = ["name" => $author, "icon_url" => $icon];
    }

    function embed_image($embed, $image)
    {
        $this->data["embeds"][$embed]["image"] = ["url" => $image];    
    }

    function embed_thumbnail($embed, $image)
    {
        $this->data["embeds"][$embed]["thumbnail"] = ["url" => $image];
    }
    
    function embed_footer($embed, $text, $icon)
    {
         $this->data["embeds"][$embed]["footer"] = ["text" => $text, "icon_url" => $icon];
    }

    function embed_timestamp($embed, $time)
    {
        $this->data["embeds"][$embed]["timestamp"] = $time;
    }

    function send()
    {
        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL => $this->url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($this->data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec( $ch );
        curl_close( $ch );
    }
}

?>
