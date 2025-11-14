( function( api ) {

	// Extends our custom "cyber-security-elementor" section.
	api.sectionConstructor['cyber-security-elementor'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );