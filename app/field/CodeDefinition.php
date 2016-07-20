<?php
namespace CodePlugin\field;

class CodeDefinition {



    public function name(){
        return 'Code';
    }//name



    public function fieldClass(){
        return 'CodePlugin\field\Code';
    }//wrapperClass



    public function fieldAssets(){
        return Array(
            '/js/jsx/CodeField.js'
        );
    }//fieldAssets



    public function optionsAssets(){
        return Array(
            '/js/jsx/CodeFieldOptions.js'
        );
    }//optionAssets



    /**
     * Provide the list of css theme files from `resource/css/theme/` and any user defined custom theme files 
     * used for styling the code field output.
     *
     *
     * @return string A JSON encoded string, where `themes` is an array of css theme files.
    */
    public function fieldOptionProps(){

        $themes = glob(CODE_PLUGIN_PATH . '/resource/css/theme/*.css');

        $custom_themes_dir = \CodePlugin::instance()->config('customThemesDir');

        if($custom_themes_dir !== null){
            $custom_themes_dir = ENACT_PUBLIC_PATH . trim($custom_themes_dir,'/') . '/';
            if(is_dir($custom_themes_dir)){
                $themes = array_merge($themes, glob($custom_themes_dir . '*.css'));
            }//if
        }//if

        foreach($themes as $k => $v){
            $themes[$k] = pathinfo($v, PATHINFO_FILENAME);
        }//foreach

        return json_encode(Array('themes' => $themes));

    }//fieldOptionProps


}//CodeDefinition
