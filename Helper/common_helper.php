<?php

if ( ! function_exists('showContent'))
{
    /**
     * @access	public
     * @param string $image
     * @return string
     */
    function showContent($content, $length = 2000, $prefix = '...')
    {
        $prefix = ($length == 0) ? '' : $prefix;
        //$content = str_replace(['<p>','</p>'], '', $content);
        return html_entity_decode(preg_replace('/\s+?(\S+)?$/', '', substr($content, 0, $length))) . $prefix;
    }
}

/* End of file common_helper.php */
