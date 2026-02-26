<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class BookingManager extends Component
{
    public Property $property;

    public $start_date = '';
    public $end_date = '';

    protected $rules = [
        'start_date' => ['required', 'date', 'after_or_equal:today'],
        'end_date'   => ['required', 'date', 'after:start_date'],
    ];

    protected $messages = [
        'start_date.required' => 'Veuillez choisir une date de début.',
        'start_date.date' => 'La date de début est invalide.',
        'start_date.after_or_equal' => 'La date de début doit être aujourd’hui ou plus tard.',
        'end_date.required' => 'Veuillez choisir une date de fin.',
        'end_date.date' => 'La date de fin est invalide.',
        'end_date.after' => 'La date de fin doit être après la date de début.',
    ];

    public function reserve()
    {
        $this->validate();

        $start = Carbon::parse($this->start_date)->startOfDay();
        $end   = Carbon::parse($this->end_date)->startOfDay();

        $overlap = Booking::query()
            ->where('property_id', $this->property->id)
            ->where('start_date', '<', $end->toDateString())
            ->where('end_date', '>', $start->toDateString())
            ->exists();

        if ($overlap) {
            throw ValidationException::withMessages([
                'start_date' => 'Ce bien est déjà réservé sur cette période.',
            ]);
        }

        Booking::create([
            'user_id'     => auth()->id(),
            'property_id' => $this->property->id,
            'start_date'  => $start->toDateString(),
            'end_date'    => $end->toDateString(),
        ]);

        $this->reset(['start_date', 'end_date']);

        $this->dispatchBrowserEvent('booking-created');

        session()->flash('success', 'Réservation effectuée ');
    }

    public function render()
    {
        $dernieres = Booking::where('property_id', $this->property->id)
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.booking-manager', compact('dernieres'));
    }
}