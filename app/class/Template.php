<?php
namespace CodePlugin;

class Template {



    /**
     * Add a theme and the appropriate classes to convert a html element to pretty printed code.
     *
     *
     * @param string $theme The theme you want applied.
     * @param string $selector The jquery selector the theme and classes will be applied to, default is `pre`.
     * @param boolean $line_nums Whether to add line numbers to the code.
     *
     * @return void
    */
    public function formatAsCode($theme = '', $selector = 'pre', $line_nums = false){

        \CodePlugin\field\Code::includeTheme($theme);

        $classes = Array('prettyprint');

        if($theme){
            $classes[] = $theme;
        }//if

        if($line_nums){
            $classes[] = 'linenums';
        }//if

        $classes = implode(' ',$classes);

        \View::script("$('{$selector}').addClass('{$classes}');");

    }//asCode



}//Template
