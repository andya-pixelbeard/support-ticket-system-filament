<?php

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class CompleteAccount extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Password')
                        ->schema([
                            TextInput::make('password')
                                ->password()
                                ->autocomplete(false)
                                ->confirmed()
                                ->required(),
                            TextInput::make('password_confirmation')
                                ->password()
                                ->autocomplete(false)
                                ->required()
                        ]),
                    Wizard\Step::make('Account Details')
                        ->schema([
                            TextInput::make('first_name')
                                ->required(),
                            TextInput::make('last_name')
                                ->required(),
                            TextInput::make('password')
                                ->password()
                                ->autocomplete(false)
                                ->required()
                                ->disabled(),
                                //->content(fn ($get) => $get('field_name'))
                                //->(fn ($state, callable $set) => dd($state)),//$set('fdsf', $state->password)),
                            TextInput::make('password_confirmation')
                                ->password()
                                ->autocomplete(false)
                                ->required()
                                ->disabled()
                        ]),
                ])
                    ->persistStepInQueryString()
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                        <x-filament::button
                            type="submit"
                        >
                            Complete Account
                        </x-filament::button>
                    BLADE))),
            ]);
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.complete-account');
    }
}
