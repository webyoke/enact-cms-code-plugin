Enact.react_class.FieldOptions.Code = React.createClass({

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
            themes.push(<option value={theme} key={i}>{theme}</option>);
        });

        return (
            <div>

                <label>Theme</label>
                <select name='theme' defaultValue={this.props.options.theme} onChange={this.onChange}>
                    <option value=''></option>
                    {themes}
                </select>

                <label>Show Line Numbers?</label>
                <select name='linenums' defaultValue={this.props.options.linenums} onChange={this.onChange}>
                    <option value='0'>No</option>
                    <option value='1'>Yes</option>
                </select>

            </div>
        );
    }//render

});
