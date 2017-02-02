<?php
/**
 * Plugin Name: Slidely slideshows embed easily
 * Plugin URI: http://slidely.com
 * Description: Easily embed photos and music slideshows into your posts with the new Slidely WordPress shortcode
 * Version: 1.0
 * Author: iMoses
 * Author URI: http://wordpress.org/plugins/slidely-slideshows-embed/
 * License: Beer-ware (http://en.wikipedia.org/wiki/Beerware)
 */

class SlidelyMultimediaPlugin {
    public function embed($attributes, $content = null) {
        extract(shortcode_atts(array(
            'w'             => 520,
            'h'             => 292,
            'src'           => null,
            'autoplay'      => 0,
            'remove_ref'    => 1,
        ), $attributes));

        if (empty($src) || !preg_match('/slide\.ly\/(view|gallery\/view|embed|gallery\/embed)\/([0-9a-z]+)/i', $src, $matches))
            return null;

        $embedUrl   = 'http://slide.ly/';

        switch ($matches[1]) {
            case 'view': case 'embed':
                $embedUrl .= "embed/{$matches[2]}/autoplay/{$autoplay}";
                break;

            case 'gallery/view': case 'gallery/embed':
                $embedUrl .= "gallery/embed/{$matches[2]}";
                break;
        }

        $embedCode = "<iframe src=\"{$embedUrl}\" width=\"{$w}\" height=\"{$h}\" frameborder=\"0\" scrolling=\"no\" allowfullscreen></iframe>";

        if (intval($remove_ref) !== 1) $embedCode .= '<p>By <a href="http://slide.ly" target="_blank">Slide.ly - SlideShow Maker</a></p>';

        return $embedCode;
    }
}

add_shortcode('slidely', array('SlidelyMultimediaPlugin', 'embed'));