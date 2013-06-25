/* Theme Specific Javascript
------------------------------------------------------------ */
(function ($) {

  /**
   * Instantiate the Typekit Font Service
   *
   * Load the Typekit Font Service library from an external
   * source (i.e., Typekit servers)
   *
   */
  try{
    Typekit.load();
  } catch(e) {
    if (console) {
      console.log('[ERROR] Typekit was not properly loaded.');
    }
  }

  jQuery(document).ready(function(){

  });
    
})(jQuery);
