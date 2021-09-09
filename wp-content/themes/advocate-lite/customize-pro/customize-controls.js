( function( api ) {

	// Extends our custom "advocate-lite" section.
	api.sectionConstructor['advocate-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );