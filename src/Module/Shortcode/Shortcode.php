<?php

namespace SimpleFloatingContactForm\Module\Shortcode;

class Shortcode
{
  const PREFIX = 'sfcf_';
  private array $shortcodeTags = [];

  public function __construct()
  {
    $this->shortcodeTags = [
      'link'
    ];

    $this->prepareCustomShortcodes();
  }

  private function prepareCustomShortcodes(): void
  {
    if (empty($this->shortcodeTags)) {
      return;
    }

    foreach ($this->shortcodeTags as $tag) {
      if (! method_exists($this, ('addShortcode' . ucfirst($tag)))) {
        continue;
      }

      add_shortcode((self::PREFIX . $tag), [$this, ('addShortcode' . ucfirst($tag))]);
    }
  }

  public function addShortcodeLink(array $atts, string $content): string
  {
    if (empty($atts)) {
      return $content;
    }

    $atts = array_map(function($att){
      return esc_html($att);
    }, $atts);

    return '<a href="' . ($atts['url'] ?? '#') . '"' . (($atts['target_blank'] ?? false) ? ' target="_blank"' : '') . '>' . ($atts['title'] ?? '') . '</a>';
  }

  public function doShortcodesInContent(string $content): string
  {
    if (empty($this->shortcodeTags)) {
      return $content;
    }

    return do_shortcode($content);
  }
}
