<?php
namespace app;

class Customer
{
    public function __construct(
        public string $name,
        public string $email,
        public ?string $phone = null 
    ) {}

    public function getDetails(): string
    {
        $details = "Customer: {$this->name}, Email: {$this->email}";
        if ($this->phone) {
            $details .= ", Phone: {$this->phone}";
        }
        return $details;
    }

    public function updateEmail(string $newEmail): void
    {
        $this->email = $newEmail;
    }

    public function updatePhone(?string $newPhone): void
    {
        $this->phone = $newPhone;
    }
}
?>
