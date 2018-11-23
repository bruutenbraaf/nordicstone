<span class="u_icon">

<svg id="cart_icon" data-name="cart icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 18"><path id="Shape" d="M10,16.5A1.5,1.5,0,1,1,8.5,15,1.5,1.5,0,0,1,10,16.5ZM13.5,15A1.5,1.5,0,1,0,15,16.5,1.5,1.5,0,0,0,13.5,15Zm1.34-5,2-7H0l2.94,7Zm5-10L16.37,12H3.78l.83,2H17.85L21.33,2h1.93L24,0Z" transform="translate(0 0)"/></svg>
<span class="count"><?php echo sprintf ( _n( '%d ', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> </span>