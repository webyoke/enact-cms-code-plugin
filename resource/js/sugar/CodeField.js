Enact.react_class.Fields.Code = React.createClass({

    mixins: [Enact.react_class.Fields.BaseField],

    componentDidMount: function(){
        this.TextLiner = $(this.refs['raw']).TextLiner();
    },//componentDidMount

    onChange: function(event){
        this.props.field.value = event.target.value;
    },//onChange

    render: function(){
        return (
            <div>
                <div ref='raw' className='text-liner'>
                    <div className='text-liner-numbers'></div>
                    <div className='text-liner-textarea'>
                        <textarea ref='raw-text' defaultValue={this.props.field.value} onChange={this.onChange}></textarea>
                    </div>
                </div>

                <div className={this.getErrorClass()}>You must enter some code in this code area</div>

            </div>
        );
    }//render

});
