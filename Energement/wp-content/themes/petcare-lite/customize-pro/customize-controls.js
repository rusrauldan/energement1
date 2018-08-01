( function( api ) {

	// Extends our custom "petcare-lite" section.
	api.sectionConstructor['petcare-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );