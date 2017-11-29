<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 11/28/16
 * Time: 1:04 AM
 *
 * MVC From Scratch - Udemy Example
 *
 */

namespace Core;



class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     *
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */

    protected $params = [];

    /**
     * Add a route to the routing table
     * @param string $route The route URL
     * @param array $params Parameters (controller, action, etc.)
     * @return void
     *
     */
    public function add($route, $params = [])
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z-]+)\}/', '(?P<\1>[a-z-_]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z-]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     * on the /public/index.php file
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }


    /**
     * Match the route to the route in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $url The route URL
     * @return boolean true if a match is found
     * false otherwise
     */

    public function match($url)
    {
        foreach($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     *
     *
     */

    public function getParams()
    {
        return $this->params;
    }

    /**
     * Dispatch the route, creating the controller object and running the
     * action method
     *
     * @param string $url The route URL
     *
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {  // match is matching the controller / action in the routing table on index.php
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            //$controller = "app\controller\\$controller";
            $controller = $this->getNamespace() . $controller;

            if (class_exists($controller)) { // if class exist

                // create new controller object that is properly formatted
                $controller_object = new $controller($this->params);

                // get action param
                // create new action method object that is properly formatted
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                // if action is callable or not private
              if(preg_match('/action$/i', $action) == 0) {
                if (is_callable([$controller_object, $action])) {
                  $controller_object->$action();
                }
              }else {
                    echo "Method $action (in controller $controller) not found";
                }
            } else {
                echo "Controller class $controller not found";
            }
        } else {
            echo 'No route matched.';
        }
    }

    /**
     * Convert the string with hyphens to StudlyCaps,
     * e.g. post-authors => PostAuthors
     *
     * @param string $string The string to convert
     *
     * @return string
     */
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * Convert the string with hyphens to camelCase,
     * e.g. add-new => addNew
     *
     * @param string $string The string to convert
     *
     * @return string
     */
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }


    /**
     * Remove the query string variables from the URL (if any). As the full
     * query string is used for the route, any variables at the end will need
     * to be removed before the route is matched to the routing table. For
     * example:
     *
     *   URL                           $_SERVER['QUERY_STRING']  Route
     *   -------------------------------------------------------------------
     *   localhost                     ''                        ''
     *   localhost/?                   ''                        ''
     *   localhost/?page=1             page=1                    ''
     *   localhost/posts?page=1        posts&page=1              posts
     *   localhost/posts/index         posts/index               posts/index
     *   localhost/posts/index?page=1  posts/index&page=1        posts/index
     *
     * A URL of the format localhost/?page (one variable name, no value) won't
     * work however. (NB. The .htaccess file converts the first ? to a & when
     * it's passed through to the $_SERVER variable).
     *
     * @param string $url The full URL
     *
     * @return string The URL with the query string variables removed
     */
    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }

    /**
     * Get the namespace for the controller class. The namespace defined in the
     * route parameters is added if present.
     *
     * @return string The request URL
     */
    protected function getNamespace()
    {
        // check if param has cms dir value if not default to app dir
        //$namespace = $this->params['appcms'] ? : 'app';
        $namespace = isset($this->params['appcms']) ? $this->params['appcms'] : 'app';
        $namespace .= '\controller\\';


        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }

}