	$.fbuilder.typeList.push(
		{
			id:"fButton",
			name:"Button",
			control_category:1
		}
	);
	$.fbuilder.controls[ 'fButton' ]=function(){};
	$.extend(
		$.fbuilder.controls[ 'fButton' ].prototype,
		$.fbuilder.controls[ 'ffields' ].prototype,
		{
			ftype:"fButton",
            sType:"button", // button, reset, calculate
            sValue:"button",
            sOnclick:"",
            sOnmousedown:"",
			sLoading: false,
			userhelp:"A description of the section goes here.",
			display:function()
				{
					return $.fbuilder.sanitize('<div class="fields '+this.name+' '+this.ftype+'" id="field'+this.form_identifier+'-'+this.index+'" title="'+this.name+'"><div class="arrow ui-icon ui-icon-play "></div><div title="Delete" class="remove ui-icon ui-icon-trash "></div><div title="Duplicate" class="copy ui-icon ui-icon-copy "></div><input type="button" disabled value="'+$.fbuilder.htmlEncode(this.sValue)+'"><span class="uh">'+this.userhelp+'</span><div class="clearer" /></div>');
				},
			editItemEvents:function()
				{
					var evt=[
						{s:"#sValue",e:"change keyup", l:"sValue"},
						{s:"#sLoading",e:"click", l:"sLoading",f:function(el){return el.is(':checked');}},
						{s:"#sOnclick",e:"change keyup", l:"sOnclick"},
						{s:"#sOnmousedown",e:"change keyup", l:"sOnmousedown"},
						{
							s:"[name='sType']",e:"click",
							l:"sType",
							f:function(e)
							{
								var v = e.val(),
									l = $('#sLoading').closest('div');
								l.hide();
								if(v == 'calculate') l.show();
								return v;
							}
						}
					];
					$.fbuilder.controls[ 'ffields' ].prototype.editItemEvents.call(this,evt);
				},
            showSpecialDataInstance: function()
                {
                    return this._showTypeSettings() + this._showValueSettings() + this._showOnclickSettings();
                },
            _showTypeSettings: function()
                {
                    var l = [ 'calculate', 'reset', 'button' ],
                        r  = "", v;
					for( var i = 0, h = l.length; i < h; i++ )
                    {
                        v = l[ i ];
                        r += '<label class="column width30"><input type="radio" name="sType" value="' + v + '" ' + ( ( this.sType == v ) ? 'CHECKED' : '' ) + ' >' + v + '</label>';
                    }
					r += '<div class="clear"></div>';
					r += '<div '+((this.sType != 'calculate') ? 'style="display:none;"' : '')+'><label><input type="checkbox" id="sLoading" ' + ((this.sLoading) ? 'CHECKED' : '') + ' >display "calculation in progress" indicator</label></div>';
                    return '<label>Select button type</label>'+r+'<div class="clearer" />';
                },
            _showValueSettings: function()
                {
                    return '<label>Value</label><input type="text" class="large" name="sValue" id="sValue" value="'+$.fbuilder.htmlEncode(this.sValue)+'" />';
                },
            _showOnclickSettings: function()
                {
                    return '<label>OnClick event</label><textarea class="large" name="sOnclick" id="sOnclick">'+this.sOnclick+'</textarea><div class="clearer"><i>To transform the button into a submit button, enter the onclick event: <b>jQuery(this.form).submit();</b></i></div>'+
                    '<label>OnMouseDown event</label><textarea class="large" name="sOnmousedown" id="sOnmousedown">'+this.sOnmousedown+'</textarea>';
                },
            showTitle: function(){ return ''; },
            showShortLabel: function(){ return ''; }
	});