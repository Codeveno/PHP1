<?php

// A brief explanation of PHP attributes
// Attributes in PHP are a way of adding metadata to classes, methods, and properties. 
// This metadata can then be accessed using reflection. Attributes are a powerful way 
// to describe the behavior of classes, methods, and properties in a declarative manner.

echo "<h2>PHP Attributes and Simple Routing Example</h2>";

// Define a custom route attribute to be used on methods
#[Attribute(Attribute::TARGET_METHOD)]  // This indicates that this attribute is for methods
class Route
{
    public string $path;
    public string $method;

    public function __construct(string $path, string $method = 'GET')
    {
        $this->path = $path;
        $this->method = $method;
    }
}

// Define a class to represent the simple routing system
class Router
{
    private array $routes = [];

    // Function to register routes
    public function registerRoutes(string $controllerName)
    {
        // Use reflection to find methods annotated with the Route attribute
        $controller = new ReflectionClass($controllerName);
        $methods = $controller->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            // Check if the method has a Route attribute
            $attributes = $method->getAttributes(Route::class);
            foreach ($attributes as $attribute) {
                // Get the instance of the Route attribute
                $route = $attribute->newInstance();
                // Store the route path and method in the routes array
                $this->routes[$route->path] = [
                    'method' => $route->method,
                    'handler' => [$controller->getName(), $method->getName()]
                ];
            }
        }
    }

    // Function to match a route based on the URL
    public function handleRequest(string $url, string $method)
    {
        foreach ($this->routes as $path => $route) {
            if ($url == $path && $method == $route['method']) {
                // Call the controller method if the route matches
                call_user_func($route['handler']);
                return;
            }
        }

        // Return a 404 if no route matches
        echo "404 Not Found";
    }
}

// Create a simple controller with attributes
class MyController
{
    #[Route("/home", "GET")]
    public function home()
    {
        echo "Welcome to the Home Page!";
    }

    #[Route("/about", "GET")]
    public function about()
    {
        echo "This is the About Page!";
    }

    #[Route("/contact", "POST")]
    public function contact()
    {
        echo "Contact Form Submitted!";
    }
}

// Instantiate the router
$router = new Router();

// Register the routes from the controller
$router->registerRoutes(MyController::class);

// Simulate requests and match routes
echo "<hr>";

// Test GET /home
echo "Test 1: Requesting GET /home <br>";
$router->handleRequest("/home", "GET");  // Should display "Welcome to the Home Page!"

echo "<hr>";

// Test GET /about
echo "Test 2: Requesting GET /about <br>";
$router->handleRequest("/about", "GET");  // Should display "This is the About Page!"

echo "<hr>";

// Test POST /contact
echo "Test 3: Requesting POST /contact <br>";
$router->handleRequest("/contact", "POST");  // Should display "Contact Form Submitted!"

echo "<hr>";

// Test an invalid route
echo "Test 4: Requesting GET /invalid <br>";
$router->handleRequest("/invalid", "GET");  // Should display "404 Not Found"

?>
