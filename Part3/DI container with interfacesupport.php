<?php

interface ServiceInterface
{
    public function execute();
}

class ServiceA implements ServiceInterface
{
    public function execute()
    {
        return "ServiceA executed";
    }
}

class ServiceB implements ServiceInterface
{
    public function execute()
    {
        return "ServiceB executed";
    }
}

class Container
{
    private array $services = [];

    public function set(string $name, callable $resolver)
    {
        $this->services[$name] = $resolver;
    }

    public function get(string $name)
    {
        if (!isset($this->services[$name])) {
            throw new Exception("Service not found: " . $name);
        }

        return $this->services[$name]($this);
    }
}

// Usage example
$container = new Container();

// Register services
$container->set(ServiceInterface::class, function () {
    return new ServiceA(); 
});

// Resolve and use the service
$service = $container->get(ServiceInterface::class);
echo $service->execute();