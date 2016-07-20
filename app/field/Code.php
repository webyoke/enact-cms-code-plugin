<?php
namespace CodePlugin\field;

/**
 * Twig template access for Code fields.
*/
class Code extends \Enact\template\wrapper\BaseFieldWrapper {


    /**
     * @var boolean $included_pretty_print Whether the `run_prettyify.js` script has been included in the current 
     * view.
    */
    private static $included_pretty_print = false;


    /**
     * @var array $included_theme Holds themes that have been included in the current view.
    */
    private static $included_theme = Array();



    public static function includeTheme($theme = ''){

        if(!self::$included_pretty_print){
            \CodePlugin::instance()->includeResource('/js/run_prettify.js');
            self::$included_pretty_print = true;
        }//if

        if($theme && !isset(self::$included_theme[$theme])){

            if(!is_file(CODE_PLUGIN_PATH . "/resource/css/theme/{$theme}.css")){
                $custom_theme_dir = \CodePlugin::instance()->config('customThemesDir');
                \View::styleSrc('/' . trim($custom_theme_dir,'/') . "/{$theme}.css");
            } else {
                \CodePlugin::instance()->includeResource("/css/theme/{$theme}.css");
            }//el

            self::$included_theme[$theme] = true;

        }//if

    }//includeTheme


    /**
     * Call `$this->render()` allowing the Code field to be called directyly as a string.
     *
     *
     * @return string
    */
    public function __toString(){
        return $this->render();
    }//toString



    /**
     * Returns a `<pre>` HTML element with the appropriate classes and the code to be displayed.
     *
     *
     * @return string
    */
    public function render(){

        $theme = $this->field['field_options']->theme;

        self::includeTheme($theme);

        $classes = Array('prettyprint', $theme);

        if(property_exists($this->field['field_options'],'linenums') && $this->field['field_options']->linenums == '1'){
            $classes[] = 'linenums';
        }//if

        return \Html::pre(Array(
                'class' => implode(' ',$classes),
            ),
            htmlentities($this->field['field_value'])
        );

    }//render



}//Code
?>
