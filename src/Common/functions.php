<?php

/**
 * Gets the HTML code from a given template. You can pass optional parameters to display them into the template
 *
 * @param string $templatePath
 * @param array  $args
 *
 * @return string
 */
function get_template( string $templatePath, array $args ) : string {
  extract( $args );
  
  ob_start();
  require $templatePath;
  return ob_get_clean();
}



/**
 * Gets the common header HTML code, you can set an optional page meta title
 *
 * @param array{
 *     title:string
 * } $args
 *
 * @return string
 */
function get_header( array $args ) : string {
  extract( $args );
  
  ob_start();
  require __PROJECT_ROOT__ . "/views/fragments/header.php";
  return ob_get_clean();
}



/**
 * Gets the common footer HTML Code
 *
 * @return string
 */
function get_footer () : string {
  ob_start();
  require __PROJECT_ROOT__ . "/views/fragments/footer.php";
  return ob_get_clean();
}



/**
 * Gets the 404 page HTML code
 *
 * @return string
 */
function get_404 () : string {
  http_response_code(404);
  
  ob_start();
  require __PROJECT_ROOT__ . "/views/404.php";
  return ob_get_clean();
}