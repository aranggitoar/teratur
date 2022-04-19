const postSearchResultGridItem =
  document.querySelectorAll( 'article.elementor-grid-item' );

postSearchResultGridItem.forEach(item => {
  item.style.cursor = "pointer";
  item.addEventListener('click', () => {
    item.querySelector('.elementor-post__title > a').click();
  } );
} );
