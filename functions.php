<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

/**
 * Enqueue scripts and styles.
 */
function wp_elektroserwis_scripts()
{
  // load bootstrap & AItheme styles css
  global $ver_num;
  $ver_num = mt_rand();
  wp_enqueue_style('wp-elektroserwis-css', get_template_directory_uri() . '/dist/style.css', array(), $ver_num, 'all');
  wp_enqueue_style('font-awesome-4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
  wp_enqueue_script('jquery');
  wp_enqueue_script('my_javascript_file', get_template_directory_uri() . '/dist/main.bundle.js', array('jquery'), $ver_num, true);
  // if (!is_admin()) wp_deregister_script('jquery');
  // wp_enqueue_script('my_javascript_file', get_template_directory_uri() . '/dist/main.bundle.js', array(), $ver_num, true);
}
add_action('wp_enqueue_scripts', 'wp_elektroserwis_scripts');

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * CSDev - Bootstrap 5 wp_nav_menu walker
 * Supports WP MultiLevel menus
 * Based on https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker
 * Requires additional CSS fixes
 * CSS at https://gist.github.com/cdsaenz/d401330ba9705cfe7c18b19634c83004
 * CHANGE: removed custom display_element. Just call the menu with a $depth of 3 or more.
 */
class bs5_Walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  /**
   * Start Level
   */
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach ($this->current_item->classes as $class) {
      if (in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    // CSDEV changed sub-menu  for dropdown-submenu
    $submenu = ($depth > 0) ? ' dropdown-submenu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
  }

  /**
   * Start Element
   */
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    // CSDev added dropdown-menu-child-item & at_depth classes
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu-child-item dropdown-menu-end at_depth_' . $depth;
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class   = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';

    if ($args->walker->has_children) {
      // CSDEV added data-bs-auto-close
      $attributes .=  ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"';
    } else {
      $attributes .=  ' class="' . $nav_link_class . $active_class . '"';
    }

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

// register a new menu
register_nav_menu('main-menu', 'Main menu');

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support('title-tag');

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support('post-thumbnails');

add_filter('body_class', 'add_category_to_single');
function add_category_to_single($classes)
{
  if (is_single()) {
    global $post;
    foreach ((get_the_category($post->ID)) as $category) {
      // add category slug to the $classes array
      $classes[] = 'cat-' . $category->category_nicename;
    }
  }
  // return the $classes array
  return $classes;
}

add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  }
  return $title;
});

// Ccrossorigin Font-awsome 4
function add_font_awesome_4_cdn_attributes($html, $handle)
{
  if ('font-awesome-4' === $handle) {
    return str_replace("media='all'", "media='all' integrity='sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=' crossorigin='anonymous'", $html);
  }
  return $html;
}
add_filter('style_loader_tag', 'add_font_awesome_4_cdn_attributes', 10, 2);


// First we'll add support for featured images
add_theme_support('post-thumbnails');

// Then we'll add our 2 custom images
add_image_size('blog-width', 530, 350, true);
add_image_size('news-width', 450, 450, true);

// And then we'll add the custom size that spans the width of the blog to the Gutenberg image dropdown
add_filter('image_size_names_choose', 'wpmudev_custom_image_sizes');

function wpmudev_custom_image_sizes($sizes)
{
  return array_merge($sizes, array(
    'blog-width' => __('Blog Width'),
    'news-width' => __('News Width'),
  ));
}

// // IF IS PAGE CHILD TREE
// function is_tree($pid)
// {      // $pid = The ID of the page we're looking for pages underneath
//   global $post;         // load details about this page
//   if (is_page() && ($post->post_parent == $pid || is_page($pid)))
//     return true;   // we're at the page or at a sub page
//   else
//     return false;  // we're elsewhere
// };

add_filter('show_admin_bar', '__return_false');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function wp_elektroserwis_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Top toolbar', 'elektroserwis-wp-theme'),
    'id' => 'top-toolbar',
    'description' => esc_html__('Add widgets here.', 'elektroserwis-wp-theme'),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Bottom menu services', 'elektroserwis-wp-theme'),
    'id'            => 'menu-services',
    'description'   => esc_html__('Add widgets here.', 'elektroserwis-wp-theme'),
    'before_widget' => '<div id="%1$s" class="bottom-nav-menu widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="bottom-nav-menu__title mb-2 mb-lg-3 font-weight-bold">',
    'after_title'   => '</h5>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Bottom menu about', 'elektroserwis-wp-theme'),
    'id'            => 'menu-about',
    'description'   => esc_html__('Add widgets here.', 'elektroserwis-wp-theme'),
    'before_widget' => '<div id="%1$s" class="bottom-nav-menu widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="bottom-nav-menu__title mb-2 mb-lg-3 font-weight-bold">',
    'after_title'   => '</h5>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Footer start', 'elektroserwis-wp-theme'),
    'id'            => 'footer-start',
    'description'   => esc_html__('Add widgets here.', 'elektroserwis-wp-theme'),
    'before_widget' => '<div id="%1$s" class=" widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="bottom-nav-menu__title mb-2 mb-lg-3 font-weight-bold">',
    'after_title'   => '</h5>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Left sidebar', 'elektroserwis-wp-theme'),
    'id'            => 'left-sidebar',
    'description'   => esc_html__('Add widgets here.', 'elektroserwis-wp-theme'),
    'before_widget' => '<div id="%1$s" class=" widget %2$s">',
    'after_widget'  => '</div>',
  ));
}

add_action('widgets_init', 'wp_elektroserwis_widgets_init');
add_filter('widget_text', 'do_shortcode');

// Remove <p> in block Contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');


function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');

  // Opcjonalne dodatkowe wsparcie, np. dla miniatur produktów, galerii itp.
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');



// Ustaw maksymalną liczbę produktów na stronę w sklepie WooCommerce
add_filter('loop_shop_per_page', 'custom_woocommerce_products_per_page', 20);

function custom_woocommerce_products_per_page($products)
{
  // Ustaw wartość na liczbę produktów, którą chcesz wyświetlić
  $products = 12;
  return $products;
}

function custom_woocommerce_image_dimensions()
{
  // Miniaturki listy produktów
  add_image_size('woocommerce_thumbnail', 150, 150, true); // Wymiary: 150x150, crop (przycięcie)
  add_image_size('shop_catalog', 150, 150, true); // Wymiary: 150x150 dla katalogu
  add_image_size('shop_single', 300, 300, true); // Wymiary: 300x300 dla strony pojedynczego produktu
}

add_action('after_setup_theme', 'custom_woocommerce_image_dimensions', 1);

// Show only 3 products in row on list
add_filter('loop_shop_columns', 'custom_loop_columns', 999);
function custom_loop_columns($columns)
{
  return 3; // Ustaw 3 produkty w rzędzie
}

//order
add_action('woocommerce_cart_calculate_fees', 'add_cod_shipping_fee', 10, 1);

function add_cod_shipping_fee($cart)
{
  if (is_admin() || !is_checkout()) {
    return;
  }

  // Pobierz wybraną metodę płatności
  $chosen_payment_method = WC()->session->get('chosen_payment_method');
  // Pobierz wybraną metodę wysyłki
  $chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');
  $chosen_shipping_method = isset($chosen_shipping_methods[0]) ? $chosen_shipping_methods[0] : '';

  // Określ dodatkowe koszty dla każdej metody wysyłki
  $additional_fee = 0;
  if ($chosen_payment_method === 'cod') {
    if ($chosen_shipping_method === 'flat_rate:3') { // InPost
      $additional_fee = 3.11;
    } elseif ($chosen_shipping_method === 'flat_rate:4') { // UPS
      $additional_fee = 6.13;
    } elseif ($chosen_shipping_method === 'flat_rate:5') { // GLS
      $additional_fee = 4.09;
    } elseif ($chosen_shipping_method === 'flat_rate:6') { // DHL
      $additional_fee = 3.43;
    } elseif ($chosen_shipping_method === 'flat_rate:8') { // DPD
      $additional_fee = 3.72;
    }
    // Dodaj dodatkowy koszt
    if ($additional_fee > 0) {
      $cart->add_fee(__('Dodatkowy koszt za pobraniem', 'your-text-domain'), $additional_fee);
    }
  }
}

add_action('wp_footer', 'refresh_cart_on_payment_change');

function refresh_cart_on_payment_change()
{
  if (is_checkout()) {
?>
    <script type="text/javascript">
      jQuery(function($) {
        // Nasłuchuj zmian metody płatności
        $('form.woocommerce-checkout').on('change', 'input[name="payment_method"]', function() {
          // Wymuś odświeżenie koszyka
          $(document.body).trigger('update_checkout');
        });
      });
    </script>
<?php
  }
}
