// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import singlePost from './routes/single-post';
import singleProduct from './routes/single-product';

// Import Leaflet JS
import 'leaflet/dist/leaflet';

// Import Slick
import 'slick-carousel/slick/slick.min';

// Import Tocca
import 'tocca/Tocca.min';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Single Product
  singleProduct,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  // Single posts
  singlePost,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
