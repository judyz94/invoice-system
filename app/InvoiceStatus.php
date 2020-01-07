<?php


namespace App;

use MyCLabs\Enum\Enum;

class InvoiceStatus extends Enum
{
    private const New = 'New';
    private const Sent = 'Sent';
    private const Rejected = 'Rejected';
    private const Overdue = 'Overdue';
    private const Paid = 'Paid';

    public function getColour(): string
    {
        return [
                InvoiceStatus::New => 'blue',
                InvoiceStatus::Sent => 'orange',
                InvoiceStatus::Rejected => 'red',
                InvoiceStatus::Overdue => 'gray',
                InvoiceStatus::Paid => 'green',
            ][$this->value] ?? 'white';
    }
}
