<?php

/**
 * Code Plugin.
 *
 * Only functionality is providing the custom `Code` field type.
*/
class CodePlugin extends \Enact\Plugin {



    public function name(){
        return 'Code';
    }//name



    public function creator(){
        return 'WebYoke';
    }//creator


    public function website(){
        return 'http://webyoke.com';
    }//website


    public function version(){
        return 1.0;
    }//version



    public function githubLink(){
        return 'https://github.com/webyoke/enact-cms-code-plugin';
    }//githubLink



    public function onBoot(){
        require 'vendor/autoload.php';
    }//onBoot



    public function template(){
        return new \CodePlugin\Template;
    }//template


    public function fields(){
        return Array(
            new \CodePlugin\field\CodeDefinition
        );
    }//fields



}//CodePlugin

return new CodePlugin;
