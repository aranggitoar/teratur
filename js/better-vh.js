( function() {
	window.addEventListener( 'load', () => {
		document.querySelector( ':root' ).style
			.setProperty( '--vh', ( window.innerHeight / 100 ) + 'px' );
		document.body.style.display = 'flex';
	} );

	window.addEventListener( 'resize', () => {
		document.querySelector( ':root' ).style
			.setProperty( '--vh', ( window.innerHeight / 100 ) + 'px' );
	} );
}() );
