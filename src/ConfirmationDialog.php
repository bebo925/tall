<?php

namespace Tall;

use LivewireUI\Modal\ModalComponent;

class ConfirmationDialog extends ModalComponent
{
    public $message;
    public $title;
    public $confirmText = 'OK';
    public $cancelText = 'Cancel';
    public $event = 'confirmed';
    public $data;
    public $style = 'primary';

    public function confirm()
    {
        $this->closeModalWithEvents([
            [$this->event, [true, $this->data]]
        ]);
    }

    public function cancel()
    {
        $this->closeModalWithEvents([
            [$this->event, [false, $this->data]]
        ]);
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('tall::confirmation-dialog');
    }
}
