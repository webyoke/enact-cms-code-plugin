Enact.react_class.FieldOptions.Code = React.createClass({displayName: "Code",

    componentWillMount: function(){

        if(this.props.options.linenums === undefined){
            this.props.options.linenums = '0';
        }//if

        if(this.props.options.theme === undefined){
            this.props.options.theme = '';
        }//if

    },//componentWillMount

    onChange: function(event){
        this.props.options[event.target.getAttribute('name')] = event.target.value;
    },//onChange

    render : function(){

        var themes = [];

        this.props.plugin.themes.map(function(theme,i){
            themes.push(React.createElement("option", {value: theme, key: i}, theme));
        });

        return (
            React.createElement("div", null, 

                React.createElement("label", null, "Theme"), 
                React.createElement("select", {name: "theme", defaultValue: this.props.options.theme, onChange: this.onChange}, 
                    React.createElement("option", {value: ""}), 
                    themes
                ), 

                React.createElement("label", null, "Show Line Numbers?"), 
                React.createElement("select", {name: "linenums", defaultValue: this.props.options.linenums, onChange: this.onChange}, 
                    React.createElement("option", {value: "0"}, "No"), 
                    React.createElement("option", {value: "1"}, "Yes")
                )

            )
        );
    }//render

});
