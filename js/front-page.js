const newLoc = window.location.href.substr( 0, window.location.href.indexOf( '?' ) );
history.replaceState( window.location.href, '', newLoc );
