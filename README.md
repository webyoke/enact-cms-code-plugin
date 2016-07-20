#Code Plugin for Enact CMS
Plugin for [Enact CMS](https://enactcms.com).

##Purpose
Provides a custom `Code` field which allows for users to enter raw code of any type as a custom field in your Enact
powered sites.

When displayed via your Twig templates the code field utilizes the [Google Code Prettify library](https://github.com/google/code-prettify) 
to display an awesome pretty formatted output of the code.

###Themes
All the [themes](https://rawgit.com/google/code-prettify/master/styles/index.html) provided by the library are
available for selection when you create a new code field via the field options. We have even edited the themes css
files to allow for using multiple themes per single page. This way you can have multiple custom code fields on
a single page while utilizing any number of themes for each code field.


###Custom Themes
You can roll your own custom themes and use them with the code field if you desire.

Create a directory somewhere in your public folder where the theme(s) will be stored:
```
mkdir public/css/code-themes
```

You should use one of the themes that comes with the plugin as a starting point, and preferably use the sass
`.scss` version for sanity.
```
cp enact/plugin/code/resource/css/theme/desert.scss public/css/code-themes/your-theme.scss
```

Now open the theme file with your favorite editor and change the `.desert` class to match the file name of the
theme: `.desert -> .your-theme`, this is critical, the name of the file **MUST** match the name of the class. From there have at it changing anything you like. Don't forget to compile your
changes down with your favorite build tool or just a plain-old:
```
sass your-theme.scss your-theme.css
```

Lastly, tell the code plugin where your custom themes are stored by creating a config file at `enact/config/Code.php`:
```
return Array(
    'customThemesDir' => 'css/code-themes/`
);
```

Any `.css` file in the directory will be added to the available themes dropdown selection menu on all code fields
options, you should avoid using names already provided by the deafult themes.

###Convert any element into pretty printed code
Use the `formatAsCode` method to convert elements on the page to pretty printed code regardless of whether they
used the custom code field.
```
{{ enact.plugin.Code.formatAsCode(theme,selector,line_nums) }}
```
- @param string $theme The theme you want applied.
- @param string $selector The jquery selector the theme and classes will be applied to, default is `pre`.
- @param boolean $line_nums Whether to add line numbers to the code.

Call this anywhere in your templates to convert the elements to pretty print code with the specified theme.
